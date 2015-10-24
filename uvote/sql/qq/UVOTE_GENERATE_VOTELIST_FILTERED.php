<?php
namespace SQL;

class UVOTE_GENERATE_VOTELIST_FILTERED extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM `uvote_votes` LEFT JOIN uvote_votes_tag ON uvote_votes.ID = uvote_votes_tag.poll_ID WHERE uvote_votes.group = ? AND uvote_votes_tag.tag = ?  ORDER BY (time_end-time_start) ASC;'
;}}