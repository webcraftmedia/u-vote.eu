<?php
namespace SQL;

class UVOTE_DATA_USER_TO_BT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT sum(case when uvote_data.choice = uvote_votes.bt_choice then 1 else 0 end) class_MATCH,
		 sum(case when uvote_data.choice != uvote_votes.bt_choice then 1 else 0 end) class_MISSMATCH 
FROM uvote_data LEFT JOIN uvote_votes 
ON uvote_data.poll_ID = uvote_votes.ID 
WHERE user_ID = ?;'
;}}