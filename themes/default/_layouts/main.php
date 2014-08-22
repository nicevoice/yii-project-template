<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <title><?php echo $this->get_title(); ?></title>
    <meta name="keywords" content="<?php echo $this->get_keywords() ?>" />
    <meta name="description" content="<?php echo $this->get_description() ?>" />
    <link rel="stylesheet" href="/css/qoofan.css?ver=1.15"/>
    <!--[if IE]>
    <style>
        #article-list .content h2 a, .name-title{
            font-weight: bold;
        }
        body {
            background-color: #ccc;
        }
    </style>
    <![endif]-->
</head>
<body>
<?php $this->ext('Menu'); ?>
<?php $this->Ext('PageTitle'); ?>

<?php echo $content; ?>

<!--footer-->
<div id="footer" class="padding">
    <div class="container">
        <!--<div class="line"></div>-->
        <div class="text-center">
            Copyright © 2012 - 2014 <a href="http://qoofan.com">酷饭网</a>. All Rights Reserved.<a href="http://qoofan.com/sitemap.xml">Sitemap</a>
        </div>
    </div>
</div>
<?php $this->renderPartial('//_public/footer') ?>
</body>
</html>