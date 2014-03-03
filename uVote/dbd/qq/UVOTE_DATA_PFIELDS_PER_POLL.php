<?php
namespace DBD;

class UVOTE_DATA_PFIELDS_PER_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) as count, choice FROM uvote_data WHERE `poll_ID` = ? GROUP BY choice ORDER BY count DESC;'
);}}