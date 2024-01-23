<?php

namespace application\controllers;

use application\core\Controller;

class QuastionsController extends Controller
{
    public $title = 'Часто задаваемые вопросы';
    public function indexAction()
    {
        $this->view->render($this->title);
    }
}