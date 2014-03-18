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
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'error'       => array(
                'class' => 'common.actions.ErrorAction' ,
            ) ,
            'login'       => array(
                'class' => 'common.actions.ELoginAction' ,
            ) ,
            'uploadimage' => array(
                'class' => 'common.actions.EUploadImageAction' ,
            ) ,
            'e'           => array(
                'class' => 'common.actions.EAction' ,
            ) ,
        );
    }

    /**
     * 调用插件
     * @param $name
     * @param $param
     */
    public function Ext ( $name , $param = array() )
    {
        $prefix = "Front";
        if ( defined( "_ADMIN_" ) && _ADMIN_ ) {
            $prefix = "Admin";
        }
        $name = ucfirst( strtolower( $name ) );

        $ext_full_path = sprintf( "ext.%s.E_%s.E_%s" , $prefix , $name , $name );

        $this->widget( $ext_full_path , $param );
    }

    /**
     * 调用能用组件
     * @param $name
     * @param $param
     */
    public function Com ( $name , $param = array() )
    {
        $prefix        = "Common";
        $ext_full_path = sprintf( "ext.%s.E_%s.E_%s" , $prefix , $name , $name );
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
        if ( is_array( $status ) ) {
            if ( empty( $message ) && isset( $status[ 'message' ] ) ) {
                $message = $status[ 'message' ];
            }
            if ( empty( $extra ) && isset( $status[ 'extra' ] ) ) {
                $extra = $status[ 'extra' ];
            }
            if ( isset( $status[ 'status' ] ) ) {
                $status = $status[ 'status' ];

            } else {

                $status = TRUE;
            }
        }
        //如果MESSAGE为空的时候配置默认常量值
        if ( $status && empty( $message ) ) {
            $message = self::JSON_MSG_TRUE;

        } elseif ( $status == FALSE && empty( $message ) ) {

            $message = self::JSON_MSG_FALSE;
        }

        $json_back = array(
            'status'  => $status ,
            'message' => $message ,
            'extra'   => $extra
        );

        header( 'Content-type: application/json; charset=utf-8' );
        echo json_encode( $json_back );
        exit;
    }

    /**
     * 异常请求
     */
    public function invalidRequest ()
    {
        $this->layout = FALSE;
        $this->render( '//public/invalid_request' );
        exit;
    }

    /**
     * 显示一个空模板
     */
    public function renderEmpty ( $word = "没有数据可显示！" )
    {
        $this->render( '//public/empty_list' , array( 'data' => $word ) );
    }


}