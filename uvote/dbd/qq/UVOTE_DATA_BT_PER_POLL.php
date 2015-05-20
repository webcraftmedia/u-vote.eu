<?php
namespace DBD;

class UVOTE_DATA_BT_PER_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT 
    sum(votes_pro) as bt_pro, 
    sum(votes_contra) as bt_con, 
    sum(nr_attending) as bt_attending, 
    sum(total) as bt_total
FROM uvote_votes_per_party WHERE poll_ID = ?;'
);}}