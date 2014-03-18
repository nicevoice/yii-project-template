<?php
/**
 * Class H
 * Helper 类
 */
class H
{
    const FRONT_SHOW = 0;
    const ADMIN_SHOW = 1;

    const DO_UPDATE = 1;
    const DO_CREATE = 2;
    const DO_DELETE = 3;
    const DO_COPY   = 4;

    /**
     * 获得CUrlManager类的实例
     *
     * @version 2013-11-6
     * @author  wwpeng
     *
     * @param string $attr
     */
    public static function urlManager ( $attr = NULL )
    {
        if ( !is_null( $attr ) ) {
            return Yii::app()->urlmanager->$attr;
        }

        return Yii::app()->urlmanager;
    }

    /**
     * ajax 验证
     *
     * @param $model
     */
    public static function performAjaxValidation ( $model )
    {
        if ( isset( $_POST[ 'ajax' ] ) ) {
            echo CActiveForm::validate( $model );
            Yii::app()->end();
        }
    }

    public static function Cookie ( $name = FALSE , $value = FALSE , $expire = 0 )
    {
        $cookie = Yii::app()->request->getCookies();

        if ( self::is_false( $name ) ) {
            return $cookie;
        }
        if ( !self::is_false( $name ) && self::is_false( $value ) ) {
            return isset( $cookie[ $name ] ) ? $cookie[ $name ]->value : NULL;
        }

        $new_cookie         = new CHttpCookie( $name , $value );
        $new_cookie->expire = $expire;
        $cookie[ $name ]    = $new_cookie;
    }

    /**
     * 返回当前Controller
     *
     * @return CController
     */
    public static function Controller ()
    {
        return Yii::app()->controller;
    }

    /**
     * 获取WebUser属性
     *
     * @param null $param 如果为空返回整个ＷｅｂＵｓｅｒ对象
     *
     * @return mixed
     */
    public static function User ( $param = NULL )
    {
        if ( !is_null( $param ) ) {
            return Yii::app()->user->$param;
        }

        return Yii::app()->user;
    }

    /**
     * 返回当前是来客访问
     * @return mixed
     */
    public static function isGuest ()
    {
        return self::User()->isGuest;
    }

    /**
     * 用户保存的session值
     *
     * @param $key
     *
     * @return mixed
     */
    public static function getState ( $key )
    {
        $state = self::user()->getState( $key );

        return $state;
    }

    /**
     * 设置用户参数值
     * @param $key
     * @param $value
     */
    public static function setState ( $key , $value )
    {
        self::user()->setState( $key , $value );
    }

    /**
     * 返回请求变量值
     * @param $attr
     *
     * @return mixed
     */
    public static function Param ( $attr , $deafultValue = NULL )
    {
        $_get  = isset( $_GET[ $attr ] ) ? $_GET[ $attr ] : array();
        $_post = isset( $_POST[ $attr ] ) ? $_POST[ $attr ] : array();
        if ( is_array( $_post ) && is_array( $_get ) ) {
            $value = array_merge( $_post , $_get );
        } else {
            $value = empty( $_get ) ? ( empty( $_post ) ? $deafultValue : $_post ) : $_get;
        }

        return $value;
    }

    /**
     * 返回request相关
     *
     * @param null $attr
     *
     * @return mixed
     */
    public static function request ( $attr = NULL )
    {
        if ( !is_null( $attr ) ) {
            return Yii::app()->request->$attr;
        } else {
            return Yii::app()->request;
        }
    }

    /**
     * 获取请求的类型
     */
    public static function getRequestType ()
    {
        if ( self::isAjax() ) {
            return 'AJAX';
        }

        return Yii::app()->request->getRequestType();
    }

    /**
     * 注册一个Core script
     */
    public static function coreScript ( $name )
    {
        Yii::app()->clientScript->registerCoreScript( $name );
    }

    /**
     * 注册一个普通Script文件
     */
    public static function registScriptFile ( $name )
    {
        Yii::app()->clientScript->registerScriptFile( $name , CClientScript::POS_END );
        //echo '<script type="text/javascript" src="'.$name.'"></script>'.PHP_EOL;
    }

    public static function registerScript ( $id , $script )
    {
        Yii::app()->clientScript->registerScript( $id , $script , CClientScript::POS_END );
    }

    /**
     * 注册一个CSS文件
     */
    public static function registCssFile ( $name )
    {
        Yii::app()->clientScript->registerCssFile( $name );
        //echo '<link rel="stylesheet" type="text/css" href="'.$name.'" />'.PHP_EOL;
    }

    /**
     * 返回params配置文件中的值
     *
     * @param string $key
     */
    public static function Config ( $key )
    {
        if ( strpos( $key , '.' ) !== FALSE ) {
            $keys   = explode( '.' , $key );
            $result = '';
            $root   = Yii::app()->params->$keys[ 0 ];
            $i      = 1;
            while ( isset( $keys[ $i ] ) ) {
                $result = $root[ $keys[ $i ] ];
                $i++;
            }

            return $result;
        }

        return Yii::app()->params[ $key ];
    }

    /**
     * 创建Url, 如果Url前缀以//开头的话返回前台访问ＵＲＬ
     *
     * @param       $param
     * @param array $param2
     *
     * @return string
     */
    public static function Url ( $param , $param2 = array() )
    {
        if ( is_array( $param ) ) {
            $param_url = $param[ 0 ];
            $url       = CHtml::normalizeUrl( $param );
        } else {
            $param_url = $param;
            $url       = Yii::app()->createUrl( $param , $param2 );
        }

        return $url;
    }

    public static function absoluteUrl ( $param , $param2 = array() )
    {
        $url = Yii::app()->createAbsoluteUrl( $param , $param2 );

        return $url;
    }

    public static function setTheme ( $theme_name )
    {
        Yii::app()->setTheme( $theme_name );
    }

    /**
     * 返回是否是AJAX请求
     *
     * @return bool
     */
    public static function isAjax ()
    {
        return Yii::app()->request->isAjaxRequest;
    }

    public static function isPost ()
    {
        return Yii::app()->request->isPostRequest;
    }

    /**
     * 输出TRACE
     */
    public static function Trace ( $msg , $cat = 'application' )
    {
        if ( is_array( $msg ) ) {
            $msg = print_r( $msg , TRUE );
        }

        Yii::trace( $msg , $cat );
    }

    /**
     * 封闭Yii 的Dump
     */
    public static function Dump ( $v )
    {
        CVarDumper::dump( $v , 100 , TRUE );
    }

    public static function End ()
    {
        Yii::app()->end();
    }

    public static function is_false ( $value , $strict = FALSE )
    {
        if ( !$strict ) {
            return $value == FALSE;
        }

        return $value === FALSE;
    }

    /**
     * 获取一个可用的用户ID
     *
     * @param $id
     *
     * @return int|mixed
     */
    public static function initUserId ( $id )
    {
        $id = intval( $id );
        if ( $id == 0 ) {
            $id = intval( H::User( "id" ) );
        }

        return $id;
    }

    /**
     * 判断字符串是否是json数据
     *
     * @version 2013-9-5
     * @author  wwpeng
     *
     * @param unknown_type $data
     *
     * @return boolean
     */
    public static function isJson ( $data )
    {
        if ( !is_string( $data ) ) {
            return FALSE;
        }
        json_decode( $data );

        return json_last_error() == JSON_ERROR_NONE;
    }

    /**
     * 返回用户中心的一个url
     *
     * @param array $param
     * @param array $param2
     *
     * @return string
     */
    public static function ucUrl ( $param , $param2 = array() )
    {
        return UCENTER . self::url( $param , $param2 );
    }
}