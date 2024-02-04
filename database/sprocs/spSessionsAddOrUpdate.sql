USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spSessionsAddOrUpdate;

DELIMITER $$
CREATE PROCEDURE spSessionsAddOrUpdate
(
	IN `p_session_id` VARCHAR(32),
    IN `p_session_expires` DATETIME,
    IN `p_session_data` TEXT
)
BEGIN
	IF EXISTS (SELECT * FROM `sessions` s WHERE s.`session_id` = `p_session_id`) THEN
		UPDATE `sessions` SET 
			 `session_id` = `p_session_id`
			,`session_expires` = `p_session_expires`
            ,`session_data` = `p_session_data`;
    ELSE
		INSERT INTO `sessions` (
			 `session_id`
            ,`session_expires`
            ,`session_data`
		)
        VALUES (
			 `p_session_id`
             ,`p_session_expires`
             ,`p_session_data`
		);
    END IF;
END $$

COMMIT;