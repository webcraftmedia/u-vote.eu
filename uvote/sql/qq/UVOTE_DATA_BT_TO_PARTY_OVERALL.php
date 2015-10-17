<?php
namespace SQL;

class UVOTE_DATA_BT_TO_PARTY_OVERALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT party, sum(case when uvote_votes.bt_choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
               sum(case when uvote_votes.bt_choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_votes INNER JOIN uvote_votes_per_party 
                                    ON uvote_votes.ID = uvote_votes_per_party.poll_ID GROUP BY party;'
;}}