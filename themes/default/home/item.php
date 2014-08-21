<li class="widget padding clearfix">
    <div class="thumb-wrapper left">
        <?php $img = EHtml::image($data->img, $data->title, array('class' => 'thumb')); ?>
        <?php echo EHtml::link($img, Url::get('a/view', array('id'=>$data->id)), array('target' => "_blank", 'title' => $data->title)) ?>
    </div>
    <div class="content left">
        <h2>
            <?php echo EHtml::link($data->title, Url::get('a/index', array('id'=>$data->id)), array('target' => "_blank", 'title' => $data->title)) ?>
        </h2>

        <p><?php echo $data->title; ?></p>
        <small>
            <?php echo EHtml::link($data->user->nickname, Url::get('mp/index', array('id' => $data->user->id)), array('target' => '_blank')) ?>
            发表于
            <?php echo $data->getPostDate() ?>
        </small>
    </div>

</li>
