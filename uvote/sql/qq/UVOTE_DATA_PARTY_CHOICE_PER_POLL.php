<?php
namespace SQL;

class UVOTE_DATA_PARTY_CHOICE_PER_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT `choice` FROM `uvote_votes_per_party` WHERE `poll_ID` = ? AND `party` = ?;'
;}}