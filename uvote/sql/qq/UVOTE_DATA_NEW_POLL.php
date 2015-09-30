<?php
namespace SQL;

class UVOTE_DATA_NEW_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO `uvote_votes` (`title`, `iframe_link`) 
    VALUES (?, ?);'
;}}