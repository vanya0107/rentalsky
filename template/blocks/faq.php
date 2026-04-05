<?php
// Если $faq не задан — используем дефолтный набор
if (!isset($faq)) {
    $faq = array(
        array('Как арендовать автовышку?', 'Вы можете оформить аренду по телефону, через мессенджеры или оставив заявку на сайте. Мы уточним высоту подъёма, грузоподъёмность, адрес и время работ — и подберём подходящую технику.'),
        array('Есть ли доставка по Беларуси?', 'Да, мы доставляем автовышки по всей территории Беларуси. Стоимость доставки зависит от расстояния.'),
        array('Сколько стоит аренда?', 'Стоимость аренды зависит от типа техники, нужной высоты подъема и длительности аренды. Цены начинаются от 87,5 BYN/час. Мы быстро рассчитаем стоимость после уточнения деталей.'),
        array('Работаете ли с физ. лицами?', 'Да, мы сотрудничаем как с юридическими, так и с физическими лицами. '),
        array('Какой минимальный срок аренды?', 'Минимальное время аренды составляет 4 часа: 3 часа работы + 1 час подачи техники по городу Минску. При выезде за пределы Минска дополнительно учитывается пробег и время в пути.'),
        array('Работаем ли мы в выходные и праздничные дни?', 'Да, выезд возможен в любой день, включая выходные и праздники, а так же в любое время суток.')
    );
}
if (!isset($bg_gray)) {
    $bg_gray = false;
}
?>

<section class="<?= $bg_gray ? 'rs-block rs-block-bg rs-block-bg--gray' : 'rs-container rs-block rs-block-bg'?>">
    <?= $bg_gray ? '<div class="rs-container">': ''?>
        <header>
            <h2 class="rs-title rs-title-h2 rs-title-h2--band">Часто задаваемые вопросы</h2>
        </header>
        <div class="rs-faq">
            <?php foreach($faq as $index => $item): ?>
                <div class="rs-faq__item <?= $index === 0 ? 'active' : '' ?>">
                    <h3 class="rs-faq__question" data-toggle-active=".rs-faq__item"><?= htmlspecialchars($item[0]) ?></h3>
                    <div class="rs-faq__answer">
                        <p><?= htmlspecialchars($item[1]) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?= $bg_gray ? '</div>': ''?>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php foreach($faq as $index => $item): ?>
    {
      "@type": "Question",
      "name": "<?= addslashes($item[0]) ?>",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<?= addslashes($item[1]) ?>"
      }
    }<?= $index < count($faq) - 1 ? ',' : '' ?>
    <?php endforeach; ?>
  ]
}
</script>
