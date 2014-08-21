<!-- 相关文章 -->
<div class="widget padding">
    <div class="widget-title">
        <?php
        echo EHtml::link($user->nickname, Url::get('mp/index', array('id' => $user->id)));
        ?>
        发布的最新微信文章头条
    </div>
    <div class="widget-content">
        <ol class="order-list">
            <?php
            $i = 1;
            foreach ($items as $article):
            ?>
            <li>
                <span><?php echo $i++; ?></span>
                <?php echo EHtml::link($article->title, Url::get('a/index', array('id' => $article->id), array("class" => "list-group-item"))) ?>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>
<!-- 相关文章 end -->