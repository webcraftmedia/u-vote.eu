<?php
namespace DBD;

class UVOTE_DATA_USER_COMMENT_INSERT extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'INSERT INTO `uvote_user_comments` (`c_choice`, `poll_ID`, `user_ID`, `c_txt`, `c_src`, `timestamp`) 
    VALUES (?, ?, ?, ?, ?, NOW());'
);}}