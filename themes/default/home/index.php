<?php
$this->widget('ext.widget.ListView', array(
    'cssFile'       => false,
    'dataProvider'  => $dataProvider,
    'itemView'      => '/home/item',
    'itemsTagName'  => 'ul',
    'itemsCssClass' => 'article-list',
    'template'      => '{items}{pager}',
    'pagerCssClass' => 'page-wrapper clearfix',
    'ajaxUpdate'    => false,
    'pager'         => array(
        'class'                => 'CLinkPager',
        'cssFile'              => false,
        'selectedPageCssClass' => 'current',
        'header'               => '',
        'htmlOptions'          => array(
            'class' => 'page-list'
        )
    )
));
?>
