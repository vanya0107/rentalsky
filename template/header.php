<header class="rs-header">
    <div class="rs-header__wrap rs-container">
        <?php if(isset($page) && $page == 'index') { ?>
            <p class="rs-header__logo">
                <img src="img/logo-header.svg" alt="РенталСкай — аренда автовышек в Минске" width="194" height="32">
            </p>
        <?php } else { ?>
            <a href="/" class="rs-header__logo">
                <img src="img/logo-header.svg" alt="РенталСкай — аренда автовышек в Минске" width="194" height="32">
            </a>
        <?php } ?>
        <nav class="rs-header__menu">
            <?php if(isset($page) && $page == 'index') { ?>
                <p class="active">Главная</p>
            <?php } else { ?>
                <a href="/">Главная</a>
            <?php } ?>
            <?php if(isset($page) && $page == 'about') { ?>
                <p class="active">О нас</p>
            <?php } else { ?>
                <a href="/about">О нас</a>
            <?php } ?>
            <?php if(isset($page) && $page == 'contacts') { ?>
                <p class="active">Контакты</p>
            <?php } else { ?>
                <a href="/contacts">Контакты</a>
                <a href="#reviews">Отзывы</a>
            <?php } ?>
        </nav>
        <div class="rs-header__contacts">
            <a href="https://www.instagram.com/oleg_avtovyshka?igsh=dnFiamVsaWUybGpv" target="_blank" aria-label="РенталСкай в Instagram">
                <svg>
                    <use xlink:href="img/s-icons.svg#instagram"></use>
                </svg>
            </a>
            <a href="tel: +375 (44) 788-94-81" aria-label="Позвонить в РенталСкай">
                <svg>
                    <use xlink:href="img/s-icons.svg#phone"></use>
                </svg>
                <span>+375 (44) 788-94-81</span>
            </a>
        </div>
        <div class="rs-header__toggle" data-toggle-active=".rs-header__menu"><div></div><div></div><div></div></div>
    </div>
</header>
