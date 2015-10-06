<?php

class votes {
    public static function getAllVotesOfGroup($groupid){
        return \SQL\UVOTE_GENERATE_VOTELIST::QA(array($groupid));}
    
    public static function getAllExpVotesOfGroup($groupid){
        return \SQL\UVOTE_GENERATE_VOTELIST_EXP::QA(array($groupid));}        
    
    public static function countAllPolls(){
        $res = \SQL\UVOTE_DATA_COUNT_VOTES::QQ();
        return $res;}                    
    
    public static function get_user_choice_overall($user_ID){
        return \SQL\UVOTE_DATA_USER_CHOICE_OVERALL::Q1(array($user_ID));
    }    
        
    public static function get_user_choice_per_poll($poll_ID, $user_ID){
        return \SQL\UVOTE_DATA_USER_CHOICE_PER_POLL::Q1(array($poll_ID, $user_ID));
    }
    
    public static function getUserPollData($poll_ID){
        if (!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return NULL;}
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'selVoteByGrp',
                                'SELECT * FROM `uvote_data` WHERE `user_ID` = ? AND poll_ID = ?;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id,$poll_ID));        
        $result = $res->next();                                        
        return $result['choice'];            
    }
    public static function get_user_match_per_choice($choice){
        switch($choice){
                case 1:
                    $bar = 'progress-bar-success';
                    break;
                case 2:
                    $bar = 'progress-bar-danger';
                    break;
                case 3:
                    $bar = 'progress-bar-info';
                    break;
                case 0:
                    $bar = 'progress-bar';
            }
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'user_to_party_by_choice',
                                'SELECT party, sum(case when uvote_data.choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
                                               sum(case when uvote_data.choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data INNER JOIN uvote_votes_per_party 
                                    ON uvote_data.poll_ID = uvote_votes_per_party.poll_ID 
                                WHERE user_ID = ? AND uvote_data.choice = ? GROUP BY party;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id, $choice));
        $i = 0;
        while($row = $res->next()){
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $row['bar'] = $bar;
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/urvoteparties_by_choice.tpl'), $row);;
        }
        if(empty($result)){
            return 'Keine relevanten Daten verfügbar';
        }
        
