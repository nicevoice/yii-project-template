<?php

/**
 * Class CommonController
 * 前后台公用Controller类
 */
class BaseController extends CController
{
    public $layout = "//_layouts/column2";

    /**
     * 调用插件
     * @param $name
     * @param $param
     */
    public function Ext ( $name , $param = array() )
    {
        $name = ucfirst( strtolower( $name ) );
        $ext_full_path = sprintf( "ext.E_%s.E_%s" ,  $name , $name );
        $this->widget( $ext_full_path , $param );
    }

    public function get_title()
    {

    }

    public function get_keywords()
    {

    }

    public function get_description()
    {

    }
}