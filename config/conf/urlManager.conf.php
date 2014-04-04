<?php
$rules = array(
    'login'                                    => 'index/login' ,
    'error'                                    => 'index/error' ,
    'upload_image'                              => 'index/uploadImage' ,
    'e<the_id:\w+>/*'                          => "index/e" ,
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