
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">
<link rel="stylesheet" href="css/plugins.css?v=1">
<link rel="stylesheet" href="css/main.css?v=1">

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

<script src="js/plugins.js?v=1" defer></script>
<script src="https://www.google.com/recaptcha/api.js" defer></script>
<script src="js/main.js?v=1" defer></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TGLGNNKK');</script>
<!-- End Google Tag Manager -->