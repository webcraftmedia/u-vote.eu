<?php
namespace SQL;

class UVOTE_DATA_COMMUNITY_TO_PARTIES_OVERALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT         uvote_votes_per_party.party as party,
                 sum(case when uvote_data.choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
		 sum(case when uvote_data.choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
FROM uvote_data LEFT JOIN uvote_votes_per_party 
ON uvote_data.poll_ID = uvote_votes_per_party.poll_ID 
WHERE uvote_votes_per_party.choice GROUP by party;'
;}}