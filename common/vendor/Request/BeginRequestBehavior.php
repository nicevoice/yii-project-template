<?php

/**
 * Author: Rogee<rogeecn@gmail.com>
 * Date: 2013-12-04 11:22
 */
class BeginRequestBehavior extends CBehavior
{
    public function attach($owner)
    {
        $owner->attachEventHandler("onBeginRequest", array($this, "setTheme"));
        $owner->attachEventHandler("onBeginRequest", array($this, "initGlobalValue"));
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