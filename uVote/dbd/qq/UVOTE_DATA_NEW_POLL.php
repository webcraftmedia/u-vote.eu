<?php
namespace DBD;

class UVOTE_DATA_USER_COMMENT_INSERT extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'INSERT INTO `uvote_votes` (`ID`, `title`, `iframe_link`) 
    VALUES (?, ?, ?);'
);}}