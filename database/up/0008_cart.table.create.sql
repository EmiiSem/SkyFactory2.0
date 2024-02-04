USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS `cart`
(
	`id` BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `person_guid` VARCHAR(36) NOT NULL,
    `product_guid` VARCHAR (36) NOT NULL,
    `quantity` INT NOT NULL,
    `total_price` DECIMAL(10, 2) NOT NULL,
    `order_guid` VARCHAR(36) NULL,
    `order_guid` BOOLEAN DEFAULT 0,
    
    CONSTRAINT `FK__cart__persons` FOREIGN KEY (`person_guid`) REFERENCES persons (`external_guid`),
    CONSTRAINT `FK__cart__products` FOREIGN KEY (`product_guid`) REFERENCES products (`external_guid`),
    CONSTRAINT `FK__cart__orders` FOREIGN KEY (`order_guid`) REFERENCES orders (`external_guid`)
);

COMMIT;
