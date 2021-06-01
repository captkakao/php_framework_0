<?php

error_reporting(-1);

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LAYOUT', 'default');

use vendor\core\Router;

//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});

new \vendor\core\App();

Router::add('^page/?(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);

//default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);