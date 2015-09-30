<?php
namespace SQL;

class UVOTE_DATA_UPDATE_POLL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'UPDATE `uvote_votes` SET `title` = ?, `iframe_link` = ?
    WHERE ID = ?;'
;}}