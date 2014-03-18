<?php
/**
 * 获取配置内容
 * @param $name 配置文件名称
 * @param bool $is_admin_conf 是否是后台文件配置
 * @return mixed
 */
function getConfig($name, $is_admin_conf = false)
{
    $not_admin_suffix = '';
    if( $is_admin_conf )
        $not_admin_suffix = '.admin';

    $file_name = ROOT . '/common/config/conf/' . $name . $not_admin_suffix . '.conf.php';
    $local_file_name = ROOT . '/common/config/local/' . $name . $not_admin_suffix . '.conf.php';

    $conf = include($file_name);
    if( file_exists($local_file_name))
        $local_conf = include($local_file_name);
    else
        $local_conf = array();

    return CMap::mergeArray( $conf, $local_conf);
}