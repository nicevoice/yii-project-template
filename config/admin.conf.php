<?php
include(dirname(__FILE__).'/conf/alias.conf.php');
$common_config = include( dirname(__FILE__).'/_common.conf.php' );

$conf = array(
    'components'            =>array(
        'urlManager'    => getConfig('urlManager', false),
    ),
);

return  CMap::mergeArray($common_config, $conf);
