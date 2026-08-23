# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

> This project is exempt from the global "CLAUDE.md is read-only" rule — Иван ведёт rentalsky-dev полностью самостоятельно and wants this file kept live. Update it as the project evolves. See `PROJECT.md` (same directory) for the deep technical reference — file trees, exact Gulp pipeline, data schema, routing rules, naming conventions. This file is goals/workflow/status; PROJECT.md is architecture detail.

## Project context

- **Site:** rentalsky.by — аренда автовышек (aerial lift rental) в Минске и по Беларуси. Production, running a long time.
- **Team:** Иван — единственный разработчик, ведёт весь проект самостоятельно. Заказчик изредка ставит задачи, но решения по реализации — за Иваном.
- **Primary goal — every change is evaluated through this lens:** SEO + попадание в AI-выдачу Google (AI Overview). Secondary but load-bearing: the whole site is built mobile-first.
- **Catalog:** 9 lift models, all defined in `template/data/avtovishka.php`: `12m-dongfeng`, `18m-renault`, `22m-zil`, `25m-renault`, `28m-maz`, `28m-iveco`, `30m-maz`, `40m-mercedes`, `45m-mercedes`.

## Deployment & git

- **Hosting:** Apache, no CI/CD.
- **Deploy is 100% manual** — Иван uploads files via FTP (FileZilla). Nothing in this repo auto-deploys.
- **Git is local-only, used purely as a rollback safety net.** The state of `git status`/commits does **not** reflect what's live on the site — an uncommitted working tree is completely normal and is not itself something to fix. Never treat "this isn't committed yet" as a problem to flag or a blocker to raise unprompted.

## Current status (update this section as work progresses)

- A large PageSpeed optimization pass is in progress in the working tree (uncommitted as of 2026-08-22). It follows a checklist that used to live in `PAGESPEED.md` (deleted from the working tree, still in git history at commit `9afa59d`). Done: jQuery→fetch in the contact form, GTM deferred until user interaction, reCAPTCHA loaded on-demand, scroll handler throttled via rAF, Swiper split into a lazily-loaded standalone bundle. Not done: read/write (forced reflow) fix in `src/js/project/popup-img.js`, trimming font preload down to 3 weights (still preloading 5 in `template/head.php`).
- Beyond that checklist: contact form mail sending was migrated from PHP `mail()` to PHPMailer+SMTP (`template/server/mail.php`, `template/server/smtp_config.php`, vendored `template/server/phpmailer/`); product-page slider images got explicit `bigSize`/`smallSize` dimensions in `avtovishka.php` for CLS; Gulp now auto-bumps the `?v=N` cache-bust counter in `template/head.php` on every `gulp-prod` run.
- **Open risk:** `template/server/smtp_config.php` holds a real SMTP password in plaintext and is not in `.gitignore`. Decide before ever running a broad `git add` — either gitignore it or move the secret out.
- **Not yet started:** extend the `RentalBusiness` JSON-LD schema in `template/footer.php` (add `areaServed`, `geo`, `image`, `sameAs`, fix `openingHours`); add a `WebSite` schema with `SearchAction`; add 3-4 more FAQ entries aimed at AI Overview; add `BreadcrumbList` schema.

### SEO investigation: model pages barely rank/get clicks (started 2026-08-22)

Problem: homepage ranks great for generic queries ("аренда автовышки минск"); the 9 individual model pages (`avtovishka-*`) get almost no impressions/clicks for their meter-specific queries. Full diagnosis pulled from Search Console screenshots + live redirect/sitemap checks + web search — **do not re-investigate from scratch, read this first:**

