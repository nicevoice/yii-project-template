<?php
/**
 * 重写CLinkPager 更改初始化属性
 * @version 2013-5-23
 * @author wwpeng
 *
 */
class LinkPager extends CLinkPager 
{
 
	public $maxButtonCount = 10;
	public $maxCount = 5;
	public $firstPageLabel = '<<';
	public $lastPageLabel = '>>';
	public $nextPageLabel = '>';
	public $prevPageLabel = '<';
    public $header = '<div class="pagination">';
    public $footer = '</div>';
	public $cssFile = false;

    public $hiddenPageCssClass = 'disabled';
    public $selectedPageCssClass = 'active';
}