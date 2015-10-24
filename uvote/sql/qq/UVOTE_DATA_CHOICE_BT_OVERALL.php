<?php
namespace SQL;

class UVOTE_DATA_CHOICE_BT_OVERALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT SUM(IF(bt_choice = "1",1,0)) AS pro, 
        SUM(IF(bt_choice = "2",1,0)) AS con, 
        SUM(IF(bt_choice = "3",1,0)) AS ent 
FROM `uvote_votes`;'
;}}