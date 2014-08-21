<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset>
    <?php foreach ($items as $item): ?>
    <url>
        <loc>http://qoofan.com<?php echo Url::get('cat/index', array('id'=>$item->id)); ?></loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>
    <?php endforeach; ?>
</urlset>