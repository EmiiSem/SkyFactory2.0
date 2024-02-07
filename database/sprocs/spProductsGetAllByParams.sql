USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS `spProductsGetByParams`;

DELIMITER $$
CREATE PROCEDURE `spProductsGetByParams`
(
	IN `p_search_term` VARCHAR(1000),
    IN `p_category_id` BIGINT
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
    WHERE (`p_search_term` IS NULL OR p.`name` LIKE CONCAT('%', `p_search_term`, '%'))
		AND (`p_category_id` IS NULL OR p.`category` = `p_category_id`);
END $$

COMMIT