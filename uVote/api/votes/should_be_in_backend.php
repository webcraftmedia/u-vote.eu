<?php

class should_be_in_backend {
    public static function insertPartyChoice($poll_ID, $party, $votes_pro, $votes_contra, $nr_attending, $total, $choice){
        return \DBD\UVOTE_GENERATE_VOTELIST::QI(array($poll_ID, $party, $votes_pro, $votes_contra, $nr_attending, $total, $choice));}
        
    public static function write_poll($ID, $title, $iframe_link ){  
        if ($ID == -1){
            return \DBD\UVOTE_DATA_NEW_POLL::QI(array($title, $iframe_link));
        }
        return \DBD\UVOTE_DATA_UPDATE_POLL::QI(array($title, $iframe_link, $ID));
    }
}
