<?php $this->beginContent( '//_layouts/main' ); ?>
    <!-- 正文-->
    <div class="container clearfix">
        <div id="main">
            <?php echo $content; ?>
        </div>
        <div id="side">
            <?php $this->ext('LatestArticle') ?>
        </div>
    </div>
<?php $this->endContent(); ?>