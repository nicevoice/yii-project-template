<?php
$rules = array(
    'login'                                    => 'index/login' ,
    'error'                                    => 'index/error' ,
    '<controller:\w+>/<id:\d+>/*'              => '<controller>/view' ,
    '<controller:\w+>/<action:\w+>/<id:\d+>/*' => '<controller>/<action>' ,
    '<controller:\w+>/<action:\w+>/*'          => '<controller>/<action>' ,
);

return array(
    'urlFormat'      => 'path' ,
    'showScriptName' => FALSE ,
    'caseSensitive'  => FALSE ,
    'urlSuffix'      => '.html' ,
    'rules'          => $rules ,
);