<?php
namespace DBD;

class UVOTE_DATA_USER_CHOICE_PER_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM `uvote_data` WHERE poll_ID = ? AND `user_ID` = ?;'
);}}