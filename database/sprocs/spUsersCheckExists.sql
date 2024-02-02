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
    SET @user_external_guid = NULL;
    
	SELECT u.external_guid INTO @user_external_guid
    FROM users u
    WHERE u.email = p_email;

	SELECT 
		CASE 
			WHEN @user_external_guid IS NOT NULL
				THEN 1
			ELSE 0
		END;
END $$

COMMIT;