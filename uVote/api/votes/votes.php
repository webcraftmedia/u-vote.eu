<?php

class votes {
    public static function getAllVotesOfGroup($groupid){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVoteByGrp',
                                'SELECT * FROM `uvote_votes` WHERE `group` = ?;',
                                array($groupid));        
        $result = array();                            
        while($r = $res->next()){                                    
            $result[] = $r;}                   
            
        return $result;
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
}
