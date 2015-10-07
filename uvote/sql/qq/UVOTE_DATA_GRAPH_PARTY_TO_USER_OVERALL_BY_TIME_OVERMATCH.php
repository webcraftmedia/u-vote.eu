<?php
namespace SQL;

class UVOTE_DATA_GRAPH_PARTY_TO_USER_OVERALL_BY_TIME_OVERMATCH extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) as total FROM uvote_votes_per_party LEFT JOIN uvote_data ON uvote_votes_per_party.poll_ID = uvote_data.poll_ID WHERE party = ? AND user_id = ?;'
;}}
