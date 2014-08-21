<?php
$alias = array(
    'root'        => PATH_BASE,
    'common'      => PATH_BASE . '/common',
    'application' => PATH_BASE . '/common',
    'ext'         => PATH_BASE . '/common/extensions',
    'com'         => PATH_BASE . '/common/components',
    'vendor'      => PATH_BASE . '/common/vendor',
    'hook'        => PATH_BASE . '/common/hook',
    'upload'      => PATH_BASE . '/upload'
);

foreach ($alias as $key => $value) {
    Yii::setPathOfAlias($key, $value);
}