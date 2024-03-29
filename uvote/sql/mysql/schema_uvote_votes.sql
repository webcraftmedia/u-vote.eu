CREATE TABLE `uvote_votes` (
	`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`group` INT(10) UNSIGNED NOT NULL,
	`title` TINYTEXT NOT NULL,
	`p_fields` INT(11) NULL DEFAULT NULL,
	`text` TEXT NOT NULL,
	`initiative` TINYTEXT NULL,
	`time_start` DATE NOT NULL,
	`time_end` DATE NOT NULL,
	`quick` TEXT NULL,
	`iframe_link` VARCHAR(255) NULL DEFAULT NULL,
	`bt_choice` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`ID`)
)
COLLATE='utf8_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=33
;
