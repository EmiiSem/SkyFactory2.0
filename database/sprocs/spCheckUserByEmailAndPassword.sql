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
	SET @exists_external_user_guid = NULL;
	SET @hashedPassword = SHA2(p_password, 256);
    
    SELECT external_guid INTO @exists_user_external_guid
    FROM users
    WHERE email = p_email
		AND password = @hashedPassword
	LIMIT 1;
    
    IF @exists_user_external_guid IS NOT NULL THEN
		SELECT u.external_guid
			,u.email
			,p.fullName
        FROM users u
        LEFT JOIN persons p ON p.external_user_guid = u.external_guid
        WHERE u.external_guid = @exists_user_external_guid
        LIMIT 1;
    END IF;
END $$

COMMIT;