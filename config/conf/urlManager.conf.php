<?php
$rules = array(
    'login'                                    => 'index/login',
    'error'                                    => 'index/error',
    '<page:[0-9]+>/*'                          => 'index/index',
    '/<controller:\w+>/*'                      => '<controller>/index',
    '<controller:\w+>/<id:\d+>/*'              => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>/*' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>/*'          => '<controller>/<action>',
);

return array(
    'urlFormat'      => 'path',
    'showScriptName' => false,
    'caseSensitive'  => false,
    'urlSuffix'      => '.html',
    'rules'          => $rules,
);