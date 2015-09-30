<?php
namespace SQL;

class UVOTE_DATA_USER_CHOICE_PER_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM `uvote_data` WHERE poll_ID = ? AND `user_ID` = ?;'
;}}