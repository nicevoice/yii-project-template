<?php
$conf = array(
    'connectionString'   => 'mysql:host=db.qoofan.com;dbname=qoofan_weixin',
    'emulatePrepare'     => true,
    'username'           => 'rogee',
    'password'           => 'adminhao0202',
    'charset'            => 'utf8',
    'tablePrefix'        => '',

);
if (YII_DEBUG) {
    $debug_conf = array(
        'schemaCachingDuration' => 30*24*60*60,
        'enableProfiling'    => true,
        'enableParamLogging' => true,
    );

    $conf = array_merge($conf, $debug_conf);
}

return $conf;

