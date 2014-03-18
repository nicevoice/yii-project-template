<?php

    define( '_FRONT_' , TRUE );
    define( '_TEST_' , TRUE );
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
    $framework  = dirname(__FILE__).'/../common/lib/framework/yii.php';

    $config = dirname( __FILE__ ) . '/conf.test.php';
    require_once($framework);
    $app = Yii::createWebApplication($config);


    //run application
    $app->run();