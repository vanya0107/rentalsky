# PROJECT.md — RentalSky Technical Reference

> Deep technical structure reference. See CLAUDE.md for project goals, workflow rules, and current status.

---

## 0. What this site is

rentalsky.by — аренда автовышек (aerial lift / boom truck rental) в Минске и по Беларуси. Production site, no database. Single developer (Иван), manual FTP deploy (FileZilla). Git is local-only, used for rollback safety — nothing auto-deploys from it.

---

## 1. Repository layout

```
rentalsky-dev/                  ← git repo root, also the FTP-deployed doc root
├── src/                        ← ALL editable sources (LESS, JS, HTML previews)
│   ├── less/
│   ├── js/
│   └── html/
├── build/                      ← dev output (gitignored), served by BrowserSync
├── css/                        ← production CSS output (npm run gulp-prod writes here)
├── js/                         ← production JS output (npm run gulp-prod writes here)
├── img/                        ← images, referenced directly by both HTML and PHP paths, NOT compiled
├── fonts/                      ← static, no Gulp task (see Fonts below)
├── video/                      ← static video assets
├── template/                   ← PHP partials + data (production include path)
│   ├── blocks/                 ← PHP partials mirroring src/html/template/block/
│   ├── data/                   ← avtovishka.php — the entire "database"
│   ├── server/                 ← mail handling (PHPMailer + SMTP), reCAPTCHA lib
│   ├── head.php, header.php, footer.php, start-body.php
├── *.php                       ← root-level served pages (index, avtovishka, about, contacts, 404, phpinfo)
├── .htaccess                   ← URL rewriting, redirects, cache headers
├── gulpfile.js
├── package.json
├── CLAUDE.md                   ← operational rules + project context (writable for this project)
└── PROJECT.md                  ← this file
```

