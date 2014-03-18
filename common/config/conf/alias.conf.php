<?php
    $alias = array(
        'root'   => ROOT ,
        'front'  => ROOT . '/_frontend' ,
        'admin'  => ROOT . '/_backend' ,
        'common' => ROOT . '/common' ,
        'com'    => ROOT . '/common/components' ,
        'vendor' => ROOT . '/common/vendor' ,
        'hook'   => ROOT . '/common/hook' ,
        'upload' => ROOT . '/upload'
    );

    foreach ( $alias as $key => $value ) {
        Yii::setPathOfAlias( $key , $value );
    }