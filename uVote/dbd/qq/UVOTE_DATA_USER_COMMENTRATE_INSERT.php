<?php
namespace DBD;

class UVOTE_DATA_USER_COMMENTRATE_INSERT extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'INSERT INTO `uvote_user_comments_additional`  (`c_ID`, `user_ID`, `val`, `timestamp`) VALUES (?, ?, ?, NOW()) ON DUPLICATE KEY UPDATE `c_ID` = ?, `user_ID` = ?, `val` = ?, `timestamp` = NOW();'
);}}