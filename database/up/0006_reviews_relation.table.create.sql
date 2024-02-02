USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

CREATE TABLE IF NOT EXISTS reviews_relation
(
	id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    review_guid VARCHAR(36) NOT NULL,
    product_guid VARCHAR(36) NULL,
    person_guid VARCHAR(36) NOT NULL,
    
    CONSTRAINT FK__reviews_relation__reviews FOREIGN KEY (review_guid) REFERENCES reviews (external_guid),
	CONSTRAINT FK__reviews_relation__products FOREIGN KEY (product_guid) REFERENCES products (external_guid),    
	CONSTRAINT FK__reviews_relation__persons FOREIGN KEY (person_guid) REFERENCES persons (external_guid)
);

COMMIT;