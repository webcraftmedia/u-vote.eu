<?php
namespace SQL;

class UVOTE_DATA_NEWSFEED extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM system_text_tag LEFT JOIN system_text ON system_text.id = system_text_tag.id WHERE system_text_tag.tag = "news" ORDER BY time_create DESC LIMIT 7;'
;}}