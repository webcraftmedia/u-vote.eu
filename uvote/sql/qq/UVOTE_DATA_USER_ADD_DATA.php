<?php
namespace SQL;

class UVOTE_DATA_USER_ADD_DATA extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM uvote_user_additional WHERE `user_ID` = ?;'
;}}