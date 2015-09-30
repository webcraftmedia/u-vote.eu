CREATE TABLE `uvote_user_additional` (
	`user_ID` INT(10) NOT NULL DEFAULT '0',
	`location` TEXT NOT NULL,
	`birthyear` INT(10) NULL DEFAULT NULL,
	`gender` TINYTEXT NULL,
	`children` TINYTEXT NULL,
	PRIMARY KEY (`user_ID`)
)
COLLATE='utf8_general_ci'
ENGINE=MyISAM
;
