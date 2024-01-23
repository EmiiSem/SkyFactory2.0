USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS users (
	id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    external_guid VARCHAR(36) NOT NULL DEFAULT (UUID()),
    email VARCHAR(255) NOT NULL,
    password CHAR(64) NOT NULL,
    created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT UQ__users__external_guid UNIQUE (external_guid),
    CONSTRAINT UQ__users__email UNIQUE (email)
);

COMMIT;