<?php
namespace SQL;

class UVOTE_DATA_BT_PER_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT 
    sum(votes_pro) as bt_pro, 
    sum(votes_contra) as bt_con, 
    sum(nr_attending) as bt_attending, 
    sum(total) as bt_total
FROM uvote_votes_per_party WHERE poll_ID = ?;'
;}}