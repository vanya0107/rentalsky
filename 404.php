<!doctype html>
<html lang="ru">
<head>
    <?php
        include('template/head.php');
        $page = 'contacts';
    ?>
    <meta name="description" content="Страница ошибки 404 сайта rentalsky.by">
    <title>Аренда автовышек. Страница с ошибкой 404</title>
</head>
<body>
<?php
    include('template/start-body.php');
    include('template/header.php');
?>
<main>
    <div class="rs-container rs-block-bg rs-404">
        <img src="img/404.png" alt="">
        <p>Страница не найдена, можете вернуться на <a href="index.php">главную</a>.</p>
    </div>
</main>
<?php
    include('template/footer.php');
?>
</body>
</html>