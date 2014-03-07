<?php
namespace DBD;

class UVOTE_DATA_USER_ADD_DATA_INSERT extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'INSERT INTO `uvote_user_additional` (`user_ID`, `location`, `birthyear`, `gender`, `children`) VALUES (?, ?, ?, ?, ?) 
    ON DUPLICATE KEY UPDATE user_ID = ?, location = ?, birthyear = ?, gender = ?, children = ?;'
);}}