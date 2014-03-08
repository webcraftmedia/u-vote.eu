<?php
namespace DBD;

class UVOTE_GENERATE_COMMENTS_PER_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM `uvote_user_comments` WHERE `poll_ID` = ? AND c_choice = ?  ORDER BY (txt_up-txt_down) ASC;'
);}}