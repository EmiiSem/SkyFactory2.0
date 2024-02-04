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

            $user_guid = $result["external_guid"];

            $_SESSION["user_external_guid"] = $user_guid;

            session_write_close();

            $this->Ok($user_guid);
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
