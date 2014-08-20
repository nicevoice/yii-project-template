<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class Cookie
{
    public static function get($key = null)
    {
        $cookie = Yii::app()->request->getCookies();
        if (is_null($key)) {
            return $cookie;
        }

        return isset($cookie[$key]) ? $cookie[$key]->value : null;
    }

    public static function set($key, $value, $expire = 0)
    {
        $new_cookie         = new CHttpCookie($name, $value);
        $new_cookie->expire = $expire;
        $cookie[$name]      = $new_cookie;

    }
} 