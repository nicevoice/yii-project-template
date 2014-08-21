<div class="widget padding">
    <div class="widget-title">最新微信头条</div>
    <div class="widget-content">
        <ol class="order-list">
            <?php $i = 0; foreach($items as $item): $i++;?>
            <li>
                <span><?php echo $i; ?></span><?php echo EHtml::link($item->getCutTitle(), Url::get('a/index', array('id'=>$item->id))); ?>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>