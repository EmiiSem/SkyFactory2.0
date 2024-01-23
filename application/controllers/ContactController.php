<?php

namespace application\controllers;

use application\core\Controller;

class ContactController extends Controller
{
    public $title = "Контакты интернет-магазина телескопов";

    public function indexAction()
    {
        $this->view->render($this->title);
    }
}