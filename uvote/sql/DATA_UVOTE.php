<?php
namespace SQL;
class DATA_UVOTE extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_mysql(){
        return array(   (new \PSQL('/mysql/schema_uvote_votes.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/schema_uvote_data.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/schema_uvote_votes_per_party.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/schema_uvote_user_additional.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/schema_uvote_votes_tag.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/uvote_votes.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/uvote_votes_per_party.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/uvote_votes_tag.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/system_text.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/system_page.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/system_api.sql'))->SERVERPATH());
    }    
}