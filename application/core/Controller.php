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
        $path = 'application\models\\' . ucfirst($name) . 'Model';
        
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function Ok($data, $status = 200)
    {
        http_response_code($status);

        $json_data = json_encode([
            'isSuccess' => boolval(1),
            'data' => $data,
            'message' => null
        ]);

        echo $json_data;
    }

    public function Error($message, $status = 500)
    {
        http_response_code($status);

        $json_data = json_encode([
            'isSuccess' => boolval(0),
            'data' => null,
            'message' => $message
        ]);

        echo $json_data;
    }
}
