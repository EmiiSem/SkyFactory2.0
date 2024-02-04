USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spSessionsDestroyById;

DELIMITER $$
CREATE PROCEDURE spSessionsDestroyById
(
	IN `session_id` VARCHAR(32)
)
BEGIN
	DELETE FROM `sessions` s
    WHERE s.`session_id` = `session_id`;
END $$

COMMIT
