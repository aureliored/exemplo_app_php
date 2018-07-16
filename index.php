<?php

use Application\Application; 
define('__APP_ROOT__', dirname(__DIR__) . '\exemplo_app_php');
define('__BASEURL__', 'http://localhost/exemplo_app_php/');
require __APP_ROOT__ . '\vendor\autoload.php';

$config = require __APP_ROOT__ . '\\config\\local.php';

define("__TEMPLATE_PATH__", $config['template']['path']);
define("__TEMPLATE_DEFAULT__", $config['template']['default']);
define("__API__", $config['api']);


$app = new Application($config);
$app->init()
    ->start();
