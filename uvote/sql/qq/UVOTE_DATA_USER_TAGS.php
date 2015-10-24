<?php
namespace SQL;

class UVOTE_DATA_USER_TAGS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT DISTINCT(tag) as tag FROM uvote_votes_tag;'
;}}