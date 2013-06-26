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
