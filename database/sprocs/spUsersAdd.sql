USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spUsersAdd;

DELIMITER $$
CREATE PROCEDURE spUsersAdd
(
	IN p_email VARCHAR(255),
    IN p_password VARCHAR(255),
    IN p_full_name VARCHAR(500),
    IN p_address VARCHAR(1000)
)
BEGIN
	DECLARE user_guid VARCHAR(36);
    DECLARE person_guid VARCHAR(36);
    
	SELECT external_guid INTO user_guid FROM users WHERE email = p_email;
    
    IF user_guid IS NULL THEN
		SET @hashedPassword = SHA2(p_password, 256);
        
		INSERT INTO users (email, password)
        VALUES (p_email, hashedPassword);
	
		SELECT external_guid INTO person_guid WHERE external_user_guid = user_guid;
        
        IF person_guid IS NOT NULL THEN
			DELETE FROM persons WHERE external_guid = person_guid;
        END IF;
        
        INSERT INTO persons (fullName, address)
        VALUES (p_full_name, p_address);
    END IF;
END $$

COMMIT;