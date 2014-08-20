<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class Url
{

    public static function get($param, $param2 = array())
    {
        if (is_array($param)) {
            $param_url = $param[0];
            $url       = CHtml::normalizeUrl($param);
        } else {
            $param_url = $param;
            $url       = Yii::app()->createUrl($param, $param2);
        }

        return $url;
    }

    public static function full_url($param, $param2=array())
    {
        $url = Yii::app()->createAbsoluteUrl( $param , $param2 );

        return $url;
    }
} 