<?php

namespace application\controllers\api;

use application\core\Controller;

use Exception;

class AuthController extends Controller
{
    public function userLoginAction()
    {
        $params = $_POST;

        try {
            $result = $this->model->checkUserValid($params);
            $this->Ok($result);
        } catch (Exception $e) {
            $this->Error($e->getMessage());
        }
    }

    public function userRegisterAction()
    {
        $params = $_POST;

        try {
            $this->model->register($params);
            return $this->Ok(true);
        } catch (Exception $e) {
            $this->Error($e->getMessage());
        }
    }
}
