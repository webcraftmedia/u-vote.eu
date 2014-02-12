<?php
namespace DBD;

class UVOTE_POLL_EXPIRED extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM `uvote_votes` WHERE `ID` = ? AND time_end > CURDATE();'
);}}