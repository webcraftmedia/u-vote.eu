CREATE TABLE `uvote_votes_per_party` (
	`poll_ID` INT(10) NOT NULL,
	`party` TINYTEXT NOT NULL,
	`votes_pro` INT(10) NULL DEFAULT NULL,
	`votes_contra` INT(10) NULL DEFAULT NULL,
	`nr_attending` INT(10) NULL DEFAULT NULL,
	`total` INT(10) NULL DEFAULT NULL,
	`choice` INT(10) NULL DEFAULT NULL,
	`bt_choice` INT(10) NULL DEFAULT NULL
)
COLLATE='utf8_general_ci'
ENGINE=MyISAM
;