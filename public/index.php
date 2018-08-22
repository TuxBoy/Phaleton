<?php

define('APPSTART', microtime(true));
define('ROOTPATH', dirname(__DIR__));

$debug = new Phalcon\Debug();
$debug->listen();

$di = new Phalcon\Di\FactoryDefault();

require ROOTPATH . '/vendor/autoload.php';
require ROOTPATH . '/app/config/services.php';

$dotenv = new Dotenv\Dotenv(ROOTPATH);
$dotenv->load();

$application = new Phalcon\Mvc\Application($di);
$application->handle()->send();
