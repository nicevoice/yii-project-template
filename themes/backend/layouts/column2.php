<?php $this->beginContent( '//layouts/main' ); ?>
    <div class="span2">
        <div id="sidebar">
            <h1>SiderBar</h1>
        </div>
    </div>

    <div class="span10">
        <div class="row-fluid">
            <div class="span12">
                <?php echo $content; ?>
            </div>
        </div>
    </div>

<?php $this->endContent(); ?>