<?php
namespace SQL;

class UVOTE_DATA_CHOICE_OVERALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT SUM(IF(choice = "1",1,0)) AS pro, 
        SUM(IF(choice = "2",1,0)) AS con, 
        SUM(IF(choice = "3",1,0)) AS ent 
FROM `uvote_data`;'
;}}