- **GSC baseline (3-month window, snapshot as of 2026-08-22, will go stale — re-check before trusting the numbers):** homepage = 129 clicks / 7338 impressions (~86% of all site clicks). Each of the 9 model pages = 0-4 clicks / 65-200 impressions. Absolute search volume for exact meter-phrase queries ("автовышка 22м" etc.) is tiny site-wide (13-25 impressions/quarter) — most real traffic comes from generic head terms, not meter-specific long-tail.
- **Indexing is fine, technical migration is clean:** all 9 pages are indexed (not in Google's "crawled but not indexed" bucket — that bucket's 5 URLs are all legacy pre-redesign addresses like `avtovishka_28Iveco`, `avtovishka30m.php`, plus `robots.txt` itself, not the live pages). All legacy URLs verified live to return clean single-hop `301`s to the correct new slug. `sitemap.xml` (local and live) only lists correct new URLs. No lingering internal links to old URLs anywhere in the codebase. **Don't waste time re-auditing redirects/sitemap — this is confirmed clean.**
- **Per-model diagnosis (from web search, not a mirror of live google.by — treat as a strong signal, not gospel):** 12m/18m → correct new URL shows. **22m** → Google still surfaces the old `avtovishka22m.php` instead of the new URL (pure historical-signal lag, nothing broken on-site; re-indexing already requested via GSC URL Inspection on 2026-08-22, just needs time). 25m/28m/30m/40m → RentalSky doesn't surface at all against established competitors (stroyarenda.by, olby.by, rentakran.by, arenda-avtovyshek.by, etc.) — genuine content/authority weakness, not a technical issue. **45m** → the query actually surfaces the **homepage** (not the product page) — real title cannibalization (`<title>` says "до 45м"). **Decision: leave the homepage title alone anyway** — it's the site's dominant traffic page for generic queries, and the hypothetical upside (redirecting a handful of low-volume clicks to the product page) isn't worth the risk of touching it. 45m just rides along with the general content-strengthening work below instead of getting a dedicated fix.
- **Confirmed structural bug, found via GSC URL Inspection "Enhancements" check:** the `Review`/`LocalBusiness` JSON-LD in `template/blocks/reviews.php` (included on 11 of 12 pages — home, about, all 9 models; not on contacts) has a real Google-flagged validation error: **no `aggregateRating` object**. This is the same identical review content/schema duplicated verbatim across 11 URLs that was flagged early in the investigation as a duplicate-content concern — now confirmed as an actual Rich Results error, not just a hunch. Plausible contributor to the near-0% CTR on model pages (no star rating shown in the snippet). Homepage additionally flagged for an unindexed video (testimonial video, `video/1.mp4`) — minor, likely missing `VideoObject` markup, low priority.
- **Client's own plan (independent of this investigation):** pull real Google reviews + a Google Maps embed onto About/Contacts, replacing the current hardcoded testimonials. Good idea for trust/E-E-A-T; doesn't by itself fix the ranking problem, but should be the moment the review block's structure changes (stop stamping full `Review` schema on all 12 pages — keep it on About/Contacts only, `aggregateRating` only or nothing on model pages).

