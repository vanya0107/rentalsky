<!doctype html>
<html lang="ru">
<head>
    <?php
        include('template/head.php');
        $page = 'about';
    ?>
    <meta name="description" content="Компания РенталСкай предоставляет автовышки в аренду по всей Беларуси. Надёжная техника, опытные операторы и оперативная подача.">
    <meta name="keywords" content="о компании РенталСкай, аренда спецтехники Беларусь">
    <title>О компании РенталСкай — аренда автовышек в Минске и по всей Беларуси</title>
    <link rel="canonical" href="https://rentalsky.by/about">
</head>
<body>
<?php
    include('template/start-body.php');
    include('template/header.php');
?>
<main>
    <div class="rs-hero" style="background-image: url(img/hero/about.jpg)">
        <div class="rs-hero__wrap rs-container">
            <h1 class="rs-hero__title">О нас</h1>
        </div>
    </div>
    <section class="rs-block-m-bot rs-block-bg rs-block-bg--gray">
        <div class="rs-container rs-content-style">
            <header>
                <h2 class="rs-title rs-title-h2 rs-title-h2--band">О нас</h2>
            </header>
            <p>
                Вас приветствует компания РенталСкай! Мы профессионалы в области аренды автовышек с более чем 10-летним опытом работы.
            </p>
            <p>
                Наш автопарк представлен разнообразными моделями автовышек, чтобы удовлетворить потребности любого клиента.
                Мы гордимся тем, что наша техника находится в отличном техническом состоянии благодаря своевременному обслуживанию. Наша команда готова выехать к вам в любое время суток, чтобы обеспечить вас надежной и безопасной техникой.
            </p>
            <p>
                Мы ценим наших клиентов и поэтому предлагаем демократические цены и гибкую систему скидок. Наша цель — обеспечить вас качественной техникой и высоким уровнем сервиса.
            </p>
            <p>
                Если вам нужна автовышка — обращайтесь к нам! Мы с удовольствием поможем вам выполнить ваши задачи быстро, эффективно и без лишних затрат.
            </p>
        </div>
    </section>
    <section class="rs-container rs-block-m-bot">
        <header>
            <h2 class="rs-title rs-title-h2">РенталСкай это:</h2>
        </header>
        <div class="rs-block-about__review rs-about-page-block-about">
            <div class="rs-block-about__review_video">
                <video width="320" height="240" controls muted poster="img/poster.png">
                    <source src="video/1.mp4" type="video/mp4">
                </video>
            </div>
            <div class="rs-block-about__review_desc">
                <div class="rs-block-about__advantages rs-block-m-bot">
                    <div class="rs-block-about__advantages_item">
                        <p class="rs-block-about__advantages_value" data-anim-num>><span>10</span></p>
                        <p class="rs-block-about__advantages_year">лет</p>
                        <p class="rs-block-about__advantages_desc">продуктивной работы</p>
                    </div>
                    <div class="rs-block-about__advantages_item">
                        <p class="rs-block-about__advantages_value" data-anim-num>><span>2500</span></p>
                        <p class="rs-block-about__advantages_year">выполненных заказов</p>
                        <p class="rs-block-about__advantages_desc">различной сложности</p>
                    </div>
                    <div class="rs-block-about__advantages_item">
                        <p class="rs-block-about__advantages_value" data-anim-num><span>24</span>/<span>7</span></p>
                        <p class="rs-block-about__advantages_year">режим работы</p>
                        <p class="rs-block-about__advantages_desc">для своевременного выполнения ваших работ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rs-contacts-form rs-block-m-bot rs-block-bg rs-block-bg--gray">
        <div class="rs-container">
            <header>
                <h2 class="rs-title rs-title-h2 rs-title-h2--band">Как заказать автовышку?</h2>
            </header>
            <?php include('template/blocks/contacts-form-single-page.php'); ?>
        </div>
    </section>
    <section class="rs-reviews" id="reviews">
        <div class="rs-container">
            <?php include( 'template/blocks/reviews.php' );?>
        </div>
    </section>
    <?php
        $faq = array(
            array('Чем занимается компания?', 'Мы специализируемся на аренде автовышек различных типов и высот для выполнения монтажных, ремонтных, строительных и обслуживающих работ. Обеспечиваем подачу техники, сопровождение машиниста и безопасное выполнение работ на объекте.'),
            array('Как давно работаете?', 'Мы предоставляем услуги на рынке уже более 10 лет. За это время мы выполнили тысячи заказов в разных частях Беларуси.'),
            array('Какие преимущества работы с вами?', 'В нашем парке имеется универсальная техника для разные задачи под управлением опытных и обученных операторов. Плюс у нас имеется системы скидок и подача техники в течении часа.')
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