**Two parallel rendering paths that must stay in sync** (see CLAUDE.md for the rule): `src/html/` (dev preview, compiled by Gulp) mirrors the root `.php` files + `template/` (what's actually served). Any HTML structure change goes into both.

---

## 2. LESS structure

```
src/less/
├── main.less                  entry point — @import list, compiled as one bundle
├── plugins.less                third-party plugin styles bundle (currently empty — Swiper CSS
│                                lives in src/less/plugins/swiper.less but is NOT imported by
│                                plugins.less; check current @import state before assuming it's wired)
├── plugins/
│   └── swiper.less             vendored Swiper CSS
└── project/
    ├── common/                 shared across all pages
    │   ├── all-tag.less
    │   ├── common.less
    │   ├── fonts.less
    │   ├── header.less
    │   └── footer.less
    ├── block/                  one file per BEM block (~18 files)
    │   ├── hero.less, card.less, catalog-slider.less, catalog-list.less,
    │   │   advantages.less, maintenance.less, block-about.less, reviews.less,
    │   │   popup-form.less, how-choose.less, formation-price.less,
    │   │   contacts-form.less, avtovishka.less, popup-img.less,
    │   │   content-img-right.less, faq.less, 404.less
    └── page/                   page-specific overrides
        └── about-page-block-about.less
```

### Import order (`main.less`)
`all-tag → fonts → common → header → footer` then one `@import` per block in `project/block/`, then `page/about-page-block-about` last. New blocks: add the `.less` file under `project/block/` **and** add its `@import` to `main.less` — Gulp does not auto-discover files, only `main.less`'s explicit import list is compiled.

---

## 3. JS structure

```
src/js/
├── main.js                    entry point — wraps everything in one DOMContentLoaded listener,
│                               uses //=include for project files, plus inline Swiper lazy-loader
├── plugins.js                  third-party bundle — currently EMPTY (jQuery + Swiper were
│                               removed from it as part of the Aug 2026 PageSpeed pass, see CLAUDE.md)
├── swiper.js                   //=include plugins/swiper.min.js — compiled standalone, fetched
│                               at runtime by main.js's loadSwiper(), NOT bundled into main.js or plugins.js
├── plugins/
│   ├── jquery371.min.js        vendored — no longer included by plugins.js (kept on disk, unused)
│   └── swiper.min.js           vendored — pulled in only via swiper.js
└── project/                    feature scripts, all //=include'd by main.js, share its DOMContentLoaded scope
    ├── toggle-active.js
    ├── sliders.js               defines initSliders(), called manually by main.js after Swiper loads
    ├── popup.js
    ├── mail.js                  form submit via fetch(), on-demand reCAPTCHA loader
    ├── popup-img.js
    ├── animation-number.js
    └── other.js                 header scroll-class toggle (rAF-throttled)
```

### Swiper loading model (current, post-PageSpeed-pass)
Swiper is no longer bundled with every page load. `main.js` defines `loadSwiper()`, which injects `/js/swiper.js` (prod) at runtime:
- On `body.page-product` (product pages) → loads immediately on DOMContentLoaded.
- Elsewhere → only when an element with `[data-slider]` intersects the viewport (`IntersectionObserver`).
- `initSliders()` (from `sliders.js`) is only called once Swiper has actually loaded — it is NOT auto-run at parse time like the other `//=include`d project files.

### Compiled bundle mismatch — check before touching
`gulp-include` bundles `path.src.js = './src/js/*.js'` — i.e. every top-level file in `src/js/` (`main.js`, `plugins.js`, `swiper.js`) is compiled independently to its own output file of the same name. `src/js/project/*.js` files are never compiled directly — they only reach output by being `//=include`d into one of the top-level files.

---

## 4. HTML structure (dev preview, `src/html/`)

```
src/html/
├── 404.html, about.html, contacts.html, index.html
├── avtovishka10m.html, avtovishka22m.html, avtovishka26m.html, avtovishka28m.html,
│   avtovishka28mf.html, avtovishka30m.html, avtovishka45m.html   ← static previews of product
│                                                                    pages (NOT slug-driven like
│                                                                    the real avtovishka.php — see §7)
└── template/
    ├── head.html, header.html, footer.html, faq.html
    └── block/
        ├── catalog-slider.html, popup-form.html, reviews.html, socials-4.html
        └── popup-event-error.html, popup-event-success.html, popup-for-imgs.html
```

**Note:** the 7 static `avtovishkaNNm.html` preview files do not read `template/data/avtovishka.php` — they're hand-written previews of individual product pages, one per lift model that existed when they were created. There are 9 models in the data file (`template/data/avtovishka.php`) but only 7 static preview HTML files — 2 models (`28m-iveco`, `40m-mercedes`) have no dev-preview HTML counterpart, only the live PHP path. Keep this in mind when previewing product-page changes — the HTML preview and the actual slug-driven PHP render (`avtovishka.php?slug=...`) are two different code paths that only share `template/` PHP partials, not the top-level markup.

---

## 5. PHP structure (production, `template/` + root `*.php`)

```
template/
├── blocks/
│   ├── catalog-slider.php, contacts-form-single-page.php, faq.php,
│   │   popup-event-error.php, popup-event-success.php, popup-for-imgs.php,
│   │   popup-form.php, reviews.php, socials-4.php
├── data/
│   └── avtovishka.php          the entire product "database" — see §6
├── server/
│   ├── mail.php                 contact-form handler — PHPMailer + SMTP (rewritten Aug 2026,
│   │                             see CLAUDE.md — used to be PHP mail())
│   ├── smtp_config.php          SMTP host/user/PASSWORD in plaintext — NOT gitignored (see
│   │                             CLAUDE.md risk note)
│   ├── phpmailer/                vendored PHPMailer (Exception.php, PHPMailer.php, SMTP.php)
│   └── recaptchalib.php          legacy reCAPTCHA v2 lib — reCAPTCHA is now loaded on-demand
│                                  from Google's CDN directly in mail.js; NOT DETERMINED whether
│                                  this local lib file is still used anywhere
├── head.php, header.php, footer.php, start-body.php
│
root/
├── index.php, about.php, contacts.php, 404.php, phpinfo.php
└── avtovishka.php               slug router — see §7
```

`footer.php` also inline-emits the `RentalBusiness` JSON-LD schema block (no `areaServed`/`geo`/`image`/`sameAs` yet — open task, see CLAUDE.md).

---

## 6. Data schema — `template/data/avtovishka.php`

Single `return array(...)` keyed by slug. **9 models:** `12m-dongfeng`, `18m-renault`, `22m-zil`, `25m-renault`, `28m-maz`, `28m-iveco`, `30m-maz`, `40m-mercedes`, `45m-mercedes`.

Per-model fields:
| Key | Purpose |
|---|---|
| `headTitle`, `headDesc`, `headKey` | `<title>`/meta description/meta keywords |
| `name`, `model` | display name + model string, e.g. "Автовышка 12м" + "FRK GK 12" |
| `previewImg` | `['pc'|path, 'mobile'|path, 'alt']` — used on catalog/home listing |
| `sliderImg` | array of `{big, small, alt, bigSize:[w,h], smallSize:[w,h]}` — product-page gallery. `bigSize`/`smallSize` added Aug 2026 for CLS (explicit width/height on `<img>`) |
| `graphImg` | working-envelope diagram image |
| `price` | display price string |
| `tableParams` | assoc array of `[label, value]` spec rows (keys: `base`, `height`, `horizontal`, `carrying`, `angle`, `fullWeight`) |
| `catalogSlider` | short id used to cross-link into the "see also" slider |
| `catalogLink` | slug used to build the canonical URL |
| `faq` | array of `[question, answer]` pairs, rendered via `template/blocks/faq.php` |
| `seoText` (optional) | intro paragraph on the product page, only present on some models |

`avtovishka.php` (root) reads `$_GET['slug']`, looks it up in this array, and 404s (`header("HTTP/1.0 404 Not Found")`, no template) if not found.

---

## 7. Build system (Gulp)

`gulpfile.js` is the single source of truth — no separate dev/prod config files.

```js
path.src   = { html: './src/html/*.html', js: './src/js/*.js', less: './src/less/*.less' }
path.build = { html: './build/', js: './build/js/', css: './build/css/', img: './build/img/' }
path.prod  = { js: './js/', css: './css/', fonts: './fonts/', img: './img/' }
path.watch = { html: './src/html/**/*.html', js: './src/js/**/*.js', less: './src/less/**/*.less' }
```

| Task | Pipeline | Output |
|---|---|---|
| `styles` | `less` (autoprefix "last 5 versions") → `gcmq` (media query grouping) → unminified | `build/css/` + BrowserSync stream |
| `stylesMin` | same as `styles` → `cleanCSS` level 2 | `./css/` |
| `scripts` | `gulp-include` (`//=include` resolution) | `build/js/` + BrowserSync stream |
| `scriptsMin` | `gulp-include` → `gulp-uglify` (`compress: {drop_console:true}, mangle:true`) | `./js/` |
| `html` | `gulp-include` | `build/` |
| `img` | `gulp.symlink` (NOT a copy — dev build serves the same real files under `build/img/`) | `build/img/` |
| `watch` | BrowserSync server on `build/`, watches `less`/`js`/`html`, reloads on change | — |
| `bumpVersion` | reads `template/head.php`, regexes `?v=(\d+)`, increments, rewrites all `?v=` occurrences in that file | `template/head.php` (mutates source, not output) |

**Exports:**
- `exports.default` = `parallel(scripts, styles, html, img)` → `watch` — this is `npm run gulp`
- `exports.prod` = `series(parallel(scriptsMin, stylesMin), bumpVersion)` — this is `npm run gulp-prod`. Note `html` and `img` are NOT part of `exports.prod` — production HTML is the hand-maintained `template/`/root PHP, not a Gulp output.

**`touch()` helper:** every pipeline ends with a custom `through2` step that resets each output file's mtime to "now" — exists to defeat some kind of stale-mtime caching (browser or filesystem-watcher); exact reason NOT DETERMINED FROM CODE.

**Cache-busting:** `template/head.php` hardcodes `?v=N` on `css/main.css`, `css/plugins.css`, and `js/main.js` — `bumpVersion` auto-increments N on every `gulp-prod` run. As of 2026-08-22 (uncommitted working tree) N=19. This means the version number does not reliably indicate how many *deployed* prod builds happened — only how many times `gulp-prod` was run locally, including ones never pushed live via FTP.

---

## 8. Routing (`.htaccess`)

1. Force HTTPS (redirect if `X-Forwarded-Proto` isn't https)
2. Redirect legacy punycode domain → `rentalsky.by`
3. Hardcoded 301s from old product URLs (`/avtovishka22m.php`, `/avtovishka_12Dong`, etc.) → current slug URLs
4. `about.php`/`contacts.php` → extension-less 301
5. Generic: strip `.php` from any other existing page (`RewriteCond %{REQUEST_FILENAME}.php -f`)
6. `avtovishka-{slug}` → `avtovishka.php?slug={slug}` (internal rewrite, no redirect — this is the live product-page route)
7. 404 handling (custom page)
8. Static asset cache headers: `Expires` 1 year for images/CSS/JS/fonts, plus `Cache-Control: public, max-age=31536000, immutable` on the same extensions

---

## 9. Naming conventions

**BEM prefix:** `rs-` (e.g. `rs-hero`, `rs-hero__title`, `rs-hero--modifier`, `rs-avtovishka__slider-big`)

**Utility classes:** `rs-text-hidden` (`display:none`) — do not change its CSS implementation, only add/remove the class on elements (established rule, not a suggestion — see CLAUDE.md).

**Body classes:** `page-product` marks product pages (`avtovishka.php`) — used by `main.js` to decide whether Swiper loads eagerly or lazily.

**File ↔ block match:** one `.less` file per block under `project/block/`, named after the block's root class minus the `rs-` prefix (e.g. `hero.less` → `.rs-hero`).

---

## 10. Fonts

`fonts/` is static — referenced directly by `template/head.php` (`<link rel="preload" href="/fonts/Inter/Inter-*.woff2">`), not processed by any Gulp task. `gulpfile.js` has no font-related path or task at all. How/when font files were placed there is NOT DETERMINED FROM CODE (manual, one-time).

---

## 11. Third-party / vendored code — treat as read-only

- `src/js/plugins/jquery371.min.js`, `src/js/plugins/swiper.min.js` — vendored, currently only `swiper.min.js` is actually wired in (via `src/js/swiper.js`)
- `template/server/phpmailer/` (`Exception.php`, `PHPMailer.php`, `SMTP.php`) — vendored PHPMailer, added Aug 2026
- `template/server/recaptchalib.php` — legacy reCAPTCHA v2 helper lib, current usage NOT DETERMINED (reCAPTCHA script itself now loads straight from Google's CDN via `mail.js`, not through this lib)

---

## 12. UNKNOWN / NOT DETERMINED

- Whether `src/less/plugins.less` and `src/less/plugins/swiper.less` are wired together — `plugins.less` currently has no visible `@import`, so Swiper's CSS inclusion path is unverified as of 2026-08-22
- Exact purpose of the `touch()` mtime-reset step in every Gulp pipeline
- Why `fonts/` has no Gulp task — manual placement assumed, not confirmed
- Whether `template/server/recaptchalib.php` (server-side verification) is still invoked anywhere, now that the client-side widget loads independently from `mail.js` — if the PHP side never calls it, reCAPTCHA may be front-end-only (cosmetic) at the moment
- Whether the 2 product models without a static HTML preview (`28m-iveco`, `40m-mercedes`) were ever previewed via a since-deleted HTML file, or never had one
- How deployed-vs-local state is tracked, since git only mirrors the local working tree and prod is a separate FTP-managed file set with no version marker beyond the `?v=N` cache-bust counter
