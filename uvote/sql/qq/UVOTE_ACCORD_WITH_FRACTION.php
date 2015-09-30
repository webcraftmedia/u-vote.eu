<?php
namespace SQL;
class UVOTE_ACCORD_WITH_FRACTION extends  \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'   SELECT v.*, d.choice as user_choice, p.choice as party_choice
    FROM uvote_data as d
    LEFT JOIN uvote_votes as v
        ON d.poll_ID = v.ID
    LEFT JOIN uvote_votes_per_party as p
        ON v.ID = p.poll_ID
    WHERE p.party = ?
	 AND d.user_ID = ?  AND d.choice = p.choice;';
    }    
}