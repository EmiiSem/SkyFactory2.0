<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    private $title = "Главная страница SkyFactory";

    public function indexAction()
    {
        $this->view->render($this->title);
    }
}