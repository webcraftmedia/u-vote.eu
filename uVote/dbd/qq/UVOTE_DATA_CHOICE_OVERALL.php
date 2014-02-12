<?php
namespace DBD;

class UVOTE_DATA_CHOICE_OVERALL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) as "count" FROM uvote_data WHERE CHOICE = ?;'
);}}