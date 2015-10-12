<?php
namespace SQL;

class UVOTE_EDIT_NEW_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'UPDATE uvote_votes SET title = "testtest", iframe_link = "testtestttest" WHERE ID = 40;'
;}}