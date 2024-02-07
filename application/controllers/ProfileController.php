<?php

namespace application\controllers;

use application\core\Controller;

class ProfileController extends Controller
{
    private $title = "Личный кабинет";

    public function indexAction()
    {
        $user_external_guid = isset($_SESSION['user_external_guid']) ? $_SESSION['user_external_guid'] : null;
        $user = null;

        if ($user_external_guid) {
            $user = $this->model->getByUserGuid($user_external_guid);
        }

        $this->view->render($this->title, array_merge(['userInfo' => $user]));
    }

    public function editAction()
    {
        $this->view->render($this->title . ' - Редактирование');
    }
}
