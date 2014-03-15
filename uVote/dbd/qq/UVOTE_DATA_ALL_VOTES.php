<?php
namespace DBD;

class UVOTE_DATA_ALL_VOTES extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) FROM uvote_data;'
);}}