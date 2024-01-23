<?php

namespace application\controllers;

use application\core\Controller;

class AboutController extends Controller
{
    private $title = 'О компании "SkyFactory"';

    public function indexAction()
    {
        $this->view->render($this->title);
    }
}