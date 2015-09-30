<?php
namespace SQL;

class UVOTE_DATA_USER_COMMENTRATE_PER_COMMENT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) as count FROM uvote_user_comments_additional where c_ID = ? AND val = ?;'
;}}