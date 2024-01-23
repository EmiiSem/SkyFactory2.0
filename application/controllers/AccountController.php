<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    private $loginTitle = "Страница входа SkyFactory";
    private $registerTitle = "Страница регистрации SkyFactory";

    public function loginAction()
    {
        $this->view->render($this->loginTitle);
    }

    public function registerAction()
    {
        $this->view->render($this->registerTitle);
    }
}