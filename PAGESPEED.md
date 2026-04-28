# PageSpeed — план оптимизации

Работаем по одному пункту за сессию.
Ключевое слово для запроса: **"доработка по pagespeed"**

---

## Пункт 1 — Убрать jQuery, заменить на fetch()
**Файлы:** `src/js/project/mail.js`, `src/js/plugins.js`
**Эффект:** −87KB, −200ms script evaluation
**Статус:** [ ] не сделано

- Удалить `//=include plugins/jquery371.min.js` из `plugins.js`
- Переписать `mail.js` на нативный `fetch()` + `FormData` + `URLSearchParams`
- Убрать все `$()` вызовы

---

## Пункт 2 — GTM after-interaction
**Файлы:** `template/head.php`
**Эффект:** −300–600ms TBT
**Статус:** [ ] не сделано

- Убрать синхронный GTM-сниппет из `<head>`
- Загружать GTM после первого взаимодействия (click/scroll/keydown/touchstart/mousemove) или через `setTimeout(3000)`

---

## Пункт 3 — Включить JS minification
**Файлы:** `gulpfile.js`
**Эффект:** −30–40% размер JS-бандлов
**Статус:** [x] сделано

- Раскомментировать `.pipe(cleanJS({...}))` в функции `scriptsMin`
- Параметры: `compress: { drop_console: true }, mangle: true`

---

## Пункт 4 — reCAPTCHA on-demand
**Файлы:** `template/head.php`, `src/js/project/mail.js`
**Эффект:** −100–150ms TBT
**Статус:** [ ] не сделано

- Убрать `<script src="https://www.google.com/recaptcha/api.js" defer>` из `head.php`
- Динамически подгружать скрипт при первом фокусе на input внутри `[data-form]`

---

## Пункт 5 — Throttle scroll + rAF
**Файлы:** `src/js/project/other.js`
**Эффект:** устраняет forced reflow в scroll handler
**Статус:** [ ] не сделано

- Кэшировать `document.querySelector('.rs-header')` вне обработчика
- Обернуть логику в `requestAnimationFrame` с флагом `ticking`
- Добавить `{ passive: true }` к addEventListener

---

## Пункт 6 — Read/write fix в popup-img
**Файлы:** `src/js/project/popup-img.js`
**Эффект:** устраняет forced reflow при открытии popup
**Статус:** [ ] не сделано

- Читать все `img.src` в массив ДО записи `innerHTML`
- Убрать повторный цикл по `allImg` для поиска `initialSlide` — заменить на `indexOf`

---

## Пункт 7 — Lazy Swiper init (IntersectionObserver)
**Файлы:** `src/js/project/sliders.js`
**Эффект:** −50–100ms TBT, меньше layout при загрузке
**Статус:** [ ] не сделано

- Обернуть инициализацию всех слайдеров в `IntersectionObserver` с `rootMargin: '200px'`
- Swiper инициализируется только когда контейнер входит в viewport

---

## Пункт 8 — Сократить font preload
**Файлы:** `template/head.php`
**Эффект:** −2 лишних HTTP-запроса с высоким приоритетом
**Статус:** [ ] не сделано

- Оставить preload только для Inter-Regular + Inter-Bold + Inter-ExtraBold
- Medium и SemiBold убрать из preload (браузер подгрузит сам)
