USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

DROP PROCEDURE IF EXISTS spReviewsGetByProductId;

DELIMITER $$
CREATE PROCEDURE spReviewsGetByProductId
(
	IN `p_product_id` BIGINT
)
BEGIN
	SELECT r.`advantages`
		,r.`disadvantages`
        ,r.`comment`
        ,r.`stars`
        ,p.`fullName` AS `commenter_name`
    FROM `reviews` r
    LEFT JOIN `reviews_relation` rr ON rr.`review_guid` = r.`external_guid`
    LEFT JOIN `persons` p ON r.`external_guid` = rr.`person_guid`
    LEFT JOIN `products` pr ON pr.`external_guid` = rr.`product_guid`
    WHERE pr.`id` = `p_product_id`;
END $$

COMMIT;