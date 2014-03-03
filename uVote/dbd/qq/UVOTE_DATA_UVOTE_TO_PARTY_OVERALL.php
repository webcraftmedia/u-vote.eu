<?php
namespace DBD;

class UVOTE_DATA_UVOTE_TO_PARTY_OVERALL extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT party, sum(case when uvote_data.choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
		 sum(case when uvote_data.choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
FROM uvote_data INNER JOIN uvote_votes_per_party 
ON uvote_data.poll_ID = uvote_votes_per_party.poll_ID 
 GROUP BY party;'
);}}