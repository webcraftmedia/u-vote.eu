<?php
namespace SQL;

class UVOTE_DATA_GRAPH_BT_TO_UVOTE_OVERALL_BY_TIME extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT
	DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP(a.`timestamp`) - MOD(UNIX_TIMESTAMP(a.`timestamp`),?)),"%Y/%m/%d %H:%i:%s") as day,
	SUM(CASE WHEN  a.choice = c.bt_choice THEN 1 ELSE 0 END) class_match,
	SUM(CASE WHEN  a.choice = c.bt_choice THEN 0 ELSE 1 END) class_mismatch
FROM uvote_data as a
LEFT JOIN (Select choice, poll_ID FROM uvote_data GROUP BY choice LIMIT 1) b ON a.poll_ID = b.poll_ID
LEFT JOIN uvote_votes as c ON a.poll_ID = c.ID
WHERE bt_choice
GROUP BY day;'
;}}
