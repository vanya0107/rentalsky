<?php $isFullReviewSchema = isset($page) && $page === 'about'; ?>
<?php $googleMapsUrl = 'https://www.google.com/maps/place/%D0%90%D1%80%D0%B5%D0%BD%D0%B4%D0%B0+%D0%B0%D0%B2%D1%82%D0%BE%D0%B2%D1%8B%D1%88%D0%BA%D0%B8+%7C+%D0%9E%D0%9E%D0%9E+%22%D0%A0%D0%B5%D0%BD%D1%82%D0%B0%D0%BB%D0%A1%D0%BA%D0%B0%D0%B9%22/@53.9259494,27.4491679,16.75z/data=!4m16!1m9!3m8!1s0xa3d734646122f877:0xc5138dfa36872c0f!2z0JDRgNC10L3QtNCwINCw0LLRgtC-0LLRi9GI0LrQuCB8INCe0J7QniAi0KDQtdC90YLQsNC70KHQutCw0Lki!8m2!3d53.9258763!4d27.4514404!9m1!1b1!16s%2Fg%2F11ww3d7q1_!3m5!1s0xa3d734646122f877:0xc5138dfa36872c0f!8m2!3d53.9258763!4d27.4514404!16s%2Fg%2F11ww3d7q1_'; ?>
<header class="rs-reviews__header">
    <h2 class="rs-title rs-title-h2 rs-title-h2--band">Отзывы наших клиентов</h2>
    <a href="<?= $googleMapsUrl ?>" target="_blank" rel="noopener" class="rs-reviews__google-link">
        <svg><use xlink:href="img/s-icons.svg#google"></use></svg>
        Смотреть все отзывы в Google Картах
    </a>
