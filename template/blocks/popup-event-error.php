<?php $company = include __DIR__ . '/../data/company.php'; ?>
<aside class="rs-popup-form event error">
    <div class="rs-popup-form__wrap">
        <button type="button" class="rs-popup-form__close" data-popup=".rs-popup-form">
            <svg>
                <use xlink:href="img/s-icons.svg#close"></use>
            </svg>
        </button>
        <p class="rs-popup-form__desc">
            Что то пошло не так, попробуйте еще раз или свяжитесь по номеру телефона<br><a href="tel:<?= $company['phoneDisplay'] ?>"><?= $company['phoneDisplay'] ?></a>
        </p>
    </div>
</aside>