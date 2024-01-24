<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    public $route;
    public $view;
    public $model;
    private $isApi;

    public function __construct($route, $isApi)
    {
        $this->route = $route;
        $this->isApi = $isApi;
        
        if (!$isApi) {
            $this->view = new View($route);
        }

        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);

        if (class_exists($path)) {
            return new $path;
        }
    }
}