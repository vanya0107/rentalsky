<?php $company = include __DIR__ . '/../data/company.php'; ?>
<div class="rs-contacts-form__wrap">
    <div class="rs-contacts-form__info">
        <p class="rs-contacts-form__text">
            Для заказа автовышки просто свяжитесь с нами по телефону:
        </p>
        <a href="tel:<?= $company['phoneDisplay'] ?>" class="rs-contacts-form__contact big-fs">
            <svg>
                <use xlink:href="img/s-icons.svg#phone"></use>
            </svg>
            <span><?= $company['phoneDisplay'] ?></span>
        </a>
        <p class="rs-contacts-form__text">
            или напишите нам в любой социальной сети, наши специалисты с радостью помогут Вам выбрать подходящую автовышку и ответят на все Ваши вопросы. :
        </p>
        <div class="rs-contacts-form__social">
            <?php include('socials-4.php'); ?>
        </div>
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