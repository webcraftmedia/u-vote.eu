CREATE TABLE `uvote_votes_tag` (
	`poll_ID` INT(10) NULL DEFAULT NULL,
	`tag` CHAR(50) NULL DEFAULT NULL,
	`group` INT(11) NULL DEFAULT NULL
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;
