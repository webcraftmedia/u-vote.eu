<?php
namespace SQL;

class UVOTE_DATA_USER_COMMENT_INSERT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO `uvote_user_comments` (`c_choice`, `poll_ID`, `user_ID`, `c_txt`, `c_src`, `timestamp`) 
    VALUES (?, ?, ?, ?, ?, NOW());'
;}}