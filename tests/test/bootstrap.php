<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../common/lib/framework/yiit.php';
$config=dirname(__FILE__).'/../conf.test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);