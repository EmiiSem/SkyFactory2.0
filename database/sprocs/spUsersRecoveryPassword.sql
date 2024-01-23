USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spUsersRecoveryPassword;

DELIMITER $$;
CREATE PROCEDURE spUsersRecoveryPassword
(
	IN p_login VARCHAR(255),
    IN p_password VARCHAR(255)
)
BEGIN
	DECLARE user_guid VARCHAR(36);
    SELECT external_guid INTO user_guid
    FROM users
    WHERE login = p_login;
    
    IF user_guid IS NOT NULL THEN
		SET @new_password = SHA2(p_password, 256);
    
		UPDATE users
        SET password = @new_password
        WHERE external_guid = user_guid;
    END IF;
END $$;

COMMIT;