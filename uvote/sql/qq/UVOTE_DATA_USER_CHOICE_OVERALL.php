<?php
namespace SQL;

class UVOTE_DATA_USER_CHOICE_OVERALL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT SUM(IF(choice = "1",1,0)) AS total_pro, 
        SUM(IF(choice = "2",1,0)) AS total_con, 
        SUM(IF(choice = "3",1,0)) AS total_ent 
FROM `uvote_data` WHERE `user_ID` = ?;'
;}}