        return $result;        
    }
    public static function get_user_match_per_choice_bt($choice){
        switch($choice){
                case 1:
                    $bar = 'progress-bar-success';
                    $icon_type = 'pro';
                    break;
                case 2:
                    $bar = 'progress-bar-danger';
                    $icon_type = 'con';
                    break;
                case 3:
                    $bar = 'progress-bar-info';
                    $icon_type = 'ent';
                    break;
                case 0:
                    $bar = 'progress-bar';
            }
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'user_to_party_by_choice_bt',
                                'SELECT user_ID, sum(case when uvote_data.choice = uvote_votes.bt_choice then 1 else 0 end) class_MATCH,
                                               sum(case when uvote_data.choice != uvote_votes.bt_choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data INNER JOIN uvote_votes
                                    ON uvote_data.poll_ID = uvote_votes.ID 
                                WHERE user_ID = ? AND uvote_data.choice = ? GROUP by user_ID;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id, $choice));
        $i = 0;
        
        while($row = $res->next()){
            if(empty($row['class_MATCH'])){
            return 'Keine relevanten Daten verfügbar <br>';
            }
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $row['bar'] = $bar;
            $row['icon_type'] = $icon_type;
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/urvotebt_by_choice.tpl'), $row);;
        }
        if(empty($result)){
            return 'Keine relevanten Daten verfügbar';
        }
        
        return $result;        
    }
    public static function get_barsperusers($poll_ID,$return_as_json = true){
        $con = new \SYSTEM\DB\Connection();
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
        $res = \SQL\UVOTE_DATA_CHOICE_OVERALL::QA();
        return $res;
    }
    
    public static function get_all_votes_bt(){
        $res = \SQL\UVOTE_DATA_CHOICE_BT_OVERALL::QA();
        return $res;
    }
    
    public static function get_user_temp_votes($user_ID){
        return \SQL\UVOTE_DATA_TEMP_VOTES::Q1(array($user_ID, $user_ID));}
    
    public static function get_user_overall_votes($user_ID, $creationDate){
        return \SQL\UVOTE_DATA_OVERALL_VOTES::Q1(array($user_ID, $user_ID, $user_ID, $creationDate));}
    
    public static function get_bar_bt_per_poll($poll_ID){
        return \SQL\UVOTE_DATA_BT_PER_POLL::Q1(array($poll_ID));}
    
    public static function get_user_count(){
        return \SQL\UVOTE_DATA_USER_COUNT_USERS::Q1(array());}        
    
    public static function get_count_user_votes_per_poll($poll_ID){
        return \SQL\UVOTE_DATA_USER_COUNT_CHOICE_PER_POLL::Q1(array($poll_ID));}
    
    public static function get_user_per_party_overall($user_ID){
        return \SQL\UVOTE_DATA_USER_PER_PARTY_OVERALL::QA(array($user_ID));        
    }
    public static function get_user_to_bt_overall($user_ID){
        return \SQL\UVOTE_DATA_USER_TO_BT::QA(array($user_ID));        
    }
    
    public static function get_uvote_to_bt_overall(){
        return \SQL\UVOTE_DATA_UVOTE_TO_PARTY_OVERALL::QA(array());        
    }

    public static function vote_accord_with_party($party){        
        if (!\SYSTEM\SECURITY\Security::isloggedin()){
            throw new ERROR("U need to be logged in....sry bro / sis");}
        $user = \SYSTEM\SECURITY\Security::getUser()->id;                
        $data = \SQL\UVOTE_ACCORD_WITH_FRACTION::QA(array($party,$user));
        //$data_escaped = array_walk_recursive($data, 'mysql_real_escape_string');        
        return \SYSTEM\LOG\JsonResult::toString($data);                
    }
    public static function get_users_choice_per_poll($poll_ID){
        return \SQL\UVOTE_DATA_USERS_CHOICE_PER_POLL::QA(array($poll_ID));}
        
    public static function get_pfields_per_poll($poll_ID){
        return \SQL\UVOTE_DATA_USERS_CHOICE_PER_POLL::QA(array($poll_ID));}
    
    public static function get_voteinfo($poll_ID){
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'selVoteByID',
                                'SELECT * FROM `uvote_votes` WHERE `ID` = ?;',
                                array($poll_ID));        
        $res = $res->next();
//        $res['title'] = utf8_encode($res['title']);
        return $res;
    }
    
    public static function get_barsperparty($poll_ID){
        return \SQL\UVOTE_DATA_PARTY_PER_POLL::QA(array($poll_ID));}
        
    public static function get_party_choice($poll_ID, $party){
        $res = \SQL\UVOTE_DATA_PARTY_CHOICE_PER_POLL::Q1(array($poll_ID, $party));
        return $res;                            
    }
    
    public static function write_vote($poll_ID, $vote){
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'selVote',
                                'SELECT * FROM `uvote_votes` WHERE `ID` = ?;',
                                array($poll_ID));   
        $res = $con->prepare(   'insertVote',
                                'REPLACE uvote_data
                                 VALUES (?, ?, ?, 0, NOW());', 
                                array($poll_ID, \SYSTEM\SECURITY\Security::getUser()->id, $vote));   
        return JsonResult::ok();
    }
    
    public static function write_data($location, $birthyear, $gender, $children){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            throw new ERROR("You need to be logged in.");}          
        return \SQL\UVOTE_DATA_USER_ADD_DATA_INSERT::Q1(array(\SYSTEM\SECURITY\Security::getUser()->id, $location, $birthyear, $gender, $children, \SYSTEM\SECURITY\Security::getUser()->id, $location, $birthyear, $gender, $children));}                                              
        
    public static function get_add_data(){
        return \SQL\UVOTE_DATA_USER_ADD_DATA::Q1(array(\SYSTEM\SECURITY\Security::getUser()->id)); 
    }    
    
    public static function write_feedback($feedback){
        $feedback = json_decode($feedback);
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            throw new ERROR("You need to be logged in.");}
            
        $con = new \SYSTEM\DB\Connection();                    
        $res = $con->prepare(   'insertFeedback',
                                'INSERT INTO uvote_beta_feedback
                                 VALUES (?, ?);',
                                array(\SYSTEM\SECURITY\Security::getUser()->id, $feedback));   
        new WARNING("feedback was added");
        return JsonResult::ok();
    }
}
