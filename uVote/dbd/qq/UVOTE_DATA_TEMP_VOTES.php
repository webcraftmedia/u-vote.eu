<?php
namespace DBD;

class UVOTE_DATA_TEMP_VOTES extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT SUM(CASE WHEN uvote_data.user_ID = ? THEN 1 ELSE 0 END) as voted,
        SUM(CASE WHEN uvote_data.user_ID = ? THEN 0 ELSE 1 END) AS not_voted 
FROM uvote_data RIGHT JOIN uvote_votes ON ( uvote_data.poll_ID  = uvote_votes.ID AND uvote_data.user_ID = ?)
WHERE time_end > NOW();'
);}}
