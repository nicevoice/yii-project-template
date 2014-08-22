<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class Response
{
    const RESPONSE_CODE_404 = 404;
    const RESPONSE_CODE_301 = 301;
    const RESPONSE_CODE_302 = 302;

    public static function json($code = 0, $msg = '', $data = '')
    {
        $json_back = array('code' => $code, 'msg' => $msg, 'data' => $data);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($json_back);
        exit;
    }

    public static function to($url, $code = 302)
    {
        header('Location: '.$url, true, $code);
        exit;
    }

    public static function to_action($controller, $action, $code = 302)
    {

    }

    /**
     * ajax 验证
     * @param $model
     */
    public static function performAjaxValidation($model)
    {
        if (Input::post('ajax') !== null) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
} 