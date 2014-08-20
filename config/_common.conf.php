<?php
return array(
    'name'              => 'SiteConfig',
    'timeZone'          => 'Asia/Shanghai',
    'language'          => 'zh_cn',
    'charset'           => 'utf-8',
    'extensionPath'     => PATH_BASE. '/common/extensions',
    'controllerPath'    => PATH_BASE . '/common/controllers/',
    'runtimePath'       => PATH_BASE. '/cache',
    'basePath'          => PATH_BASE . '/common/controllers',
    'defaultController' => 'Index',
    'preload'           => array('log'),

    'import'            => getConfig('import'),

    'modules'           => array(
        'gii' => getConfig('gii'),
    ),


    'behaviors'         => array(
        'onBeginRequest' => array(
            'class' => 'common.vendor.Request.BeginRequestBehavior',
        ),
        'onEndRequest'   => array(
            'class' => 'common.vendor.Request.EndRequestBehavior'
        ),
    ),

    'components'        => array(
        'themeManager' => getConfig('themeManager'),
        'request'      => getConfig('request'),
        'user'         => getConfig('user'),
        'db'           => getConfig('db'),
        'errorHandler' => getConfig('errorHandler'),
        'log'          => getConfig('log'),
        'clientScript' => getConfig('clientScript'),
        'urlManager'   => getConfig('urlManager'),
    ),

    'params'            => getConfig('params'),
);