<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Url;
use Phalcon\Db\Adapter\Pdo\Mysql;

use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager;
/*
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Session\Manager;
use Phalcon\Session\Adapter\Stream;

$container = new FactoryDefault();

$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);

$container->set(
    'url',
    function () use ($config) {
        $url = new Url();

        $url->setBaseUri(
            $config->application->baseUri
        );
        return $url;
    }
);

$container->set(
    'session',
    function () {
        $session = new Manager();
        $files   = new Stream(
            [
                'savePath' => '/tmp',
            ]
        );
        $session->setAdapter($files);

        $session->start();

        return $session;
    }
);
$container->set(
    'db',
    function () use ($config) {
        return new DbAdapter(
            [
                'host'     => $config->database->host,
                'username' => $config->database->username,
                'password' => $config->database->password,
                'dbname'   => $config->database->name,
            ]
        );
    }
);

$container->set(
    'dispatcher',
    function () {
        $eventsManager = new Manager();

        $eventsManager->attach(
            'dispatch:beforeExecuteRoute',
            new SecurityPlugin()
        );

        $eventsManager->attach(
            'dispatch:beforeException',
            new NotFoundPlugin()
        );

        $containerspatcher = new Dispatcher();

        $containerspatcher->setEventsManager($eventsManager);

        return $containerspatcher;
    }
);*/
/*
$application = new Application($container);

try {
    // Handle the request
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}
*/
