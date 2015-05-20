<?php
namespace DBD;

class UVOTE_GENERATE_VOTELIST extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM `uvote_votes` WHERE `group` = ? AND time_end > NOW() ORDER BY (time_end-time_start) ASC;'
);}}