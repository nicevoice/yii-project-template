<?php
$log = array(
    array(
        'class'  => 'CFileLogRoute',
        'levels' => 'error, warning',
    )
);

return array(
    'class'  => 'CLogRouter',
    'routes' => $log,
);


