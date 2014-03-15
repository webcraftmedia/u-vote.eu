<?php
namespace DBD;

class UVOTE_DATA_UPDATE_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'UPDATE `uvote_votes` SET `title` = ?, `iframe_link` = ?
    WHERE ID = ?;'
);}}