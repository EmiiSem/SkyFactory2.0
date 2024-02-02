<?php

namespace application\models;

use application\core\Model;
use Exception;
use PDO;

class AuthModel extends Model
{
    public function checkUserValid(array $params)
    {
        if (!isset($params['login']) or empty($params['login'])) {
            throw new Exception('Не задан логин пользователя');
        }

        if (!isset($params['password']) or empty($params['password'])) {
            throw new Exception('Не задан пароль пользователя');
        }

        $exists = $this->db->executeScalar('spUsersCheckExists', [
            [
                "name" => "p_email",
                "value" => $params["login"],
                "type" => PDO::PARAM_STR,
            ]
        ]);

        if (!boolval($exists)) {
            throw new Exception("Пользователя с тиким email не существуте");
        }

        $isValid = $this->db->executeScalar("spCheckUserByEmailAndPassword", [
            [
                "name" => "p_email",
                "value" => $params['login'],
                "type" => PDO::PARAM_STR,
            ],
            [
                "name" => "p_password",
                "value" => $params["password"],
                "type" => PDO::PARAM_STR
            ]
        ]);

        if (!boolval($isValid)) {
            throw new Exception("Неверный логин или пароль");
        }

        return true;
    }

    public function register(array $params)
    {
        $errors = [];

        if (!isset($params['fullName']) or empty($params['fullName'])) {
            array_push($errors, 'Не указано имя пользователя');
        }

        if (!isset($params['email']) or empty($params['email'])) {
            array_push($errors, 'Не указана почта пользователя');
        }

        if (!isset($params['password']) or empty($params['password'])) {
            array_push($errors, 'Не указан пароль пользователя');
        }

        if (count($errors) > 0) {
            $errors_str = join("\n", $errors);
            throw new Exception($errors_str);
        }

        $exists = $this->db->executeScalar('spUsersCheckExists', [
            [
                "name" => "p_email",
                "value" => $params["email"],
                "type" => PDO::PARAM_STR,
            ]
        ]);
        
        if (boolval($exists)) {
            throw new Exception("Пользователь с таким email уже существует");
        }

        $this->db->execute("spUsersAdd", [
            [
                "name" => "p_email",
                "value" => $params["email"],
                "type" => PDO::PARAM_STR,
            ],
            [
                "name" => "p_password",
                "value" => $params["password"],
                "type" => PDO::PARAM_STR,
            ],
            [
                "name" => "p_full_name",
                "value" => $params["fullName"],
                "type" => PDO::PARAM_STR,
            ],
            [
                "name" => "p_address",
                "value" => "",
                "type" => PDO::PARAM_STR,
            ]
        ]);
    }
}
