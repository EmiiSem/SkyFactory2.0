USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS `prices`
(
	`id` BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `product_guid` VARCHAR(36) NOT NULL,
    `price` DECIMAL(20, 2),
    `discount` DECIMAL (5, 2),
    
    CONSTRAINT `UQ__prices__product_guid` UNIQUE (`product_guid`),
    CONSTRAINT `FK__prices__products` FOREIGN KEY (`product_guid`) REFERENCES `products` (`external_guid`)
);

COMMIT;