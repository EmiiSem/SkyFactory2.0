<?php

namespace application\models;

use application\core\Model;
use Exception;
use PDO;

class CatalogModel extends Model
{
    public function getByParams($params = [])
    {
        $products = $this->db->queryAll("spProductsGetByParams", [
            [
                "name" => "p_product_guid",
                "value" => isset($params["product_guid"]) ? $params["product_guid"] : null,
                "type" => PDO::PARAM_STR,
            ],
            [
                "name" => "p_search_term",
                "value" => isset($params["term"]) ? $params["term"] : null,
                "type" => PDO::PARAM_STR,
            ],
        ]);

        return $products ?? [];
    }

    public function getById($id)
    {
        $product = $this->db->queryFirst("spProductsGetById", [
            [
                "name" => "p_product_id",
                "value" => isset($id) ? $id : null,
                "type" => PDO::PARAM_INT,
            ]
        ]);

        $avgStars = $this->db->executeScalar("spReviewsGetAvgStarsByProductId", [
            [
                "name" => "p_product_id",
                "value" => isset($id) ? $id : null,
                "type" => PDO::PARAM_INT,
            ]
        ]);

        return array("product" => $product, "avgStars" => $avgStars);
    }
}
