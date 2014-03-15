<?php
namespace DBD;

class UVOTE_DATA_USER_COUNT_USERS extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) AS count FROM system_user;'
);}}
