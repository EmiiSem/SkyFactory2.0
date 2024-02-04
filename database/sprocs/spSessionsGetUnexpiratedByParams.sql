USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS `spSessionsGetUnexpiratedByParams`;

DELIMITER $$
CREATE PROCEDURE `spSessionsGetUnexpiratedByParams`
(
	IN `session_id` VARCHAR(32),
    IN `expires_time` DATETIME
)
BEGIN
	SELECT s.`session_id`
		,s.`session_expires`
        ,s.`session_data`
    FROM `sessions` s
    WHERE s.`session_id` = `session_id`
		AND s.`session_expires` > `expires_time`;
END $$

COMMIT