<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class Param
{
    public static function get($key)
    {
        if (strpos($key, '.') !== false) {
            $keys   = explode('.', $key);
            $result = '';
            $root   = Yii::app()->params->$keys[0];
            $i      = 1;
            while (isset($keys[$i])) {
                $result = $root[$keys[$i]];
                $i++;
            }

            return $result;
        }

        return Yii::app()->params[$key];
    }
} 