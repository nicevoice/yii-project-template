<?php
    define("ROOT", realpath(__DIR__.'/../'));

    define("_TEST_DB_ADDR_", "192.168.1.160");
    define("_TEST_DB_NAME_", "qoo_cms");
    define("_TEST_DB_USER_", "qoo_cms_root");
    define("_TEST_DB_PASS_", "qoo_cms_admin_root");

    define('_RES_', '/resource');
    define('_ID_', 'the_id');
    define('_INDEX_', 'index/v/the_id/index');
    define('_VIEW_', 'index/v');
    define('_EXT_', 'index/w');
    define('_ARTICLE_', 'index/news');

    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

    $function   = dirname(__FILE__).'/../common/common.function.php';
    $declare    = dirname(__FILE__).'/../common/common.conf.php';
    include $declare;
    include $function;

    $db_conf = array(
        'connectionString'   => 'mysql:host='._TEST_DB_ADDR_.';dbname='._TEST_DB_NAME_ ,
        'emulatePrepare'     => TRUE ,
        'username'           => _TEST_DB_USER_ ,
        'password'           => _TEST_DB_PASS_ ,
        'charset'            => 'utf8' ,
        'tablePrefix'        => 'tb_' ,
        'enableProfiling'    => TRUE ,
        'enableParamLogging' => TRUE ,
    );

    return CMap::mergeArray(
               require( dirname(__FILE__) . '/../common/config/front.conf.php' ) ,
                   array(
                        'components' => array(
                            'fixture' => array(
                                'class' => 'system.test.CDbFixtureManager' ,
                            ) ,
                            'db'      => $db_conf ,
                        ) ,
                   )
    );
