<?php

namespace application\controllers;

use application\core\Controller;

class CatalogController extends Controller
{
    private $title = 'Каталог телескопов SkyFactory';

    public function indexAction()
    {
        $products = $this->model->getByParams();

        $this->view->render($this->title, ['list' => $products]);
    }

    public function productAction($productId = null)
    {
        $parsed = ctype_digit($productId) ? intval($productId) : null;
        if ($parsed == null) {
            $this->view->redurect('/catalog');
            return;
        }

        $result = $this->model->getById($parsed);

        $this->view->render($this->title, ["product" => $result["product"], "avgStars" => $result["avgStars"]]);
    }
}
