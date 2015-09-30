<?php
namespace SQL;

class UVOTE_DATA_USER_COUNT_USERS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) AS count FROM system_user;'
;}}
