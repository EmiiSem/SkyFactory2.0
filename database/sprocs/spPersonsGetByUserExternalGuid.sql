USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS `spPersonsGetByUserExternalGuid`;

DELIMITER $$
CREATE PROCEDURE `spPersonsGetByUserExternalGuid`
(
	IN `user_external_guid` VARCHAR(36)
)
BEGIN
	SELECT u.`external_guid` AS `user_external_guid`
		,p.`external_guid` AS `person_external_guid`
		,u.`email`
        ,p.`fullName`
        ,p.`address`
    FROM `users` u
    LEFT JOIN `persons` p ON p.`external_user_guid` = u.`external_guid`
    WHERE u.`external_guid` = `user_external_guid`;
END $$

COMMIT;