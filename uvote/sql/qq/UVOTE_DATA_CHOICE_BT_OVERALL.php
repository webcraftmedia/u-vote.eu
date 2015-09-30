<?php
namespace SQL;

class UVOTE_DATA_CHOICE_BT_OVERALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) as "count", bt_choice FROM uvote_votes GROUP BY bt_choice;'
;}}