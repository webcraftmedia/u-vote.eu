<?php
namespace SQL;

class UVOTE_DATA_PFIELDS_PER_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) as count, choice FROM uvote_data WHERE `poll_ID` = ? GROUP BY choice ORDER BY count DESC;'
;}}