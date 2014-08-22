<?php

/**
 * Author: Rogee<rogeecn@gmail.com>
 * Date: 2013-12-04 11:22
 */
class BeginRequestBehavior extends CBehavior
{
    public function attach($owner)
    {
        $owner->attachEventHandler("onBeginRequest", array($this, "checkBrowser"));
        $owner->attachEventHandler("onBeginRequest", array($this, "setTheme"));
        $owner->attachEventHandler("onBeginRequest", array($this, "initGlobalValue"));
    }

    public function checkBrowser()
    {
        $browser = new CheckBrowser();
        if ($browser->isMobile() && $_SERVER['HTTP_HOST'] == 'qoofan.com') {
            return Response::to('http://m.qoofan.com' . $_SERVER['REQUEST_URI'], Response::RESPONSE_CODE_302);
        } elseif (!$browser->isMobile() && $_SERVER['HTTP_HOST'] == 'm.qoofan.com') {
            return Response::to('http://qoofan.com' . $_SERVER['REQUEST_URI'], Response::RESPONSE_CODE_302);
        }
    }

    /**
     * 设置当前显示主题
     */
    public function setTheme()
    {
        Yii::app()->setTheme('default');
    }

    /**
     * 初始一些值
     */
    public function initGlobalValue()
    {
        CHtml::$errorContainerTag = "span";
    }

} 