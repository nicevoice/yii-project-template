<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class Input
{

    public static function all()
    {
        return $_REQUEST;
    }

    public static function controller()
    {
        return Yii::app()->controller;
    }

    public static function type()
    {
        return self::get()->getRequestType();
    }

    public static function get($attr = null)
    {
        $request = Yii::app()->request;
        return $request->getParam($attr);
    }

    public static function post($attr = null)
    {
        if (is_null($attr)) {
            return $_POST;
        }
        if (!isset($_POST[$attr])) {
            return null;
        }

        return $_POST[$attr];
    }
} 