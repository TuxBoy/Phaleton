<?php

define('APPSTART', microtime(true));
define('ROOTPATH', dirname(__DIR__));

$debug = (new Phalcon\Debug())->listen();
$di = new Phalcon\Di\FactoryDefault();

require ROOTPATH . '/vendor/autoload.php';
$services = require ROOTPATH . '/app/config/services.php';

(new \App\ServiceProvider\ServiceProvider($di, $services))->load();

(new Dotenv\Dotenv(ROOTPATH))->load();

$application = new Phalcon\Mvc\Application($di);
$application->handle()->send();
