<?php
namespace SQL;

class UVOTE_DATA_USER_TO_PARTY_OVERALL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT sum(case when uvote_data.choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
		 sum(case when uvote_data.choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
FROM uvote_data LEFT JOIN uvote_votes_per_party 
ON uvote_data.poll_ID = uvote_votes_per_party.poll_ID 
WHERE party = ?;'
;}}