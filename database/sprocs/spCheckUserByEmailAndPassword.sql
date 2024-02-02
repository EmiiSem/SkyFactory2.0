USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spCheckUserByEmailAndPassword;

DELIMITER $$
CREATE PROCEDURE spCheckUserByEmailAndPassword
(
	IN p_email VARCHAR(255),
    IN p_password VARCHAR(255)
)
BEGIN
	SET @hashedPassword = SHA2(p_password, 256);
    
    SELECT IF (external_guid IS NOT NULL, 1, 0)
    FROM users
    WHERE email = p_email
		AND password = @hashedPassword;
END $$

COMMIT;