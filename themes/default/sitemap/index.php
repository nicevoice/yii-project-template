<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex>
    <sitemap>
        <loc>http://qoofan.com/_sitemap/cat.xml</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </sitemap>
    <sitemap>
        <loc>http://qoofan.com/_sitemap/mp.xml</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </sitemap>
    <?php foreach ($items as $item): ?>
    <sitemap>
        <loc>http://qoofan.com/_sitemap/<?php echo $item->page; ?>.xml</loc>
        <lastmod><?php echo date("Y-m-d", $item->update_date); ?></lastmod>
    </sitemap>
    <?php endforeach; ?>
</sitemapindex>