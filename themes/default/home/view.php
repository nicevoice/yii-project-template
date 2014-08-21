<div class="widget padding">
    <div class="widget-title">
        <h1><?php echo $article->title; ?></h1>
    </div>
    <div class="widget-info">
        <?php
        $link = EHtml::link($article->user->nickname, Url::get('mp/index', array('id' => $article->user->id)), array('target' => '_blank'));
        $pub_date = date("Y年m月d日", $article->create_date);
        echo sprintf("%s 发表于 %s 微信头条文章", $link, $pub_date);
        ?>
    </div>
    <div class="widget-content" id="article-content">
        <?php
        $this->ext('Ad', array('position' => 'article-title-top'));
        $img = EHtml::image($article->img, $article->title);
        $this->ext('Ad', array('position' => 'article-image-top'));
        echo EHtml::link($img, Url::get('a/index', array('id' => $article->id)), array('title'=>$article->title));
        $this->ext('Ad', array('position' => 'article-content-top'));
        echo $article->content;
        $this->ext('Ad', array('position' => 'article-content-bottom'));
        ?>
    </div>
    <div class="widget-footer">
        <?php
        if ($article->source !== false) {
            if (!empty($article->source->source)) {
                echo EHtml::link('阅读原文', $article->source->source, array('target' => '_blank'));
            }

            if (!empty($article->source->link)) {
                echo EHtml::link('微信原文', $article->source->link, array('target' => '_blank'));
            }
        }
        echo EHtml::link('分享到微信', 'javascript:void(0);', array('onclick' => "jiathis_sendto('weixin');return false;"));
        ?>
    </div>
</div>
<?php $this->ext('Ad', array('position' => 'article-bottom')); ?>
<?php $this->ext('RelatePost', array('user_id' => $article->user_id)); ?>
