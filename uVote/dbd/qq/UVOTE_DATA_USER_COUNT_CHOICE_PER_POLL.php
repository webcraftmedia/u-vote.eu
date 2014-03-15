<?php
namespace DBD;

class UVOTE_DATA_USER_COUNT_CHOICE_PER_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) AS count FROM uvote_data WHERE `poll_ID` = ?;'
);}}