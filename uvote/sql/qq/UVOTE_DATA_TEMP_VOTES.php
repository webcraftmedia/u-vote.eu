<?php
namespace SQL;

class UVOTE_DATA_TEMP_VOTES extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT 
-- uvdata.user_ID as uid, uvote_votes.ID as ID
SUM(CASE WHEN user_ID = ? THEN 1 ELSE 0 END) as voted,
SUM(CASE WHEN user_ID is NULL THEN 1 ELSE 0 END) AS not_voted 
FROM uvote_votes
LEFT JOIN (SELECT * FROM uvote_data WHERE uvote_data.user_ID = ?) as uvdata
ON  uvdata.poll_ID  = uvote_votes.ID WHERE uvote_votes.time_end > NOW();' 
;}}
