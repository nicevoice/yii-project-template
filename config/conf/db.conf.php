<?php
    if ( YII_DEBUG ) {
        $conf = array(
            'connectionString'   => 'mysql:host=localhost;dbname=test' ,
            'emulatePrepare'     => TRUE ,
            'username'           => 'root' ,
            'password'           => '' ,
            'charset'            => 'utf8' ,
            'tablePrefix'        => '' ,
            'enableProfiling'    => TRUE ,
            'enableParamLogging' => TRUE ,
        );
    } else {
        $conf = array(
            'connectionString'   => 'mysql:host=localhost;dbname=cycms' ,
            'emulatePrepare'     => TRUE ,
            'username'           => 'zhiyuanyun' ,
            'password'           => 'zhiyuanyun_admin_!#@' ,
            'charset'            => 'utf8' ,
            'tablePrefix'        => 'tb_' ,
            'enableProfiling'    => TRUE ,
            'enableParamLogging' => TRUE ,
        );
    }
    return $conf;

