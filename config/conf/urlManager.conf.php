<?php
$rules = array(
    'login'                                    => 'index/login',
    'error'                                    => 'index/error',
    '<page:[0-9]+>/*'                          => 'index/index',
    '<controller:\w+>/<id:[0-9]+>/*'              => '<controller>/index',
    '/<controller:\w+>/*'                      => '<controller>/index',
    '<controller:\w+>/<id:[0-9]+>/*'              => '<controller>/index',
    '<controller:\w+>/<action:\w+>/<id:[0-9]+>/*' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>/*'          => '<controller>/<action>',
);

return array(
    'urlFormat'      => 'path',
    'showScriptName' => false,
    'caseSensitive'  => false,
    'urlSuffix'      => '.html',
    'rules'          => $rules,
);