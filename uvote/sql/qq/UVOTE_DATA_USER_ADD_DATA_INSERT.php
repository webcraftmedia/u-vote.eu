<?php
namespace SQL;

class UVOTE_DATA_USER_ADD_DATA_INSERT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO `uvote_user_additional` (`user_ID`, `location`, `birthyear`, `gender`, `children`) VALUES (?, ?, ?, ?, ?) 
    ON DUPLICATE KEY UPDATE user_ID = ?, location = ?, birthyear = ?, gender = ?, children = ?;'
;}}