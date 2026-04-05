<?php
    // Загружаем базу
    $data = include('template/data/avtovishka.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <?php
        include('template/head.php');
        $page = 'index';
    ?>
    <meta name="description" content="Аренда автовышек от 12 до 45 м в Минске и по всей Беларуси. Цена от 87,5 BYN в час. Быстрая подача, опытные операторы, доступные цены, закажи онлайн.">
    <meta name="keywords" content="аренда автовышек Минск,аренда автовышки, аренда вышки, заказать автовышку, автовышка, автогидроподъемник ">
    <title>Аренда автовышек до 45м в Минске и Беларуси - РенталСкай</title>
    <link rel="canonical" href="https://rentalsky.by/">
</head>
<body>
<?php
    include('template/start-body.php');
    include('template/header.php');
?>
<main>
    <div class="rs-hero rs-hero--index">
        <picture class="rs-hero__bg">
            <source srcset="img/hero/index-mobile.webp" media="(max-width: 700px)">
            <img src="img/hero/index.webp" alt="background image h1 block on index page" width="1920" height="864" fetchpriority="high">
        </picture>
        <div class="rs-hero__wrap rs-container">
            <h1 class="rs-hero__title">Аренда автовышки <br> в Минске и Беларуси</h1>
            <p class="rs-hero__subtitle">Эксперты в подъеме на высоту</p>
            <button class="rs-hero__btn rs-btn rs-btn__orange" data-popup=".rs-popup-form.callback">Заказать автовышку</button>
        </div>
    </div>
    <section class="rs-catalog-list rs-block-m-bot rs-block-bg rs-block-bg--gray">
        <div class="rs-container">
            <header>
                <h2 class="rs-title rs-title-h2 rs-title-h2--band">Наша техника</h2>
            </header>
            <ul class="rs-catalog-list__wrap">
                <?php foreach ($data as $auto): ?>
                    <li class="rs-catalog-list__item rs-card">
                        <a href="<?php echo $auto['catalogLink']; ?>" class="rs-card__img">
                            <img src="<?php echo $auto['previewImg'][0]; ?>" loading="lazy" alt="<?php echo $auto['previewImg'][1]; ?>">
                        </a>
                        <div class="rs-card__info">
                            <p class="rs-card__name">
                                <span><?php echo $auto['name']; ?></span>
                                <span><?php echo $auto['model']; ?></span>
                            </p>
                            <p class="rs-card__desc">от <?php echo $auto['price']; ?> за маш./смену</p>
                            <a href="<?php echo $auto['catalogLink']; ?>" class="rs-card__btn rs-btn rs-btn__orange">Подробнее</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <section class="rs-container rs-block-m-bot">
        <div class="rs-content-img-right">
            <div class="rs-content-img-right__content rs-content-style">
                <header>
                    <h2 class="rs-title rs-title-h2 rs-title-h2--band">Аренда автовышек</h2>
                </header>
                <p>
                    В мире строительства, ремонта, монтажа, демонтажа и обслуживания высотных объектов, аренда автовышек стала неотъемлемой частью многих проектов и сфер жизни. Наша команда предлагает квалифицированных, опытных операторов и широкий спектр автовышек в аренду, чтобы удовлетворить ваши потребности в безопасном и эффективном доступе на высоту.
                </p>
                <h3>Преимущества аренды автовышек:</h3>
                <ul>
                    <li>
                        Безопасность: наши автовышки оснащены всеми необходимыми системами безопасности, чтобы обеспечить защиту вашей жизни и здоровья.
                    </li>
                    <li>
                        Эффективность: благодаря высокой мобильности и маневренности, наши автовышки позволяют быстро и легко выполнять работы на высоте, даже в самых труднодоступных местах .
                    </li>
                    <li>
                        Широкий выбор: наша компания предлагает широкий спектр автовышек разной высоты и грузоподъемности, чтобы удовлетворить ваши конкретные потребности.
                    </li>
                    <li>
                        Экономичность: аренда автовышек - это более экономичный вариант, чем покупка собственного оборудования, особенно если вы не планируете использовать его постоянно.
                    </li>
                </ul>
            </div>
            <div class="rs-content-img-right__img">
                <div class="rs-content-img-right__img_bg">
                    <img src="img/content-img-right/1.jpg" alt="Аренда автовышки для высотных работ" loading="lazy" width="500" height="648">
                </div>
            </div>
        </div>
    </section>
    <section class="rs-block-m-bot rs-block-bg rs-block-bg--gray">
        <div class="rs-container">
            <header>
                <h2 class="rs-title rs-title-h2 rs-title-h2--band">
                    Как формируется цена аренды автовышки
                </h2>
            </header>
            <p>
                Цена аренды автовышки формируется на основе нескольких факторов, которые могут варьироваться. Ниже приведены основные факторы, которые влияют на цену аренды автовышки:
            </p>
            <ul class="rs-formation-price">
                <li class="rs-formation-price__item">
                    <p class="rs-formation-price__title">
                        Тип и модель автовышки:
                        <span class="rs-formation-price__num"></span>
                    </p>
                    <p class="rs-formation-price__desc">
                        Цена аренды может различаться в зависимости от типа и модели автовышки. Например, более крупные и мощные автовышки могут иметь более высокую стоимость аренды.
                    </p>
                </li>
                <li class="rs-formation-price__item">
                    <p class="rs-formation-price__title">
                        Продолжительность аренды:
                        <span class="rs-formation-price__num"></span>
                    </p>
                    <p class="rs-formation-price__desc">
                        Обычно цена аренды автовышки зависит от продолжительности аренды. Чем дольше срок аренды, тем выгоднее может быть стоимость за день или за час.
                    </p>
                </li>
                <li class="rs-formation-price__item">
                    <p class="rs-formation-price__title">
                        Местоположение:
                        <span class="rs-formation-price__num"></span>
                    </p>
                    <p class="rs-formation-price__desc">
                        В цену аренды автовышек включается стоимость доставки техники за пределы Минска.
                    </p>
                </li>
                <li class="rs-formation-price__item">
                    <p class="rs-formation-price__title">
                        Спрос и предложение:
                        <span class="rs-formation-price__num"></span>
                    </p>
                    <p class="rs-formation-price__desc">
                        В некоторых случаях цена аренды может зависеть от текущего спроса и предложения на рынке аренды автовышек.
                    </p>
                </li>
                <li class="rs-formation-price__item">
                    <p class="rs-formation-price__title">
                        Длительность сотрудничества с заказчиком:
                        <span class="rs-formation-price__num"></span>
                    </p>
                    <p class="rs-formation-price__desc">
                        Постоянным и новым клиентам мы предоставляем скидки.
                    </p>
                </li>
            </ul>
        </div>
    </section>
    <section class="rs-container rs-block-m-bot">
        <header>
            <h2 class="rs-title rs-title-h2 rs-title-h2--band">
                Как правильно подобрать автовышку
            </h2>
        </header>
        <p>Чтобы правильно подобрать автовышку, необходимо обратить внимание на следующие факторы:</p>
        <ul class="rs-how-choose">
            <li class="rs-how-choose__item">
                <p class="rs-how-choose__title">Высота подъема</p>
                <p class="rs-how-choose__desc">
                    Нужно определиться, на какую высоту необходимо совершить подъем.
                </p>
            </li>
            <li class="rs-how-choose__item">
                <p class="rs-how-choose__title">Грузоподъемность</p>
                <p class="rs-how-choose__desc">
                    Общий вес рабочей группы и используемого инструмента, оборудования не должен превышать максимальной грузоподъемности автовышки.
                </p>
            </li>
            <li class="rs-how-choose__item">
                <p class="rs-how-choose__title">Маневренность</p>
                <p class="rs-how-choose__desc">
                    Если работы будут проводиться в ограниченном пространстве, на узких городских улочках, то стоит выбрать более компактную модель.
                </p>
            </li>
            <li class="rs-how-choose__item">
                <p class="rs-how-choose__title">Пространство</p>
                <p class="rs-how-choose__desc">
                    Необходимо учитывать наличие деревьев, проводов, зданий и других препятствий.
                </p>
            </li>
            <li class="rs-how-choose__item">
                <p class="rs-how-choose__title">Площадка</p>
                <p class="rs-how-choose__desc">
                    Нужно убедиться, что площадка имеет достаточное пространно для размещения автовышки с учетом вылета выносных опор.
                </p>
            </li>
        </ul>
    </section>
    <section class="rs-block-bg rs-block-bg--gray rs-maintenance">
        <div class="rs-container">
            <header>
                <h2 class="rs-title rs-title-h2 rs-title-h2--band">Наши автовышки используют:</h2>
            </header>
            <div class="rs-maintenance__wrap swiper" data-slider="catalog">
                <div class="swiper-wrapper">
                    <div class="rs-maintenance__item swiper-slide">
                        <p class="rs-maintenance__img">
                            <img src="img/maintenance/1.jpg" loading="lazy" alt="">
                        </p>
                        <p class="rs-maintenance__title">
                            Рекламно-производственные организации
                        </p>
                        <p class="rs-maintenance__desc">
                            С помощью наших автовышек вы быстро, безопасно и эффективно сможете разместить рекламу в необходимом месте.
                        </p>
                    </div>
                    <div class="rs-maintenance__item swiper-slide">
                        <p class="rs-maintenance__img">
                            <img src="img/maintenance/2.jpg" loading="lazy" alt="">
                        </p>
                        <p class="rs-maintenance__title">
                            Строительные организации
                        </p>
                        <p class="rs-maintenance__desc">
                            Автовышки необходимы для выполнения монтажа и демонтажа оборудования на высоте, ремонту крыш и других работ.
                        </p>
                    </div>
                    <div class="rs-maintenance__item swiper-slide">
                        <p class="rs-maintenance__img">
                            <img src="img/maintenance/3.jpg" loading="lazy" alt="">
                        </p>
                        <p class="rs-maintenance__title">
                            Клининговые организации
                        </p>
                        <p class="rs-maintenance__desc">
                            Аренда автовышки упрощает уборку высоких зданий, обеспечивая доступ к труднодоступным местам и экономию времени.
                        </p>
                    </div>
                    <div class="rs-maintenance__item swiper-slide">
                        <p class="rs-maintenance__img">
                            <img src="img/maintenance/4.jpg" loading="lazy" alt="">
                        </p>
                        <p class="rs-maintenance__title">
                            Киностудии
                        </p>
                        <p class="rs-maintenance__desc">
                            Наши автовышки орендуют для освещения съёмочных площадок, обеспечивая мощное и равномерное освещение.
                        </p>
                    </div>
                    <div class="rs-maintenance__item swiper-slide">
                        <p class="rs-maintenance__img">
                            <img src="img/maintenance/5.jpg" loading="lazy" alt="">
                        </p>
                        <p class="rs-maintenance__title">
                            Климатические организации
                        </p>
                        <p class="rs-maintenance__desc">
                            Автовышки используют для монтажа и обслуживания кондиционеров, проверки и очистки вентиляционных систем, проведения термоизоляционных и других работ.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rs-block-m-bot rs-block-bg rs-block-bg--orange">
        <div class="rs-container">
            <header>
                <h2 class="rs-title rs-title-h2 rs-title-h2--white">Преимущества работы с нами</h2>
            </header>
            <ul class="rs-advantages">
                <li>
                    <svg>
                        <use xlink:href="img/s-advantages.svg#people"></use>
                    </svg>
                    <p>Профессиональная команда</p>
                </li>
                <li>
                    <svg>
                        <use xlink:href="img/s-advantages.svg#check"></use>
                    </svg>
                    <p>Надежная техника</p>
                </li>
                <li>
                    <svg>
                        <use xlink:href="img/s-advantages.svg#dollar"></use>
                    </svg>
                    <p>Конкурентные цены</p>
                </li>
                <li>
                    <svg>
                        <use xlink:href="img/s-advantages.svg#percent"></use>
                    </svg>
                    <p>Гибкая сиситема скидок</p>
                </li>
                <li>
                    <svg>
                        <use xlink:href="img/s-advantages.svg#map"></use>
                    </svg>
                    <p>Работаем по всей Беларуси</p>
                </li>
            </ul>
        </div>
    </section>
    <section class="rs-container rs-block-m-bot rs-block-about">
        <header>
            <h2 class="rs-title rs-title-h2">Компания PенталСкай это:</h2>
        </header>
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
        <div class="rs-block-about__review">
            <div class="rs-block-about__review_video">
                <video width="320" height="240" controls muted poster="img/poster.png">
                    <source src="video/1.mp4" type="video/mp4">
                </video>
            </div>
            <div class="rs-block-about__review_desc">
                <p>
                    Наш автопарк представлен разнообразными моделями автовышек, чтобы удовлетворить потребности любого клиента.
                </p>
                <p>
                    Мы ценим наших клиентов и поэтому предлагаем демократические цены и гибкую систему скидок. Наша цель — обеспечить вас качественной техникой и высоким уровнем сервиса.
                </p>
                <p>
                    Если вам нужна автовышка — обращайтесь к нам! Мы с удовольствием поможем вам выполнить ваши задачи быстро, эффективно и без лишних затрат.
                </p>
            </div>
        </div>
    </section>
    <section class="rs-reviews rs-block-bg rs-block-bg--gray" id="reviews">
        <div class="rs-container">
            <?php include( 'template/blocks/reviews.php' );?>
        </div>
    </section>
    <?php
        include( 'template/blocks/faq.php' );
    ?>
</main>
<?php
    include( 'template/footer.php' );
    include( 'template/blocks/popup-form.php' );
    include( 'template/blocks/popup-event-success.php' );
    include( 'template/blocks/popup-event-error.php' );
?>
</body>
</html>