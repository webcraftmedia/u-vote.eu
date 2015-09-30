<?php
namespace SQL;

class UVOTE_DATA_USER_COUNT_CHOICE_PER_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) AS count FROM uvote_data WHERE `poll_ID` = ?;'
;}}