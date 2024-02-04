USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS `sessions`
(
	id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `session_id` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
    `session_expires` DATETIME NOT NULL,
    `session_data` TEXT COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

COMMIT;