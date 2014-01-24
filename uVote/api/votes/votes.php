<?php

class votes {
    public static function getAllVotesOfGroup($groupid){
        return \DBD\UVOTE_GENERATE_VOTELIST::QA(array($groupid));}

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
        $result['count'] = $res['count'];
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
    
    public static function get_voteinfo($poll_ID){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVoteByID',
                                'SELECT * FROM `uvote_votes` WHERE `ID` = ?;',
                                array($poll_ID));        
        $res = $res->next();
        return $res;
    }
    
    public static function get_barsperparty($poll_ID){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $pbpp = array();
        $part = $con->prepare(  'selVoteByPoll_ID',
                                'SELECT * FROM `uvote_votes_per_party` WHERE `poll_ID` = ?;',
                                array($poll_ID));

        while ($result = $part->next()){            
            $pbpp[] = $result;}
        return $pbpp;
    }
    
    public static function write_vote($poll_ID, $vote){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            throw new ERROR("You need to be logged in.");}
            
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVote',
                                'SELECT * FROM `uvote_data` WHERE `poll_ID` = ? AND user_ID = ?;',
                                array($poll_ID, \SYSTEM\SECURITY\Security::getUser()->id));
         if ($res->next()){
             throw new ERROR('You already voted!');}
                     
        $res = $con->prepare(   'insertVote',
                                'INSERT INTO uvote_data
                                 VALUES (?, ?, ?);',
                                array($poll_ID, \SYSTEM\SECURITY\Security::getUser()->id, $vote));   
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
        new \SYSTEM\LOG\INFO($poll_ID);

        $vote = votes::getVoteOfGroup($poll_ID);
        new INFO(print_r($vote, true));
        $vars = array('vote_text' => $vote['text'], 'vote_title' => $vote['title'], 'vote_init' => $vote['initiative'], 'poll_ID' => $vote['ID'], 'time_end' => $vote['time_end']);
        $result = SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/full_vote.tpl'), $vars);
        return $result;
    }
}
