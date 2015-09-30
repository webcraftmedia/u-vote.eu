<?php
namespace SQL;

class UVOTE_GENERATE_VOTELIST extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM `uvote_votes` WHERE `group` = ? AND time_end > NOW() ORDER BY (time_end-time_start) ASC;'
;}}