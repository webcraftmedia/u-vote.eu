<?php
namespace SQL;

class UVOTE_DATA_ALL_VOTES extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) FROM uvote_data;'
;}}