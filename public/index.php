<?php

define('APPLICATION_PATH', dirname(__FILE__) . '/../');
define('STORAGE_PATH', dirname(__FILE__) . '/../storage');

$application = new Yaf\Application( APPLICATION_PATH . "conf/application.ini");
$application->bootstrap()->run();
?>
