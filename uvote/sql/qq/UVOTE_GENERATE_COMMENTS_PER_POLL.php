<?php
namespace SQL;

class UVOTE_GENERATE_COMMENTS_PER_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM `uvote_user_comments` WHERE `poll_ID` = ? AND c_choice = ? ORDER BY (txt_up-txt_down) ASC;'
;}}