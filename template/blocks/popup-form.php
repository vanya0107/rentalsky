<aside class="rs-popup-form callback">
    <div class="rs-popup-form__wrap">
        <button type="button" class="rs-popup-form__close" data-popup=".rs-popup-form.callback">
            <svg>
                <use xlink:href="img/s-icons.svg#close"></use>
            </svg>
        </button>
        <p class="rs-popup-form__title">Закажите автовышку прямо сейчас</p>
        <p class="rs-popup-form__desc">
            Заполните форму ниже и мы обязательно свяжемся с Вами в ближайшее время!
        </p>
        <form class="rs-popup-form__form" method="post" data-form>
            <div class="rs-popup-form__input">
                <input
                        type="text"
                        placeholder="Ваше Имя"
                        aria-label="Ваше Имя"
                        name="name"
                >
                <p class="rs-popup-form__err">Введите не менее 2 символов!</p>
            </div>
            <div class="rs-popup-form__input">
                <input
                        type="number"
                        placeholder="+375 (29) 555-55-55"
                        aria-label="Номер телефона"
                        name="phone"
                >
                <p class="rs-popup-form__err">Введите корректный номер телефона!</p>
            </div>
            <div class="rs-popup-form__input">
                <input
                    type="email"
                    placeholder="E-mail"
                    aria-label="E-mail"
                    name="email"
                >
                <p class="rs-popup-form__err">Введите корректный email!</p>
            </div>
            <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;">
            <button type="submit" class="rs-popup-form__btn rs-btn rs-btn__orange">
                Заказать звонок
            </button>
        </form>
    </div>
</aside>
