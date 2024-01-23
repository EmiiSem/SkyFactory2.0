<?php

namespace application\controllers;

use application\core\Controller;

class CatalogController extends Controller
{
    private $title = 'Каталог телескопов SkyFactory';

    public function indexAction()
    {
        $this->view->render($this->title);
    }

    public function productAction($productId = null)
    {
        $parsed = ctype_digit($productId) ? intval($productId) : null;
        if ($parsed == null) {
            $this->view->redurect('/catalog');
            return;
        }

        $this->view->render($this->title, ['productId ' => $productId]);
    }
}