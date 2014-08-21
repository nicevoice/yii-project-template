<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class E_PageTitle extends CWidget
{
    public function run()
    {
        $page_title = sprintf('<h1><a href="/" title="酷饭网" style="font-size: 22px;margin: 0;">酷饭网</a></h1> 聚合全网微信头条！');

        $this->render('page_title', compact('page_title'));
    }
} 