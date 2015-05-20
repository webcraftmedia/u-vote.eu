<?php
namespace DBD;

class UVOTE_DATA_CHOICE_OVERALL extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) as "count", choice FROM uvote_data GROUP BY choice;'
);}}