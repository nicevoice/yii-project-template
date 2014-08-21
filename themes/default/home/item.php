<li class="widget padding clearfix">
    <div class="thumb-wrapper left">
        <?php $img = EHtml::image($data->img, $data->title, array('class' => 'thumb')); ?>
        <?php echo EHtml::link($img, Url::get('a/view', array('id' => $data->id)), array('target' => "_blank", 'title' => $data->title)) ?>
    </div>
    <div class="content left">
        <h2>
            <?php
            $url = Url::get('a/index', array('id' => $data->id));
            echo EHtml::link($data->title, $url, array('target' => "_blank", 'title' => $data->title));
            ?>
        </h2>

        <p><?php echo $data->title; ?></p>

        <?php $user_link = EHtml::link($data->user->nickname, Url::get('mp/index', array('id' => $data->user->id)), array('target' => '_blank')) ?>
        <?php $date = $data->getPostDate(); ?>
        <small><?php echo sprintf("%s 发表于 %s", $user_link, $date); ?></small>
    </div>

</li>
