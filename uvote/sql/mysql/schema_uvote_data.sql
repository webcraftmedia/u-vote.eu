CREATE TABLE `uvote_data` (
	`poll_ID` INT(10) NOT NULL DEFAULT '0',
	`user_ID` INT(10) NOT NULL DEFAULT '0',
	`choice` INT(10) NULL DEFAULT NULL,
	`group` INT(10) NULL DEFAULT NULL,
	`timestamp` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`poll_ID`, `user_ID`)
)
COLLATE='utf8_general_ci'
ENGINE=MyISAM
;