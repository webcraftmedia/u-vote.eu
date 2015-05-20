<?php
namespace DBD;

class UVOTE_DATA_CHOICE_BT_OVERALL extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) as "count", bt_choice FROM uvote_votes GROUP BY bt_choice;'
);}}