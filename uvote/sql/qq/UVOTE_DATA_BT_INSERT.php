<?php
namespace SQL;

class UVOTE_DATA_BT_INSERT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO uvote_votes_per_party 
    (poll_ID, party, votes_pro, votes_contra, nr_attending, total, choice) 
    VALUES (?, ?, ?, ?, ?, ?, ?);'
;}}