USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS `spCartRemove`;

DELIMITER $$
CREATE PROCEDURE `spCartRemove`
(
	IN `p_person_guid` VARCHAR(36),
    IN `p_product_id` BIGINT,
    IN `p_quantity` INT,
    IN `p_is_all` INT
)
BEGIN
	DECLARE `@product_external_guid` VARCHAR(36);
    DECLARE `@product_price` DECIMAL(20, 2);
    
	SELECT `external_guid` INTO `@product_external_guid`
    FROM `products`
    WHERE `id` = `p_product_id`
    LIMIT 1;
    
    IF EXISTS (SELECT * FROM `cart` WHERE `product_guid` = `@product_external_guid` AND `person_guid` = `p_person_guid`) THEN
		IF `p_is_all` IS NOT NULL AND `p_is_all` = 1 THEN
			DELETE FROM `cart` c
            WHERE c.`person_guid` = `p_person_guid`;
            
            OPTIMIZE TABLE `cart`;
        ELSEIF (SELECT `quantity` FROM `cart` WHERE `person_guid` = `p_person_guid` AND `product_guid` = `@product_external_guid` LIMIT 1) = 1 THEN
			DELETE FROM `cart` c
            WHERE c.`person_guid` = `p_persion_guid`
				AND c.`product_guid` = `@product_external_guid`;
		ELSE
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
        
			UPDATE `cart` c
            SET c.`quantity` = c.`quantity` - `p_quantity`
				,c.`total_price` = c.`total_price` - (`@product_price` * `p_quantite`)
			WHERE c.`person_guid` = `p_person_guid`
				AND c.`product_guid` = `@product_external_guid`;
        END IF;
	END IF;
END $$

COMMIT;