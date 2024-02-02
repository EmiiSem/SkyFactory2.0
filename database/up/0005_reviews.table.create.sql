USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS reviews
(
	id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    external_guid VARCHAR(36) NOT NULL DEFAULT (UUID()),
    advantages TEXT NULL,
    disadvantages TEXT NULL,
    comment TEXT NULL,
    stars INT NOT NULL,
    created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT UQ__reviews__external_guid UNIQUE (external_guid)
);

COMMIT;