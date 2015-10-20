<?php
namespace SQL;

class UVOTE_POLL_EXPIRED extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM `uvote_votes` WHERE `ID` = ? AND uvote_votes.group = ?;'
;}}