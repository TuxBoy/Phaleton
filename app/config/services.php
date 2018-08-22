<?php

use Phalcon\Db\Adapter\Pdo\Factory;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;

$di->setShared('url', function () {
    $url = new UrlResolver();
    $url->setBaseUri(getenv('APP_BASE_URI'));
    return $url;
});

$di->setShared('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace(getenv('APP_CTRL_NS'));
    return $dispatcher;
});

$di->setShared('view', function () {
    $view = new View();
    $view->setDI($this);
    $view->setViewsDir(ROOTPATH . getenv('APP_DIRS_VIEWS'));

    $view->registerEngines([
        '.volt' => function ($view) {
            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => ROOTPATH . getenv('APP_DIRS_CACHE'),
                'compiledSeparator' => '_'
            ]);

            return $volt;
        },
        '.php' => PhpEngine::class
    ]);

    return $view;
});

$di->setShared('db', function () {

    $options = [
        'adapter'  => getenv('APP_DB_ADAPTER'),
        'host'     => getenv('APP_DB_HOST'),
        'username' => getenv('APP_DB_USERNAME'),
        'password' => getenv('APP_DB_PASSWORD'),
        'dbname'   => getenv('APP_DB_DBNAME'),
        'charset'  => getenv('APP_DB_CHARSET'),
    ];

    $connection = Factory::load($options);

    return $connection;
});

$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});
