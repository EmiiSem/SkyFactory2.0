USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS persons (
	id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    external_guid VARCHAR (36) NOT NULL DEFAULT (UUID()),
    external_user_guid VARCHAR(36) NOT NULL,
    fullName VARCHAR(500) NULL,
    address VARCHAR(1000) NULL,
    created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT FK__persons__users FOREIGN KEY (external_user_guid) REFERENCES users (external_guid)
);

COMMIT;