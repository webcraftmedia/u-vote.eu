<?php

class votes {
    public static function getAllVotesOfGroup($groupid){
        return \DBD\UVOTE_GENERATE_VOTELIST::QA(array($groupid));}
    
    public static function countAllPolls(){
        $res = \DBD\UVOTE_DATA_COUNT_VOTES::QQ();
    return $res;}
        
    public static function insertPartyChoice($poll_ID, $party, $votes_pro, $votes_contra, $nr_attending, $total, $choice){
        return \DBD\UVOTE_GENERATE_VOTELIST::QI(array($poll_ID, $party, $votes_pro, $votes_contra, $nr_attending, $total, $choice));}

    public static function getVoteOfGroup($poll_ID){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVoteByGrp',
                                'SELECT * FROM `uvote_votes` WHERE `ID` = ? LIMIT 1;',
                                array($poll_ID));        
        $result = $res->next();                                        
        return $result;
    }
    
    public static function getUserPollData($poll_ID){
        if (!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return NULL;}
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVoteByGrp',
                                'SELECT * FROM `uvote_data` WHERE `user_ID` = ? AND poll_ID = ?;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id,$poll_ID));        
        $result = $res->next();                                        
        return $result['choice'];            
    }
    
    public static function get_barsperusers($poll_ID,$return_as_json = true){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        //count
        $res = $con->prepare(  'selVoteBy_count',
                                'SELECT COUNT(*) as "count" FROM `uvote_data` WHERE `poll_ID` = ?;',
                                array($poll_ID));
        $res = $res->next();
        $result = array();
        $result['poll_ID'] = $poll_ID;
        $result['count'] = $res['count'] >= 1 ? $res['count'] : 1;
        //yes
        $res = $con->prepare(  'selVoteBy_count',
                                'SELECT COUNT(*) as "count" FROM `uvote_data` WHERE `poll_ID` = ? AND choice = 1;',
                                array($poll_ID));
        $res = $res->next();
        $result['yes'] = $res['count'];
        
        $result['yes_perc'] = $res['count'] / $result['count'];
        //no
        $res = $con->prepare(  'selVoteBy_count',
                                'SELECT COUNT(*) as "count" FROM `uvote_data` WHERE `poll_ID` = ? AND choice = 2;',
                                array($poll_ID));
        $res = $res->next();
        $result['no'] = $res['count'];
        $result['no_perc'] = $res['count'] / $result['count'];
        //ent
        $res = $con->prepare(  'selVoteBy_count',
                                'SELECT COUNT(*) as "count" FROM `uvote_data` WHERE `poll_ID` = ? AND choice = 3;',
                                array($poll_ID));
        $res = $res->next();
        $result['ent'] = $res['count'];
        $result['ent_perc'] = $res['count'] / $result['count'];
        
        return $return_as_json ? JsonResult::toString($result) : $result;
    }
    
    public static function get_all_votes(){
        $res = \DBD\UVOTE_DATA_CHOICE_OVERALL::QA();
        return $res;
    }
    
    public static function get_all_votes_bt(){
        $res = \DBD\UVOTE_DATA_CHOICE_BT_OVERALL::QA();
        return $res;
    }
    
    public static function get_user_temp_votes($user_ID){
        return \DBD\UVOTE_DATA_TEMP_VOTES::Q1(array($user_ID, $user_ID, $user_ID));}
    
    public static function get_bar_bt_per_poll($poll_ID){
        return \DBD\UVOTE_DATA_BT_PER_POLL::Q1(array($poll_ID));}
    
    public static function get_user_per_party_overall($user_ID){
        return \DBD\UVOTE_DATA_USER_PER_PARTY_OVERALL::QA(array($user_ID));        
    }
    public static function get_user_to_bt_overall($user_ID){
        return \DBD\UVOTE_DATA_USER_TO_BT::QA(array($user_ID));        
    }

    public static function get_users_choice_per_poll($poll_ID){
        return \DBD\UVOTE_DATA_USERS_CHOICE_PER_POLL::QA(array($poll_ID));}
    
    public static function get_voteinfo($poll_ID){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVoteByID',
                                'SELECT * FROM `uvote_votes` WHERE `ID` = ?;',
                                array($poll_ID));        
        $res = $res->next();
        return $res;
    }
    
    public static function get_barsperparty($poll_ID){
        return \DBD\UVOTE_DATA_PARTY_PER_POLL::QA(array($poll_ID));}
        
    public static function get_party_choice($poll_ID, $party){
        $res = \DBD\UVOTE_DATA_PARTY_CHOICE_PER_POLL::Q1(array($poll_ID, $party));
        return $res;                            
    }
    
    public static function write_vote($poll_ID, $vote){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            throw new ERROR("You need to be logged in.");}
            
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVote',
                                'SELECT * FROM `uvote_votes` WHERE `ID` = ? AND time_end < CURDATE();',
                                array($poll_ID));
         if ($res->next()){
             throw new ERROR('Your rights have expired!');}
                     
        $res = $con->prepare(   'insertVote',
                                'REPLACE uvote_data
                                 VALUES (?, ?, ?, 0, NOW());',
                                array($poll_ID, \SYSTEM\SECURITY\Security::getUser()->id, $vote));   
        return JsonResult::ok();
    }
    
    public static function write_poll($ID, $title, $iframe_link ){    
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());                    
        $res = $con->prepare(   'insertPoll',
                                'INSERT INTO uvote_votes
                                 VALUES (?, ?, ?);',
                                array($ID, $title, $iframe_link));   
        return JsonResult::ok();
    }
    
    public static function write_feedback($feedback){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            throw new ERROR("You need to be logged in.");}
            
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());                    
        $res = $con->prepare(   'insertFeedback',
                                'INSERT INTO uvote_beta_feedback
                                 VALUES (?, ?);',
                                array(\SYSTEM\SECURITY\Security::getUser()->id, $feedback));   
        return JsonResult::ok();
    }
    
    public static function open_vote($poll_ID){
        $vote = votes::getVoteOfGroup($poll_ID);
        $result = SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/full_vote.tpl'), $vote);
        return $result;
    }
}
