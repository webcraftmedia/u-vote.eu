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
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
         $res = $con->prepare(   'selVote',
                                'SELECT * FROM `uvote_data` WHERE `poll_ID` = ?;',
                                array($poll_ID));
//         print_r($res->next());
//         die();
         if ($res->next()){
             throw new ERROR('You already voted!');         }
             $poll_ID = $_GET["poll_ID"];
             $vote = $_GET["vote"];
        $res = $con->prepare(   'insertVote',
                                'INSERT INTO uvote_data
                                 VALUES (?, ?, ?);',
                                array($poll_ID, NULL, $vote));   
        return JsonResult::ok();
    }
}