</header>
<div class="rs-reviews__slider swiper" data-slider="reviews">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="rs-reviews__item rs-reviews__item--google">
                <p class="rs-reviews__avatar">
                    <img src="img/reviews/avatar-igor.webp" loading="lazy" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Igor Petrovich <svg class="rs-reviews__google-badge"><use xlink:href="img/s-icons.svg#google"></use></svg></p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__desc">
                        Очень доволен работой с Rentalsky. Заказывал автовышку для строительных работ — техника в отличном состоянии, доставка была точно в срок, а ребята помогли выбрать подходящий вариант под мои задачи. Общение было приятным и по делу, чувствовал себя уверенно. Рекомендую - всё прошло гладко и без заминок.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item rs-reviews__item--google">
                <p class="rs-reviews__avatar">
                    <img src="img/reviews/avatar-batyr.webp" loading="lazy" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Batyr Saparaliev <svg class="rs-reviews__google-badge"><use xlink:href="img/s-icons.svg#google"></use></svg></p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__desc">
                        Искал срочно автовышку для ремонта кровли частного дома. Оперативно отозвались, помогли с подбором и быстро приехали. Все что нужно было сделали. В следующий раз буду обязательно обращаться!
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item rs-reviews__item--google">
                <p class="rs-reviews__avatar">
                    <img src="img/reviews/avatar-veronika.webp" loading="lazy" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Вероника Набокина <svg class="rs-reviews__google-badge"><use xlink:href="img/s-icons.svg#google"></use></svg></p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__desc">
                        Обращались за автовышкой. Все понравилось. Будем сотрудничать дальше.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item rs-reviews__item--google">
                <p class="rs-reviews__avatar">
                    <img src="img/reviews/avatar-ivan.webp" loading="lazy" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Ivan Slatvinski <svg class="rs-reviews__google-badge"><use xlink:href="img/s-icons.svg#google"></use></svg></p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__desc">
                        Отличный сервис! Машина исправная, оператор вежливый, приехали вовремя. Всё чётко и по делу. Рекомендую компанию как надежного подрядчика!
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item">
                <p class="rs-reviews__avatar">
                    <img src="img/avatar-default.png" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Тиханский Альбрет Альбертович</p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__company">Директор ООО «КлиматКофрот»</p>
                    <p class="rs-reviews__desc">
                        Работаю с ними не первый год, никогда не подводили. Всегда вовремя приезжают и всю работу выполняют чётко. Цены всегда адекватные входят в положение и делают скидки. ВСЕМ РЕКОМЕНДУЮ.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item">
                <p class="rs-reviews__avatar">
                    <img src="img/avatar-default.png" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Маковчик Денис Дмитриевич</p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__company">Директор ЧУП «Альпроффасад»</p>
                    <p class="rs-reviews__desc">
                        Хочу выразить Вам свою благодарность за автовышку-телескоп.
                        Как мне доложили, машинка оказалась супер, даже люлька регулируется. Теперь будем только эту автовышку заказывать.
                        Надеюсь на дальнейшее плодотворное сотрудничество с Вами. Спасибо.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item">
                <p class="rs-reviews__avatar">
                    <img src="img/avatar-default.png" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Сергей Комоско Вечаславович</p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__company">Директор ООО «Индустрия рекламы»</p>
                    <p class="rs-reviews__desc">
                        Уже давно сотрудничаем с ООО «РенталСкай». Никогда не подводили, никогда проблем и накладок не было. Техника всегда подаётся без задержек. Что очень важно, они всегда на связи, в любое время можно позвонить или написать и заказать вышку. При этом цены демократичные. Можно договориться о скидке. Будем и дальше с ними сотрудничать.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item">
                <p class="rs-reviews__avatar">
                    <img src="img/avatar-default.png" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Трахневич Евгений Марьянович</p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__company">Заместитель директора ООО «Монолит Гарант Систем»</p>
                    <p class="rs-reviews__desc">
                        Отличная организация для аренды автовышек! Профессиональный подход к клиентам, быстрая и своевременная подача  и высокое качество техники обеспечивают комфорт в работе. Рекомендую всем!
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item">
                <p class="rs-reviews__avatar">
                    <img src="img/avatar-default.png" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Чумак Наталья Руслановна</p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__company">Диспетчер РУП «Минскэнерго» ф-л «Минскэнергоспецремонт»</p>
                    <p class="rs-reviews__desc">
                        Заказывали автовышку - остались довольны!
                        Услуга предоставлена вовремя, все оперативно и качественно. Не пришлось ждать и нервничать, все сделали быстро и профессионально.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item">
                <p class="rs-reviews__avatar">
                    <img src="img/avatar-default.png" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Семенюк Даниил Иванович</p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__company">Cпециалист по закупкам ООО «Стройплац»</p>
                    <p class="rs-reviews__desc">
                        Спасибо. С вышкой действительно быстрее и проще работать.
                        Отдельная благодарность, что без задержек, все оперативно. И цена отличная. Буду обращаться теперь к вам постоянно.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item rs-reviews__item--google">
                <p class="rs-reviews__avatar">
                    <img src="img/reviews/avatar-alexandr.webp" loading="lazy" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Александр Михеев <svg class="rs-reviews__google-badge"><use xlink:href="img/s-icons.svg#google"></use></svg></p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                    <p class="rs-reviews__desc">
                        Обращался за автовышкой. Помогли с подбором и оперативно подали машину на объект. Рекомендуем.
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="rs-reviews__item rs-reviews__item--google">
                <p class="rs-reviews__avatar">
                    <img src="img/reviews/avatar-oleg.webp" loading="lazy" alt="">
                </p>
                <div class="rs-reviews__info">
                    <p class="rs-reviews__name">Масло Олег <svg class="rs-reviews__google-badge"><use xlink:href="img/s-icons.svg#google"></use></svg></p>
                    <p class="rs-reviews__rating"><svg><use xlink:href="img/s-icons.svg#star"></use></svg> 5,0</p>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<?php if ($isFullReviewSchema): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "РенталСкай",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "bestRating": "5",
    "reviewCount": "12"
  },
  "review": [
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Ivan Slatvinski" },
      "reviewBody": "Отличный сервис! Машина исправная, оператор вежливый, приехали вовремя. Всё чётко и по делу. Рекомендую компанию как надежного подрядчика!"
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Igor Petrovich" },
      "reviewBody": "Очень доволен работой с Rentalsky. Заказывал автовышку для строительных работ — техника в отличном состоянии, доставка была точно в срок, а ребята помогли выбрать подходящий вариант под мои задачи. Общение было приятным и по делу, чувствовал себя уверенно. Рекомендую - всё прошло гладко и без заминок."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Batyr Saparaliev" },
      "reviewBody": "Искал срочно автовышку для ремонта кровли частного дома. Оперативно отозвались, помогли с подбором и быстро приехали. Все что нужно было сделали. В следующий раз буду обязательно обращаться!"
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Вероника Набокина" },
      "reviewBody": "Обращались за автовышкой. Все понравилось. Будем сотрудничать дальше."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Тиханский Альбрет Альбертович" },
      "reviewBody": "Работаю с ними не первый год, никогда не подводили. Всегда вовремя приезжают и всю работу выполняют чётко. Цены всегда адекватные входят в положение и делают скидки. ВСЕМ РЕКОМЕНДУЮ."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Маковчик Денис Дмитриевич" },
      "reviewBody": "Хочу выразить Вам свою благодарность за автовышку-телескоп. Как мне доложили, машинка оказалась супер, даже люлька регулируется. Теперь будем только эту автовышку заказывать. Надеюсь на дальнейшее плодотворное сотрудничество с Вами. Спасибо."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Сергей Комоско Вечаславович" },
      "reviewBody": "Уже давно сотрудничаем с ООО «РенталСкай». Никогда не подводили, никогда проблем и накладок не было. Техника всегда подаётся без задержек. Что очень важно, они всегда на связи, в любое время можно позвонить или написать и заказать вышку. При этом цены демократичные. Можно договориться о скидке. Будем и дальше с ними сотрудничать."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Трахневич Евгений Марьянович" },
      "reviewBody": "Отличная организация для аренды автовышек! Профессиональный подход к клиентам, быстрая и своевременная подача и высокое качество техники обеспечивают комфорт в работе. Рекомендую всем!"
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Чумак Наталья Руслановна" },
      "reviewBody": "Заказывали автовышку - остались довольны! Услуга предоставлена вовремя, все оперативно и качественно. Не пришлось ждать и нервничать, все сделали быстро и профессионально."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Семенюк Даниил Иванович" },
      "reviewBody": "Спасибо. С вышкой действительно быстрее и проще работать. Отдельная благодарность, что без задержек, все оперативно. И цена отличная. Буду обращаться теперь к вам постоянно."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Александр Михеев" },
      "reviewBody": "Обращался за автовышкой. Помогли с подбором и оперативно подали машину на объект. Рекомендуем."
    },
    {
      "@type": "Review",
      "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
      "author": { "@type": "Person", "name": "Масло Олег" }
    }
  ]
}
</script>
<?php else: ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "РенталСкай",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "bestRating": "5",
    "reviewCount": "12"
  }
}
</script>
<?php endif; ?>
