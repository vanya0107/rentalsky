<?php
// Путь к текущей папке
$baseDir = dirname(__FILE__);

// Загружаем базу
$data = include($baseDir . '/template/data/avtovishka.php');

// Получаем slug из URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : null;

// Проверяем наличие машины
if ($slug && isset($data[$slug])) {

$car = $data[$slug];
$catalogSlider = $car['catalogSlider'];

?><!doctype html>
<html lang="ru">
<head>
    <?php include($baseDir . '/template/head.php'); ?>
    <meta name="description" content="<?php echo $car['headDesc']; ?>">
    <meta name="keywords" content="<?php echo $car['headKey']; ?>">
    <title><?php echo $car['headTitle']; ?></title>
    <link rel="canonical" href="https://rentalsky.by/<?php echo $car['catalogLink']; ?>">
</head>
<body>
<?php
    include($baseDir . '/template/start-body.php');
    include($baseDir . '/template/header.php');
?>
<main>
    <div class="rs-container rs-block-bg rs-block-m-bot">
        <header>
            <h1 class="rs-title rs-title-h2 rs-title-h2--band">
                <?php echo $car['name']; ?> <?php echo $car['model']; ?>
            </h1>
        </header>
        <?php if(isset($car['seoText'])): ?>
            <div class="rs-content-style rs-seo-text">
                <p><?php echo $car['seoText']; ?></p>
            </div>
        <?php endif; ?>
        <div class="rs-avtovishka">
            <div class="rs-avtovishka__sliders">
                <div class="rs-avtovishka__slider-big swiper" data-slider="avtovishka" data-popup-imgs>
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($car['sliderImg'] as $slide) {
                            echo '<div class="rs-avtovishka__slider-big_item swiper-slide">';
                            echo '<img src="' . $slide['big'] . '" alt="' . $slide['alt'] . '" data-popup-img-src>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <div class="rs-avtovishka__slider-small swiper">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($car['sliderImg'] as $slide) {
                            echo '<div class="rs-avtovishka__slider-small_item swiper-slide">';
                            echo '<img src="' . $slide['small'] . '" alt="' . $slide['alt'] . '" data-popup-img-src>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="rs-avtovishka__graph_wrap">
                <p class="rs-avtovishka__graph_price">
                    Стоимость работы за смену: от <b><?php echo $car['price']; ?></b>
                </p>
                <div class="rs-avtovishka__graph">
                    <p class="rs-avtovishka__graph_title">Рабочая зона</p>
                    <p class="rs-avtovishka__graph_img" data-toggle-active=".rs-avtovishka__graph">
                        <img src="<?php echo $car['graphImg']; ?>" alt="">
                    </p>
                    <button type="button" class="rs-avtovishka__graph_btn rs-btn rs-btn__orange"
                            data-popup=".rs-popup-form.callback">
                        Заказать автовышку
                    </button>
                    <button type="button" class="rs-avtovishka__graph_close" data-toggle-active=".rs-avtovishka__graph">
                        <svg>
                            <use xlink:href="img/s-icons.svg#close"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="rs-avtovishka_table">
            <p class="rs-avtovishka__table_title">Технические характеристики:</p>
            <table class="rs-avtovishka__table_table">
                <?php
                foreach ($car['tableParams'] as $param) {
                    echo '<tr>';
                    echo '<td>' . $param[0] . '</td>';
                    echo '<td>' . $param[1] . '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>

    <section class="rs-catalog-slider rs-block-bg rs-block-bg--gray rs-block-m-bot">
        <div class="rs-container">
            <header>
                <h2 class="rs-title rs-title-h2 rs-title-h2--band">Смотреть еще:</h2>
            </header>
            <?php include($baseDir . '/template/blocks/catalog-slider.php'); ?>
        </div>
    </section>

    <section class="rs-container rs-block-bg rs-contacts-form">
        <header>
            <h2 class="rs-title rs-title-h2 rs-title-h2--band">Как заказать автовышку?</h2>
        </header>
        <?php include($baseDir . '/template/blocks/contacts-form-single-page.php'); ?>
    </section>
    <section class="rs-reviews rs-block-bg rs-block-bg--gray" id="reviews">
        <div class="rs-container">
            <?php include($baseDir . '/template/blocks/reviews.php'); ?>
        </div>
    </section>
    <?php
        if(isset($car['faq'])) {
            $faq = $car['faq'];
            include('template/blocks/faq.php');
        }
    ?>

</main>

<?php
    include($baseDir . '/template/footer.php');
    include($baseDir . '/template/blocks/popup-form.php');
    include($baseDir . '/template/blocks/popup-event-success.php');
    include($baseDir . '/template/blocks/popup-event-error.php');
    include($baseDir . '/template/blocks/popup-for-imgs.php');
?>
</body>
</html>
<?php
} else {
    // 404
    header("HTTP/1.0 404 Not Found");
    echo "<h1>Автомобиль не найден</h1>";
}
?>
