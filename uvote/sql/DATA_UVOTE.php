<?php
namespace SQL;
class DATA_UVOTE extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_mysql(){
        return array(   \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/schema_uvote_votes.sql'),
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/.sql'),
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/.sql'),
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/.sql'),
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/.sql'),
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/.sql'));
    }    
}