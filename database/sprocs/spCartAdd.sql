USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS `spCartAdd`;

DELIMITER $$
CREATE PROCEDURE `spCartAdd`
(
	IN `p_person_guid` VARCHAR(36),
	IN `p_product_id` BIGINT,
    IN `p_quantity` INT
)
BEGIN
	DECLARE `@product_external_guid` VARCHAR(36);
    DECLARE `@product_price` DECIMAL(20, 2);
    
    SELECT `external_guid` INTO `@product_external_guid`
    FROM `products`
    WHERE `id` = `p_product_id`
    LIMIT 1;
    
    SELECT 
		CASE 
			WHEN  p.`discount` > 0
				THEN p.`price` - (p.`price` * (p.`discount` / 100))
			ELSE p.`price`
		END
        INTO `@product_price`	
    FROM `prices` p
    WHERE p.`product_guid` = `@product_external_guid`
    LIMIT 1;
    
    IF EXISTS (SELECT * FROM `cart` 
				WHERE `product_guid` = `@product_external_guid` 
					AND `person_guid` = `p_person_guid`) THEN
		UPDATE `cart`
        SET `quantity` = `quantity` + `p_quantity`,
			`total_price` = `total_price` + (`@product_price` * `p_quantity`)
        WHERE `product_guid` = `@product_external_guid`
			AND `person_guid` = `p_person_guid`;
    ELSE
		INSERT INTO `card` (`person_guid`, `product_guid`, `quantity`, `total_price`)
        VALUES (`p_person_guid`, `@product_external_guid`, `p_quantity`, `@product_price` * `p_quantity`);
    END IF;
END $$

COMMIT
