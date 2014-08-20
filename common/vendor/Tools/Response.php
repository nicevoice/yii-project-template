<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class Response
{
    public static function json($code = 0, $msg = '', $data = '')
    {
        $json_back = array(
            'code' => $code,
            'msg'  => $msg,
            'data' => $data
        );

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($json_back);
        exit;
    }

    public static function to_url($url)
    {
    }
} 