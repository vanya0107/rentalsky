<?php if (!empty($breadcrumbs)): ?>
<?php $last = count($breadcrumbs) - 1; ?>
<nav class="rs-breadcrumbs rs-container" aria-label="Хлебные крошки">
    <?php foreach ($breadcrumbs as $i => $crumb): ?>
        <?php if ($i === $last): ?>
            <span class="rs-breadcrumbs__current"><?= $crumb['label'] ?></span>
        <?php else: ?>
            <a href="<?= $crumb['url'] ?>" class="rs-breadcrumbs__link"><?= $crumb['label'] ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        <?php foreach ($breadcrumbs as $i => $crumb): ?>
        {
            "@type": "ListItem",
            "position": <?= $i + 1 ?>,
            "name": "<?= $crumb['label'] ?>"<?php if (isset($crumb['url'])): ?>,
            "item": "https://rentalsky.by<?= $crumb['url'] ?>"<?php endif; ?>
        }<?= $i < $last ? ',' : '' ?>
        <?php endforeach; ?>
    ]
}
</script>
<?php endif; ?>