**Agreed prioritized plan (nothing implemented yet as of 2026-08-22 — all still planning-phase):**
1. Quick, low-risk wins: add `aggregateRating` to the current review JSON-LD (cheap, fixes a live validation error now, redo when reviews migrate to Google); make the whole catalog-card clickable instead of just the "Подробнее" button + image (`index.php` catalog-list block + `template/blocks/catalog-slider.php`) — card's name/model text currently isn't inside any `<a>` at all, so it contributes zero anchor-text value.
2. Content: write expanded, unique `seoText` per model (150-250 words, no invented numbers, no "аренда" in headers — see Conventions section) — Claude drafts, Иван/client approve.
3. `BreadcrumbList` + `Product`/`Service` JSON-LD per model page (reuse the new seoText as description where useful).
4. New `/catalog` hub page, linked from header nav — do NOT just clone the homepage's card grid (that would just add a 13th page of duplicate content). Needs genuinely differentiated content: per-model comparison-angle teaser (not a copy of seoText), a compact spec-comparison table across all 9 models, a "how to choose height" FAQ distinct from each model's own FAQ. Keep the compact grid on the homepage as-is (conversion path, don't remove). Claude can draft this copy too, same constraints as above.
5. Whenever the client's Google-reviews/Maps migration actually happens: restructure so full `Review` schema only lives on About/Contacts, not duplicated across all 12 pages.
6. Backlog, not tied to this specific investigation, do opportunistically: `RentalBusiness` schema expansion, `WebSite`+`SearchAction` schema, extra FAQ entries for AI Overview, `VideoObject` for the homepage testimonial video.

**Side fix (2026-08-22, unrelated to SEO but surfaced while building breadcrumbs):** shrinking header (`.rs-header.scrollable`, `src/js/project/other.js` + `src/less/project/common/header.less`) had a desktop-only bug — scrolling back to the top, the header's padding-grow transition (on a `position: sticky` element) would visually overlap content below it (newly visible once breadcrumbs sat right under the header) and needed an extra scroll nudge to settle. Tried `will-change` (no effect) and a `position: fixed` + JS-measured spacer rebuild (made it worse — triggered CSS scroll-anchoring feedback, page got stuck/jumpy). Reverted both. Fix that actually worked: in `scrollHeader()`, when the header transitions from compact→default (scrolling back above the 50px threshold), force `window.scrollTo(0, 0)` — since that branch only runs when `scrollY <= 50` already, snapping to exactly 0 is safe and doesn't fight the browser. Verified working locally and on prod. Known minor residual: a quick extra wheel-click right at the threshold can still cause a small jitter — accepted as-is, not chasing further.

## Encoding

- User has hit Cyrillic-text encoding corruption on this project before (details not recorded, don't have the specifics — don't assume the cause below is confirmed to match). Verified 2026-08-22: no BOM in any source file, `template/head.php` has `<meta charset="UTF-8">`. `.htaccess` had no `AddDefaultCharset` directive — added `AddDefaultCharset UTF-8` as a defensive fix, since a hosting-level Apache charset default can override the in-page `<meta charset>` per the HTML5 spec (HTTP header wins over meta tag when both are present) and this is invisible from the codebase alone. If Cyrillic garbling recurs specifically on the **live prod site** (not local dev), check the actual HTTP response header (`curl -I` → `Content-Type`) before assuming it's a source-file issue — it may be a hosting-panel-level charset override.
- If it recurs specifically in **local dev preview** (`npm run gulp`/BrowserSync) but the underlying `.php`/`.html`/`.less` source files are confirmed valid UTF-8 with no BOM, treat it as a local tooling/display quirk (editor, terminal codepage) rather than a real file corruption — user said this class of issue is "not critical" locally, only prod matters.

## Conventions to preserve, not "fix"

- `.rs-text-hidden` (`display:none`) — do not change its CSS implementation; a visually-hidden rewrite was explicitly rejected. To hide SEO text visually, add/remove the class, don't touch the rule.
- **Client does not want the word "аренда" (rental) in `<title>`/H1 of the 9 model pages** (`avtovishka.php`). Explicit client preference, not up for debate — find other ways to signal rental intent (price, "с оператором", synonyms) if needed. Body copy (`seoText`, FAQ) is not restricted by this — it just happens to not use the word today either.
- **Don't invent unverified technical/quantitative claims in copy** (e.g. "подходит для 4-6 этажей" without a source). Only state numbers that come from `tableParams`/data file fields, or write qualitatively without a specific number when we don't have a verified fact. Caught once already — the user is a stickler for not misleading site visitors on factual specs.

## Commands

```bash
npm install        # install dependencies
npm run gulp       # start dev server with file watching (BrowserSync)
npm run gulp-prod  # production build (minified CSS, JS output to root ./css/ and ./js/)
```

There are no test or lint commands in this project.

## Architecture

RentalSky is a PHP website for an aerial lift rental company in Belarus. It has **two parallel rendering paths** that must stay in sync:

### 1. Static HTML path (development preview)
- Sources live in `src/html/` (`.html` files with `//=include` directives)
- Gulp compiles them via `gulp-include` into `build/` for BrowserSync preview
- HTML partials are in `src/html/template/` (header, footer, head, blocks)

### 2. PHP path (production)
- Root-level `.php` files (`index.php`, `avtovishka.php`, `about.php`, etc.) are the actual served pages
- PHP partials mirror the HTML partials and live in `template/` (head.php, header.php, footer.php, blocks/)
- **When changing HTML structure, the same change must be applied to the corresponding PHP file**
- **Exception: JSON-LD structured data (schema.org markup).** This is a production/SEO-only concern — it has no visual representation and the `src/html/` dev-preview path doesn't need it. Add/edit `<script type="application/ld+json">` blocks only in the PHP templates under `template/` (e.g. `template/footer.php` for `RentalBusiness`, `template/blocks/reviews.php` for `Review`/`aggregateRating`). Do not add or mirror schema markup into `src/html/` — that would violate the "no unsync'd content" spirit of the two-path rule for no reason, since it renders nothing there.

### CSS & JS pipeline
- LESS sources in `src/less/` → compiled to `build/css/` (dev) or `./css/` (prod)
- JS sources in `src/js/` use `//=include` to bundle project files from `src/js/project/` and plugins from `src/js/plugins/`
- Compiled JS bundles go to `build/js/` (dev) or `./js/` (prod)
- `main.less` and `main.js` are the entry points; `plugins.less` and `plugins.js` are separate bundles for third-party code

### Data layer
- No database — product data (aerial lift models, specs, prices, FAQs) is stored as PHP arrays in `template/data/avtovishka.php`
- `avtovishka.php` (root) reads the slug from the URL (via `.htaccess` rewriting) and renders the matching product

### URL routing
- `.htaccess` strips `.php` extensions and routes `avtovishka-{slug}` slugs to `avtovishka.php`

### CSS conventions
- BEM naming with `rs-` prefix (e.g. `rs-hero`, `rs-hero__title`, `rs-hero--modifier`)
- One `.less` file per block, imported in `src/less/main.less`

### JS conventions
- All project scripts run inside a single `DOMContentLoaded` listener defined in `src/js/main.js`
- Individual feature scripts in `src/js/project/` are included via `//=include` and share that listener's scope

### LESS authoring rules (corrected 2026-08-22, don't repeat this mistake)
- **A modifier's cascading effect on a child component belongs in the modifier's own file, not the child's file.** E.g. `.rs-catalog-list--fullW` reshaping `.rs-card` internals must live entirely in `catalog-list.less` (nested under `.rs-catalog-list`), never split into `card.less`. `card.less` only holds `.rs-card`'s own base styles.
- **Always show nesting with `&`, never flat descendant selectors.** Write `&--fullW { & .rs-card { &__img {...} } }`, not `.rs-catalog-list--fullW .rs-card { ... }` as a separate top-level block — the flat form hides the hierarchy and is harder to read.
- **Never duplicate a `@media(...)` block across files for the same breakpoint.** If a modifier needs a `min-width: 1024px` override, nest it inside the SAME media block that already exists for that component/breakpoint, not a second separate one in another file.
