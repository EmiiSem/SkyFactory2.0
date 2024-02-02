USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS categories
(
	id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(1000) NOT NULL,
    created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT UQ__categories__name UNIQUE (name)
);

COMMIT;