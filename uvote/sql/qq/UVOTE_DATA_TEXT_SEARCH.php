<?php
namespace SQL;

class UVOTE_DATA_TEXT_SEARCH extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM uvote_votes WHERE `title` LIKE ?;'
;}}
