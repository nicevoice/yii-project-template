<?php
define('PATH_BASE', dirname(__FILE__) . '/../');
define('PATH_CONFIG', PATH_BASE . 'config/');

function getConfig($name, $is_admin_conf = false)
{
    $not_admin_suffix = '';
    if ($is_admin_conf)
        $not_admin_suffix = '.admin';

    $file_name       = PATH_BASE. '/config/conf/' . $name . $not_admin_suffix . '.conf.php';
    $local_file_name = PATH_BASE. '/config/local/' . $name . $not_admin_suffix . '.conf.php';

    $conf = include($file_name);
    if (file_exists($local_file_name))
        $local_conf = include($local_file_name);
    else
        $local_conf = array();

    return CMap::mergeArray($conf, $local_conf);
}


$framework = PATH_BASE . '/libs/framework/yii.php';
require_once($framework);

include PATH_CONFIG . '/conf/alias.conf.php';
$config =  include PATH_CONFIG . '/_common.conf.php';


//检查当前系统是否是生产环境
if (!is_file(PATH_BASE . "/product.env")) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
}


$app = Yii::createWebApplication($config);


//run application
$app->run();