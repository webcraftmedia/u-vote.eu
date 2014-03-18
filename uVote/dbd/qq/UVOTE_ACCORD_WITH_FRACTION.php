<?php
namespace DBD;
class UVOTE_ACCORD_WITH_FRACTION extends  \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT uvote_votes.* 
FROM uvote_votes 
WHERE ID IN (SELECT poll_ID FROM uvote_votes_per_party WHERE party = ?
AND choice = ?);'
);}}