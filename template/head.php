
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!--favicon-->
<link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">

<!--preconnect-->
<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
<link rel="preconnect" href="https://www.gstatic.com" crossorigin>

<!--styles-->
<link rel="preload" href="css/plugins.css?v=19" as="style"/>
<link media="all" rel="stylesheet" href="css/plugins.css?v=19" type="text/css"/>
<link rel="preload" href="css/main.css?v=19" as="style"/>
<link media="all" rel="stylesheet" href="css/main.css?v=19" type="text/css"/>

<!--fonts-->
<link rel="preload" href="/fonts/Inter/Inter-Regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/fonts/Inter/Inter-Medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/fonts/Inter/Inter-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/fonts/Inter/Inter-Bold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/fonts/Inter/Inter-ExtraBold.woff2" as="font" type="font/woff2" crossorigin>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://rentalsky.by<?php echo $_SERVER['REQUEST_URI']; ?>">
<meta property="og:title" content="<?php echo isset($car) ? $car['headTitle'] : 'Аренда автовышек до 45м в Минске — РенталСкай'; ?>">
<meta property="og:description" content="<?php echo isset($car) ? $car['headDesc'] : 'Аренда автовышек от 12 до 45 м по Минску и Беларуси. Цены от 87,5 BYN/час.'; ?>">
<meta property="og:image" content="https://rentalsky.by/img/og-image.jpg">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo isset($car) ? $car['headTitle'] : 'Аренда автовышек до 45м в Минске — РенталСкай'; ?>">
<meta name="twitter:description" content="<?php echo isset($car) ? $car['headDesc'] : 'Аренда автовышек от 12 до 45 м по Минску и Беларуси. Цены от 87,5 BYN/час.'; ?>">
<meta name="twitter:image" content="https://rentalsky.by/img/og-image.jpg">

<!--scripts-->
<script src="js/main.js?v=19" defer></script>

<!-- Google Tag Manager (deferred: interaction or 4s fallback) -->
<script>
window.dataLayer = window.dataLayer || [];
(function() {
    var timer;

    function loadGTM() {
        if (window.__gtmLoaded) return;
        window.__gtmLoaded = true;
        clearTimeout(timer);
        window.dataLayer.push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
        var s = document.createElement('script');
        s.async = true;
        s.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-TGLGNNKK';
        document.head.appendChild(s);
    }

    ['scroll', 'mousemove', 'touchstart'].forEach(function(e) {
        window.addEventListener(e, loadGTM, {once: true, passive: true});
    });

    timer = setTimeout(loadGTM, 4000);
})();
</script>
<!-- End Google Tag Manager -->