<?php
namespace SQL;

class UVOTE_DATA_CHOICE_OVERALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) as "count", choice FROM uvote_data GROUP BY choice;'
;}}