<footer class="rs-block-bg rs-block-bg--orange">
    <div class="rs-container rs-footer">
        <div class="rs-footer__left">
            <?php if (isset($page) && $page == 'index'): ?>
                <p class="rs-footer__logo">
                    <img src="img/logo-footer.svg" loading="lazy" alt="РенталСкай — автовышки Минск и Беларусь">
                </p>
            <?php else: ?>
                <a href="index.php" class="rs-footer__logo">
                    <img src="img/logo-footer.svg" loading="lazy" alt="РенталСкай — автовышки Минск и Беларусь">
                </a>
            <?php endif; ?>
            <ul class="rs-footer__details">
                <li>ООО "РенталСкай"</li>
                <li>УНП 193735242</li>
                <li>Юр. адрес: 220055, Беларусь, г. Минск, пр-д Масюковщина, д. 4, каб. 36</li>
            </ul>
        </div>
        <div class="rs-footer__right">
            <div class="rs-footer__contacts">
                <a href="tel:+375 (44) 788-94-81">
                    <svg>
                        <use xlink:href="img/s-icons.svg#phone"></use>
                    </svg>
                    <span>+375 (44) 788-94-81</span>
                </a>
                <a href="mailto:rentalskyby@gmail.com">
                    <svg>
                        <use xlink:href="img/s-icons.svg#mail-orange"></use>
                    </svg>
                    <span>rentalskyby@gmail.com</span>
                </a>
            </div>
            <div class="rs-footer__social">
                <p class="rs-footer__social_title">Мы в социальных сетях:</p>
                <div class="rs-footer__social_links">
                    <?php include('blocks/socials-4.php') ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "RentalBusiness",
  "name": "РенталСкай",
  "description": "Аренда автовышек от 12 до 45 м в Минске и по всей Беларуси",
  "telephone": "+375447889481",
  "email": "rentalskyby@gmail.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "пр-д Масюковщина, д. 4, каб. 36",
    "addressLocality": "Минск",
    "postalCode": "220055",
    "addressCountry": "BY"
  },
  "url": "https://rentalsky.by",
  "openingHours": "24/7",
  "priceRange": "от 87.5 BYN"
}
</script>
