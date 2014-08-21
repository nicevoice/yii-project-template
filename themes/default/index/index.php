<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'  => $dataProvider,
    'itemView'      => 'item',
    'itemsTagName'  => 'ul',
    'itemsCssClass' => 'article-list',
    'template'      => '{items}{pager}',
    'pagerCssClass' => 'page-wrapper clearfix',
    'ajaxUpdate'    => false,
    'pager'         => array(
        'class'                => 'CLinkPager',
        'selectedPageCssClass' => 'current',
        'header'               => '',
        'htmlOptions'          => array(
            'class' => 'page-list'
        )
    )
));
?>
