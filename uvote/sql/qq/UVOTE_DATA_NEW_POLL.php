<?php
namespace SQL;

class UVOTE_DATA_NEW_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO `uvote_votes` (`group`, `title`, `p_fields`, `text`, `initiative`, `time_start`, `time_end`, `quick`, `iframe_link`, `bt_choice`) VALUES (1, ?, 0, "", "", NOW(), ?, NULL, ?, "");
'
;}}