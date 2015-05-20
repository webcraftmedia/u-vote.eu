<?php
namespace DBD;

class UVOTE_DATA_NEW_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'INSERT INTO `uvote_votes` (`title`, `iframe_link`) 
    VALUES (?, ?);'
);}}