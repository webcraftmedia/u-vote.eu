<?php
namespace DBD;

class UVOTE_DATA_BT_INSERT extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'INSERT INTO uvote_votes_per_party 
    (poll_ID, party, votes_pro, votes_contra, nr_attending, total, choice) 
    VALUES (?, ?, ?, ?, ?, ?, ?);'
);}}