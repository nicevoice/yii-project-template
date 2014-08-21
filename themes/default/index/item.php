<li class="widget padding clearfix">
    <div class="thumb-wrapper left">
        <?php $img = CHtml::image($data->img, $data->title, array('class' => 'thumb')); ?>
        <?php echo CHtml::link($img, Url::get('a/view', array('id'=>$data->id)), array('target' => "_blank", 'title' => $data->title)) ?>
    </div>
    <div class="content left">
        <h2>
            <?php echo CHtml::link($data->title, Url::get('a/view', array('id'=>$data->id)), array('target' => "_blank", 'title' => $data->title)) ?>
        </h2>

        <p><?php echo $data->title; ?></p>
        <small>
            <?php echo CHtml::link($data->user->nickname, Url::get('mp/view', array('id' => $data->id)), array('target' => '_blank')) ?>
            发表于
            <?php echo $data->getPostDate() ?>
        </small>
    </div>

</li>
