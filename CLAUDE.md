# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

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
