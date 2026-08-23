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
<?php
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array_map(function ($crumb, $i) {
            $listItem = [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'name' => $crumb['label'],
            ];
            if (isset($crumb['url'])) {
                $listItem['item'] = 'https://rentalsky.by' . $crumb['url'];
            }
            return $listItem;
        }, $breadcrumbs, array_keys($breadcrumbs)),
    ];
?>
<script type="application/ld+json">
<?= json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
<?php endif; ?>
