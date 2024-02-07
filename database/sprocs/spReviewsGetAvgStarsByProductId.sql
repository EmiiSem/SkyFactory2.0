USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS `spReviewsGetAvgStarsByProductId`;

DELIMITER $$
CREATE PROCEDURE `spReviewsGetAvgStarsByProductId`
(
	IN `p_product_id` BIGINT
)
BEGIN
    SELECT
		CASE 
			WHEN COUNT(*) > 0
				THEN AVG(`stars`)
			ELSE 0
		END AS `stars`
	FROM `reviews` r
	LEFT JOIN `reviews_relation` rr ON rr.`review_guid` = r.`external_guid`
	LEFT JOIN `products` p ON p.`external_guid` = rr.`product_guid`
	WHERE p.`id` = `p_product_id`;
END $$

COMMIT;
