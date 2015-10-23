<?php
namespace SQL;

class UVOTE_DATA_USER_TAGS_OF_VOTE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT tag FROM uvote_votes_tag LEFT JOIN uvote_votes ON uvote_votes_tag.poll_ID = uvote_votes.ID WHERE uvote_votes.ID = ? AND uvote_votes.group = 1;'
;}}