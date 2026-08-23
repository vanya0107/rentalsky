<div class="rs-catalog-slider__wrap swiper" data-slider="catalog">
    <div class="swiper-wrapper">
        <?php foreach ($data as $slug => $auto): ?>
            <?php if ($slug !== $catalogSlider): ?>
                <div class="rs-catalog-slider__item rs-card swiper-slide">
                    <a href="<?= $auto['catalogLink'] ?>" class="rs-card__link">
                        <div class="rs-card__img">
                            <img src="<?= $auto['previewImg'][0] ?>" loading="lazy" alt="<?= $auto['previewImg'][1] ?>" width="290" height="290">
                        </div>
                        <div class="rs-card__info">
                            <p class="rs-card__name">
                                <span><?= $auto['name'] ?></span>
                                <span><?= $auto['model'] ?></span>
                            </p>
                            <p class="rs-card__desc">
                                от <?= $auto['price']; ?> за маш./смену
                            </p>
                            <span class="rs-card__btn rs-btn rs-btn__orange">Подробнее</span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>