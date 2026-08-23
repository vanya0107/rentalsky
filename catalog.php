<?php
    $data = include('template/data/avtovishka.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <?php
        include('template/head.php');
        $page = 'catalog';
    ?>
    <meta name="description" content="Каталог автовышек РенталСкай — 9 моделей высотой от 12 до 45 метров. Сравните характеристики и подберите технику под вашу задачу. Аренда по Минску и всей Беларуси.">
    <meta name="keywords" content="каталог автовышек, модели автовышек Минск, автовышки на выбор">
    <title>Каталог — РенталСкай</title>
    <link rel="canonical" href="https://rentalsky.by/catalog">
</head>
<body>
<?php
    include('template/start-body.php');
    include('template/header.php');
    $breadcrumbs = [
        ['label' => 'Главная', 'url' => '/'],
        ['label' => 'Каталог'],
    ];
    include('template/blocks/breadcrumbs.php');

    $itemListElements = [];
    $position = 1;
    foreach ($data as $auto) {
        $itemListElements[] = [
            '@type' => 'ListItem',
            'position' => $position++,
            'url' => 'https://rentalsky.by/' . $auto['catalogLink'],
        ];
    }
    $itemListSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'itemListElement' => $itemListElements,
    ];
?>
<script type="application/ld+json">
<?= json_encode($itemListSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
<main>
    <div class="rs-hero">
        <picture class="rs-hero__bg">
            <source srcset="img/hero/catalog-mobile.webp" media="(max-width: 700px)">
            <img src="img/hero/catalog.webp" alt="Каталог автовышек РенталСкай" width="1920" height="200" fetchpriority="high">
        </picture>
        <div class="rs-hero__wrap rs-container">
            <h1 class="rs-hero__title">Каталог автовышек РенталСкай</h1>
        </div>
    </div>
    <div class="rs-block-m-bot rs-block-bg rs-block-bg--gray">
        <div class="rs-container rs-content-style">
            <p>
                В парке РенталСкай — 9 моделей автовышек высотой от 12 до 45 метров. Они отличаются не только высотой подъёма, но и вылетом стрелы, грузоподъёмностью люльки и типом шасси — от манёвренных компактных моделей для городских дворов до тяжёлой техники для промышленных объектов. Ниже — по каждой модели: чем она отличается от соседних по парку и когда стоит выбрать именно её.
            </p>
        </div>
    </div>
    <section class="rs-block-m-bot rs-catalog-list rs-catalog-list--fullW">
        <div class="rs-container">
            <ul class="rs-catalog-list__wrap">
                <?php foreach ($data as $auto): ?>
                    <li class="rs-catalog-list__item rs-card">
                        <a href="<?= $auto['catalogLink'] ?>" class="rs-card__link">
                            <div class="rs-card__img">
                                <img src="<?= $auto['previewImg'][0] ?>" loading="lazy" alt="<?= $auto['previewImg'][1] ?>" width="290" height="290">
                            </div>
                            <div class="rs-card__info">
                                <p class="rs-card__name">
                                    <span><?= $auto['name'] ?></span>
                                    <span><?= $auto['model'] ?></span>
                                </p>
                                <p class="rs-card__desc">от <?= $auto['price'] ?> за маш./смену</p>
                                <p class="rs-card__text"><?= $auto['catalogText'] ?></p>
                                <span class="rs-card__btn rs-btn rs-btn__orange">Подробнее</span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <section class="rs-container rs-contacts-form rs-block-m-bot rs-block-bg rs-block-bg--gray">
        <header>
            <h2 class="rs-title rs-title-h2 rs-title-h2--band">Как заказать автовышку?</h2>
        </header>
        <?php include('template/blocks/contacts-form-single-page.php'); ?>
    </section>
    <?php
        $faq = array(
            array('Как понять, какая высота автовышки нужна?', 'Ориентируйтесь на высоту объекта, с которым предстоит работать, и добавьте запас: рабочая высота автовышки — это высота подъёма люльки, а не максимальная точка, до которой можно дотянуться с инструментом. Если сомневаетесь — позвоните нам, поможем подобрать модель под конкретную задачу.'),
            array('Что важнее — высота подъёма или вылет стрелы?', 'Зависит от задачи. Если нужно подняться прямо вверх (например, вдоль фасада) — важнее высота. Если нужно дотянуться в сторону через препятствие, ограждение или водоём — важнее вылет стрелы. У моделей одной высоты вылет может заметно отличаться, это видно в описании каждой модели выше.'),
            array('Можно ли заказать сразу несколько моделей?', 'Да, если объём работ большой или нужна одновременно техника разной высоты — подберём и согласуем подачу нескольких автовышек на объект.'),
            array('Чем отличаются модели одинаковой высоты (например, 28 метров)?', 'В нашем парке две модели высотой 28 метров — на разных шасси (МАЗ и Iveco), с разным вылетом стрелы и манёвренностью. Разница описана в карточках каждой модели выше — сравните перед заказом.')
        );
        $bg_gray = false;
        include('template/blocks/faq.php');
    ?>
</main>
<?php
    include('template/footer.php');
    include('template/blocks/popup-form.php');
    include('template/blocks/popup-event-success.php');
    include('template/blocks/popup-event-error.php');
?>
</body>
</html>
