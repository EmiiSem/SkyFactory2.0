<?php

namespace application\lib;

use ErrorException;
use PDO;
use PDOException;

class Db
{
    protected $db;

    public function __construct()
    {
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . '', $config['user'], $config['password']);
    }

    public function queryFirst(string $name, array $params = [])
    {
        $stmt = $this->execureProcedure($name, $params);
        
        $error = $stmt->errorInfo();

        if (!empty($error) && isset($error[2])) {
            throw new ErrorException($error[2]);
        }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function execute(string $name, array $params = []) {
        $stmt = $this->execureProcedure($name, $params);
    }

    public function executeScalar(string $name, array $params = [])
    {
        $stmt = $this->execureProcedure($name, $params);
        $result = $stmt->fetchColumn();

        return $result;
    }

    private function execureProcedure(string $name, array $params = [])
    {
        $placeholders = [];

        foreach ($params as $param) {
            if (isset($param['name'])) {
                array_push($placeholders, ':' . $param['name']);
            }
        }

        $sql = 'CALL ' . $name . '(' . implode(', ', $placeholders) . ')';

        try {
            $stmt = $this->db->prepare($sql);

            foreach ($params as $param) {
                $type = isset($param['type'])
                    ? $param['type']
                    : PDO::PARAM_STR;

                $stmt->bindParam(':' . $param['name'], $param['value'], $type);
            }

            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            throw new ErrorException("Ошибка выполнения процедуры: " . $e->getMessage());
        }
    }
}
