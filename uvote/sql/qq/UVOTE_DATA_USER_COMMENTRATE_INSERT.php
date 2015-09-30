<?php
namespace SQL;

class UVOTE_DATA_USER_COMMENTRATE_INSERT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO `uvote_user_comments_additional`  (`c_ID`, `user_ID`, `val`, `timestamp`) VALUES (?, ?, ?, NOW()) ON DUPLICATE KEY UPDATE `c_ID` = ?, `user_ID` = ?, `val` = ?, `timestamp` = NOW();'
;}}