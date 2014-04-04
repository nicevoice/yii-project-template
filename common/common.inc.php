<?php
define( 'ROOT' , realpath( dirname( __FILE__ ) . "/../" ) );
define( '_RES_' , '/resource' );

if ( defined( "_ADMIN_" ) && _ADMIN_ ) {
    define( "_CONTROLLER_PATH_NAME_" , 'backend' );
} else {
    define( "_CONTROLLER_PATH_NAME_" , 'frontend' );
}

//检查当前系统是否是生产环境
if ( !is_file( ROOT . "/product.server" ) ) {
    defined( 'YII_DEBUG' ) or define( 'YII_DEBUG' , TRUE );
    defined( 'YII_TRACE_LEVEL' ) or define( 'YII_TRACE_LEVEL' , 3 );
}

$framework = ROOT . '/libs/framework/yii.php';
$function  = dirname( __FILE__ ) . '/common.function.php';
include $function;


require_once( $framework );
$app = Yii::createWebApplication( $config );


//run application
$app->run();
