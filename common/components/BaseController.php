<?php

/**
 * Class CommonController
 * 前后台公用Controller类
 */
class BaseController extends CController
{
    public $layout = "//_layouts/column2";

    protected static $_title = '酷饭网-微信头条(qoofan.com)';
    protected static $_keywords = "酷饭网，微头条,微信公众平台,微信内容,公众账号,微信聚合，微信头条,微精选，微信精选，推荐公众账号";
    protected static $_description = "酷饭网，微信头条-酷饭网 qoofan.com 精选聚合微信头条，不再需要订阅，即可知道微信全网头条！！！";

    protected $limit = 20;

    /**
     * 调用插件
     * @param $name
     * @param $param
     */
    public function Ext($name, $param = array())
    {
        $name          = ucfirst($name);
        $ext_full_path = sprintf("ext.E_%s.E_%s", $name, $name);
        $this->widget($ext_full_path, $param);
    }

    public function get_title()
    {
        return self::$_title;
    }

    public function get_keywords()
    {
        return self::$_keywords;
    }

    public function get_description()
    {
        return self::$_description;
    }


    protected function prepend_title($text)
    {
        if (!is_array($text)) {
            $text = [$text];
        }

        self::$_title = implode(' - ', $text) . self::$_title;
    }

    protected function prepend_keywords($keywords)
    {
        if (!is_array($keywords)) {
            $keywords = explode(',', $keywords);
        }

        self::$_keywords = implode(',', $keywords) . self::$_keywords;
    }


    protected function set_description($description)
    {
        self::$_description = $description;
    }
}