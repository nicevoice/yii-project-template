<?php
/**
 * @author: Rogee<rogeeyang@gmail.com>
 */

class Input {

    public static function type()
    {
        return self::get()->getRequestType();
    }
    public function get($attr = null)
    {
        $request = Yii::app()->request;
        if (is_null($attr)) {
            return $request;
        }
        return $request->$attr;
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