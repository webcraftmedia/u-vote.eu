<?php
namespace DBD;

class UVOTE_DATA_PARTY_CHOICE_PER_POLL extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT `choice` FROM `uvote_votes_per_party` WHERE `poll_ID` = ? AND `party` = ?;'
);}}