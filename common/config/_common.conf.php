<?php
return array(
    'name'              => 'SiteConfig' ,
    'timeZone'          => 'Asia/Shanghai' ,
    'language'          => 'zh_cn' ,
    'charset'           => 'utf-8' ,
    'extensionPath'     => ROOT . '/common/extensions' ,
    'controllerPath'    => ROOT . '/common/controllers/' . _CONTROLLER_PATH_NAME_ ,
    'runtimePath'       => ROOT . '/cache' ,
    'preload'           => array( 'log' ) ,
    'basePath'          => ROOT . '/common/controllers' ,
    'defaultController' => 'Index' ,

    'import'            => getConfig( 'import' ) ,

    'modules'           => array(
        'gii' => getConfig( 'gii' ) ,
    ) ,


    'behaviors'         => array(
        'onBeginRequest' => array(
            'class' => 'common.vendor.Request.BeginRequestBehavior' ,
        ) ,
        'onEndRequest'   => array(
            'class' => 'common.vendor.Request.EndRequestBehavior'
        ) ,
    ) ,

    'components'        => array(
        'themeManager'   => getConfig( 'themeManager' ) ,
        'user'           => getConfig( 'user' ) ,
        'db'             => getConfig( 'db' ) ,
        'errorHandler'   => getConfig( 'errorHandler' ) ,
        'log'            => getConfig( 'log' ) ,
        'clientScript'   => getConfig( 'clientScript' ) ,
    ) ,

    'params'            => getConfig( 'params' ) ,
);