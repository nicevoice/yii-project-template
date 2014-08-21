<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset>
    <?php foreach ($items as $item): ?>
    <url>
        <loc>http://qoofan.com<?php echo Url::get('a/index', array('id'=>$item->id)); ?></loc>
        <lastmod><?php echo date("Y-m-d", $item->create_date); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <?php endforeach; ?>
</urlset>