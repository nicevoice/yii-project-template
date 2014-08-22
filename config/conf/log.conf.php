<?php
$log = array(
    array(
        'class'  => 'CFileLogRoute',
        'levels' => 'error, warning',
    ),
    array(
        'class' => 'CWebLogRoute',
        'enabled' => YII_DEBUG
    ),
);

return array(
    'class'  => 'CLogRouter',
    'routes' => $log,
);


