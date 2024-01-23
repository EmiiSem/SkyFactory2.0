<?php

namespace application\controllers;

use application\core\Controller;

class ProfileController extends Controller
{
    private $title = "Личный кабинет";

    public function indexAction()
    {
        $this->view->render($this->title);
    }

    public function editAction()
    {
        $this->view->render($this->title . ' - Редактирование');
    }
}