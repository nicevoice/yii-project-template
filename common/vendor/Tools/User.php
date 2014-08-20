<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class User
{
    /**
     * 获取WebUser属性
     * @param null $param 如果为空返回整个ＷｅｂＵｓｅｒ对象
     * @return mixed
     */
    public static function get($param = null)
    {
        if (!is_null($param)) {
            return Yii::app()->user->$param;
        }

        return Yii::app()->user;
    }

    public static function is_guest()
    {
        return self::get('isGuest');

    }

    /**
     * 设置用户参数值
     * @param $key
     * @param $value
     */
    public static function setState ( $key , $value )
    {
        self::get()->setState( $key , $value );
    }
} 