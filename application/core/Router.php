<?php

namespace application\core;

use application\core\View;

class Router
{
    protected $routes = [];
    protected $apiRoutes = [];
    protected $params = [];
    protected $apiParams = [];

    public function __construct()
    {
        $arr = require 'application\config\routes.php';
        $apiArr = require 'application\config\apiRoutes.php';

        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }

        foreach ($apiArr as $key => $value) {
            $this->add($key, $value, true);
        }
    }

    public function add($route, $params, $isApi = false)
    {
        $route = '#^' . $route . '$#';

        if ($isApi) {
            $this->apiRoutes[$route] = $params;
        } else {
            $this->routes[$route] = $params;
        }
    }

    public function match($isApi = false)
    {
        $flagRoutes = $isApi
            ? $this->apiRoutes
            : $this->routes;

        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($flagRoutes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                array_shift($matches);

                $paramsResult = $params + ["params" => $matches];
                if ($isApi) {
                    $this->apiParams = $paramsResult;
                } else {
                    $this->params = $paramsResult;
                }

                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params, false);
                    call_user_func_array([$controller, $action], $this->params['params']);
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

    public function runApi()
    {
        if ($this->match(true)) {
            $path = 'application\controllers\API\\' . ucfirst($this->apiParams['controller']) . 'Controller';
            if (class_exists($path)) {
                if (!array_key_exists('method', $this->apiParams) or $_SERVER["REQUEST_METHOD"] !== $this->apiParams['method']) {
                    View::errorApiCode(405, "Method Not Allowed");
                } else {
                    $action = $this->apiParams['action'] . 'Action';
                    if (method_exists($path, $action)) {
                        $controller = new $path($this->apiParams, true);
                        call_user_func_array([$controller, $action], $this->apiParams['params']);
                    } else {
                        View::errorCode(404);
                    }
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}