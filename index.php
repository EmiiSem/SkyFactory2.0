<?php

use application\core\Router;

include_once __DIR__ . "/application/lib/dev.php";
include_once __DIR__ ."/application/lib/helpers.php";
include __DIR__ . "/application/lib/session_manage.php";

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');

    if (file_exists($path)) {
        require $path;
    }
});

$router = new Router();

if (isset($_REQUEST['uri']) === true and substr($_REQUEST['uri'], 0, 3) === 'api') {
    $router->runApi();
} else {
    $router->run();
}