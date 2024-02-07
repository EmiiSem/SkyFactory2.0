<?php

namespace application\models;

use application\core\Model;
use Exception;
use PDO;

class ProfileModel extends Model
{
    public function getByUserGuid($guid)
    {
        if (empty($guid)) {
            throw new Exception("Не задан идентификатор пользователя");
        }

        $user = $this->db->queryFirst("spPersonsGetByUserExternalGuid", [
            [
                "name" => "user_external_guid",
                "value" => $guid,
                "type" => PDO::PARAM_STR
            ]
        ]);

        return $user;
    }
}
