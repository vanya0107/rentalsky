<!doctype html>
<html lang="ru">
<head>
    <?php
        include('template/head.php');
        $page = 'contacts';
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
?>
<main>
    <div class="rs-container rs-contacts-form rs-block-bg">
        <header>
            <h1 class="rs-title rs-title-h2 rs-title-h2--band">Контакты</h1>
        </header>
        <div class="rs-contacts-form__wrap">
            <div class="rs-contacts-form__info">
                <p class="rs-contacts-form__text">
                    По любым вопросам свяжитесь с нами наиболее удобным из нижеперечисленных способов, и мы оперативно ответим Вам.
                </p>
                <p class="rs-contacts-form__label">По номеру телефона:</p>
                <a href="tel: +375 (44) 788-94-81" class="rs-contacts-form__contact big-fs">
                    <svg>
                        <use xlink:href="img/s-icons.svg#phone"></use>
                    </svg>
                    <span>+375 (44) 788-94-81</span>
                </a>
                <p class="rs-contacts-form__label">Через любую социальную сеть:</p>
                <div class="rs-contacts-form__social">
                    <?php include('template/blocks/socials-4.php'); ?>
                </div>
                <p class="rs-contacts-form__label">Через письмо на почту:</p>
                <a href="mailto: rentalskyby@gmail.com" class="rs-contacts-form__contact big-fs">
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
                            name="name"
                    >
                    <p class="rs-contacts-form__err">Введите не менее 2 символов!</p>
                </div>
                <div class="rs-contacts-form__input">
                    <input
                            type="number"
                            placeholder="+375 (29) 555-55-55"
                            name="phone"
                    >
                    <p class="rs-contacts-form__err">Введите корректный номер телефона!</p>
                </div>
<!--                <div class="rs-contacts-form__captcha">-->
<!--                    <div class="g-recaptcha" data-sitekey="6LfEl6UqAAAAAJUnVJj6U5mYEFYhybntwG1m-LfU"></div>-->
<!--                </div>-->
                <button type="submit" class="rs-contacts-form__btn rs-btn rs-btn__orange">
                    Заказать звонок
                </button>
            </form>
        </div>
    </div>
    <?php
        $faq = array(
            array('Как связаться?', 'Вы можете связаться с нами по телефону, через мессенджеры (Viber/Telegram/WhatsApp) или оставить заявку на сайте. Мы быстро ответим и уточним необходимые детали для подбора автовышки.'),
            array('Где вы находитесь?', 'Мы находимся в городе Минске. При этом работаем по всей Беларуси и выезжаем на объекты в любой регион.')
        );
        $bg_gray = true;
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