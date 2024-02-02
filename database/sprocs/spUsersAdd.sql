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
    DECLARE user_guid VARCHAR(36) DEFAULT NULL;
    DECLARE inserted_user_guid VARCHAR(36) DEFAULT NULL;
    
    SELECT external_guid INTO user_guid 
    FROM users 
    WHERE email = p_email;
    
    IF user_guid IS NULL THEN
        SET @hashedPassword = SHA2(p_password, 256);
        
        INSERT INTO users (email, password)
        VALUES (p_email, @hashedPassword);
        
        SET @inserted_user_id = LAST_INSERT_ID();
        
		SELECT external_guid INTO inserted_user_guid 
        FROM users 
        WHERE id = @inserted_user_id;
        
        INSERT INTO persons (external_user_guid, fullName, address)
        VALUES (inserted_user_guid, p_full_name, p_address);
    END IF;
END $$

COMMIT;