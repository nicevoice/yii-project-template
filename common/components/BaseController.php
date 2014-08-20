<?php

/**
 * Class CommonController
 * 前后台公用Controller类
 *
 * @author: rogee<yanghao@cyyun.com>
 */
class BaseController extends CController
{
    public $layout = "//layouts/column2";

    const JSON_MSG_TRUE  = '操作成功';
    const JSON_MSG_FALSE = '操作失败';

    public function beforeAction ( $action )
    {
        return parent::beforeAction( $action );
    }

    /**
     * Declares class-based actions.
     */
    public function actions ()
    {
     return array();
    }

    /**
     * 调用插件
     * @param $name
     * @param $param
     */
    public function Ext ( $name , $param = array() )
    {
        $name = ucfirst( strtolower( $name ) );

        $ext_full_path = sprintf( "ext.%s.%s" ,  $name , $name );

        $this->widget( $ext_full_path , $param );
    }


    /**
     * 返回用于AJAX操作的JSON数据
     *
     * @param $status  <bool|string> 返回状态值
     * @param $message <string> 与状态相符合的提示信息
     * @param $extra   <mixed(all)> 其它附加信息
     */
    public function renderJSON ( $status = TRUE , $message = '' , $extra = '' )
    {

    }
}