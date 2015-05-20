<?php
namespace DBD;

class UVOTE_DATA_USER_COMMENTRATE_PER_COMMENT extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT COUNT(*) as count FROM uvote_user_comments_additional where c_ID = ? AND val = ?;'
);}}