<?php

namespace application\controllers;

use application\core\Controller;

class ReviewsController extends Controller {
    private $title = 'Отзывы сайта SkyFactory';

    public function indexAction() {
        $this->view->render($this->title);
    }
}