<?php
    $log = array(
        array(
            'class'  => 'CFileLogRoute' ,
            'levels' => 'error, warning' ,
        )
    );

    /*if( YII_DEBUG && !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest') && !isset($_FILES['img_file']))
    {
        $log[] = array(
            'class'=>'vendor.yii-debug-toolbar.YiiDebugToolbarRoute',
            'ipFilters'=>array('127.0.0.1', '::1'),
            'levels'=>'error,warning,info,trace',
        );
    }*/

    return array(
        'class'  => 'CLogRouter' ,
        'routes' => $log ,
    );


