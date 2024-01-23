USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spUsersCheckExists;

DELIMITER $$
CREATE PROCEDURE spUsersCheckExists
(
	IN p_email VARCHAR(255)
)
BEGIN
	SELECT IF (u.external_guid IS NOT NULL, 1, 0)
    FROM users u
    WHERE u.email = p_email;
END $$

COMMIT;