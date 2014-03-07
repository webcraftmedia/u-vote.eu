<?php
namespace DBD;

class UVOTE_DATA_USER_ADD_DATA extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM uvote_user_additional WHERE `user_ID` = ?;'
);}}