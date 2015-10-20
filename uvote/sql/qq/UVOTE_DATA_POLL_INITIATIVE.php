<?php
namespace SQL;

class UVOTE_DATA_POLL_INITIATIVE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM uvote_votes WHERE uvote_votes.group = 2 AND initiative = ?;' 
;}}
