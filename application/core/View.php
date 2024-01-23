<?php

namespace application\core;

class View
{
    public $templatePath;
    public $headersPath;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->templatePath = $route['controller'] . '/' . $route['action'];
        $this->headersPath = $route['controller'] . '/' . 'headers';
    }

    public function render($title, $vars = [])
    {
        extract($vars);

        $templatePath = 'application/views/' . $this->templatePath . '.php';

        if (file_exists($templatePath)) {
            ob_start();
            require $templatePath;
            $content = ob_get_clean();
        }

        $headersPath = 'application/views/' . $this->headersPath . '.php';
        
        if (file_exists($headersPath)) {
            ob_start();
            require $headersPath;
            $headers = ob_get_clean();
        }

        require 'application/views/layouts/' . $this->layout . '.php';
    }

    public function redurect($url)
    {
        header('location: ' . $url);
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);

        $templatePath = 'application/views/errors/' . $code . '.php';

        if (file_exists($templatePath)) {
            require $templatePath;
        }

        exit;
    }

    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }
}