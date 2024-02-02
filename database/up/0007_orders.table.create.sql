USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS orders 
(
	id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    external_guid VARCHAR(36) NOT NULL DEFAULT (UUID()),
    person_guid VARCHAR(36) NOT NULL,
    created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT UQ__orders_external_guid UNIQUE (external_guid),
    CONSTRAINT FK__orders__persons FOREIGN KEY (person_guid) REFERENCES persons (external_guid)
);

COMMIT;