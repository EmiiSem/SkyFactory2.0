USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spSessionsGC;

DELIMITER $$
CREATE PROCEDURE spSessionsGC
(
	IN `gc_lifetime` DATETIME
)
BEGIN
	DELETE FROM `sessions` s
    WHERE s.`session_expires` < `gc_lifetime`;
    
    OPTIMIZE TABLE `sessions`;
END $$

COMMIT;