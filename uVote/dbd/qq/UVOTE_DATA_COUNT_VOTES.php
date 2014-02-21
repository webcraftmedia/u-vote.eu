<?php
namespace DBD;

class UVOTE_DATA_COUNT_VOTES extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) as "count" FROM uvote_votes;'
);}}
