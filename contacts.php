<!doctype html>
<html lang="ru">
<head>
    <?php
        include('template/head.php');
        $page = 'contacts';
        $company = include('template/data/company.php');
    ?>
    <meta name="description" content="Контактная информация РенталСкай. Телефоны, адрес, email, карта проезда. Аренда автовышек по Минску и всей Беларуси.">
    <meta name="keywords" content="контакты РенталСкай, заказать автовышку Минск">
    <title>Контакты РенталСкай — аренда автовышек в Минске и по всей Беларуси</title>
    <link rel="canonical" href="https://rentalsky.by/contacts">
</head>
<body>
<?php
    include('template/start-body.php');
    include('template/header.php');
    $breadcrumbs = [
        ['label' => 'Главная', 'url' => '/'],
        ['label' => 'Контакты'],
    ];
    include('template/blocks/breadcrumbs.php');
?>
<main>
    <div class="rs-contacts-form rs-block-bg">
        <div class="rs-container">
        <header>
            <h1 class="rs-title rs-title-h2 rs-title-h2--band">Контакты РенталСкай</h1>
        </header>
        <div class="rs-contacts-form__wrap">
            <div class="rs-contacts-form__info">
                <p class="rs-contacts-form__text">
                    По любым вопросам свяжитесь с нами наиболее удобным из нижеперечисленных способов, и мы оперативно ответим Вам.
                </p>
                <p class="rs-contacts-form__label">По номеру телефона:</p>
                <a href="tel:<?= $company['phoneDisplay'] ?>" class="rs-contacts-form__contact big-fs">
                    <svg>
                        <use xlink:href="img/s-icons.svg#phone"></use>
                    </svg>
                    <span><?= $company['phoneDisplay'] ?></span>
                </a>
                <p class="rs-contacts-form__label">Через любую социальную сеть:</p>
                <div class="rs-contacts-form__social">
                    <?php include('template/blocks/socials-4.php'); ?>
                </div>
                <p class="rs-contacts-form__label">Через письмо на почту:</p>
                <a href="mailto:rentalskyby@gmail.com" class="rs-contacts-form__contact big-fs">
                    <svg>
                        <use xlink:href="img/s-icons.svg#mail-white"></use>
                    </svg>
                    <span>rentalskyby@gmail.com</span>
                </a>
            </div>
            <form class="rs-contacts-form__form" method="post" data-form>
                <p class="rs-contacts-form__form_text">
                    Также Вы можете оставить заявку ниже и наш менеджер свяжется с Вами в ближайшее время.
                </p>
                <div class="rs-contacts-form__input">
                    <input
                            type="text"
                            placeholder="Ваше Имя"
                            aria-label="Ваше Имя"
                            name="name"
                    >
                    <p class="rs-contacts-form__err">Введите не менее 2 символов!</p>
                </div>
                <div class="rs-contacts-form__input">
                    <input
                            type="number"
                            placeholder="+375 (29) 555-55-55"
                            aria-label="Номер телефона"
                            name="phone"
                    >
                    <p class="rs-contacts-form__err">Введите корректный номер телефона!</p>
                </div>
                <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;">
                <button type="submit" class="rs-contacts-form__btn rs-btn rs-btn__orange">
                    Заказать звонок
                </button>
            </form>
        </div>
        </div>
    </div>
    <section class="rs-contacts-map rs-block-bg rs-block-bg--gray">
        <div class="rs-container">
        <header>
            <h2 class="rs-title rs-title-h2 rs-title-h2--band">Как нас найти</h2>
        </header>
        <a href="<?= $company['mapsUrl'] ?>" target="_blank" rel="noopener" class="rs-contacts-map__address">
            <svg><use xlink:href="img/s-icons.svg#pin"></use></svg>
            <?= $company['addressShortDisplay'] ?>
        </a>
        <div class="rs-contacts-map__frame">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2349.3302575467155!2d27.4514404!3d53.9258763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa3d734646122f877%3A0xc5138dfa36872c0f!2z0JDRgNC10L3QtNCwINCw0LLRgtC-0LLRi9GI0LrQuCB8INCe0J7QniAi0KDQtdC90YLQsNC70KHQutCw0Lki!5e0!3m2!1sru!2sby!4v1787489000000!5m2!1sru!2sby"
                width="100%" height="100%"
                style="border:0;"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="РенталСкай на карте"
            ></iframe>
        </div>
        </div>
    </section>
    <?php
        $faq = array(
            array('Как связаться?', 'Вы можете связаться с нами по телефону, через мессенджеры (Viber/Telegram/WhatsApp) или оставить заявку на сайте. Мы быстро ответим и уточним необходимые детали для подбора автовышки.'),
            array('Где вы находитесь?', 'Мы находимся в городе Минске, по адресу пр-д Масюковщина, д. 4, каб. 36. При этом работаем по всей Беларуси и выезжаем на объекты в любой регион.')
        );
        $bg_gray = false;
        include('template/blocks/faq.php');
    ?>
</main>
<?php
    include('template/footer.php');
    include( 'template/blocks/popup-event-success.php' );
    include( 'template/blocks/popup-event-error.php' );
?>
</body>
</html>