<?php $company = include __DIR__ . '/data/company.php'; ?>
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
                <li>Юр. адрес: <?= $company['addressLegalDisplay'] ?></li>
            </ul>
        </div>
        <div class="rs-footer__right">
            <div class="rs-footer__contacts">
                <a href="tel:<?= $company['phoneDisplay'] ?>">
                    <svg>
                        <use xlink:href="img/s-icons.svg#phone"></use>
                    </svg>
                    <span><?= $company['phoneDisplay'] ?></span>
                </a>
                <a href="mailto:<?= $company['email'] ?>">
                    <svg>
                        <use xlink:href="img/s-icons.svg#mail-orange"></use>
                    </svg>
                    <span><?= $company['email'] ?></span>
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

<?php
    $rentalBusinessSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'RentalBusiness',
        'name' => $company['name'],
        'description' => 'Аренда автовышек от 12 до 45 м в Минске и по всей Беларуси',
        'telephone' => $company['phoneRaw'],
        'email' => $company['email'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $company['address']['streetAddress'],
            'addressLocality' => $company['address']['addressLocality'],
            'postalCode' => $company['address']['postalCode'],
            'addressCountry' => $company['address']['addressCountry'],
        ],
        'url' => 'https://rentalsky.by',
        'openingHours' => 'Mo-Su 00:00-23:59',
        'priceRange' => $company['priceRange'],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Belarus',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => $company['geo']['latitude'],
            'longitude' => $company['geo']['longitude'],
        ],
        'image' => $company['image'],
        'sameAs' => [
            $company['instagramUrl'],
            $company['mapsUrl'],
        ],
    ];

    $webSiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => $company['name'],
        'url' => 'https://rentalsky.by',
        'telephone' => $company['phoneRaw'],
        'image' => $company['image'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $company['address']['streetAddress'],
            'addressLocality' => $company['address']['addressLocality'],
            'postalCode' => $company['address']['postalCode'],
            'addressCountry' => $company['address']['addressCountry'],
        ],
        'priceRange' => $company['priceRange'],
    ];
?>
<script type="application/ld+json">
<?= json_encode($rentalBusinessSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>

<script type="application/ld+json">
<?= json_encode($webSiteSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
