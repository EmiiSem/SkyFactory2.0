USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS products
(
	`id` BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `external_guid` VARCHAR(36) NOT NULL DEFAULT (UUID()),
    `name` NVARCHAR(500) NOT NULL,
    `description` TEXT NULL,
    `features` TEXT NULL,
    `category` BIGINT NOT NULL DEFAULT (0),
    `created_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT `UQ__products__external_guid` UNIQUE (`external_guid`),
    CONSTRAINT `FK__products__category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`)
);

COMMIT;