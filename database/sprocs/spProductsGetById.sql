USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS `spProductsGetById`;

DELIMITER $$
CREATE PROCEDURE `spProductsGetById`
(
	IN `p_product_id` BIGINT
)
BEGIN
	SELECT p.`id` AS `product_id`
		,p.`external_guid` AS `product_external_guid`
        ,p.`name`
        ,p.`description`
        ,p.`features`
        ,c.`id` AS `category_id`
        ,c.`name` AS `category_name`
        ,pr.`price`
        ,pr.`discount`
    FROM `products` p
    LEFT JOIN `categories` c ON p.`category` = c.`id`
    LEFT JOIN `prices` pr ON pr.`product_guid` = p.`external_guid`
    WHERE p.`id` = `p_product_id`
    LIMIT 1;
END $$

COMMIT;
