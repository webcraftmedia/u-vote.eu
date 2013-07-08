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
    private static function getProgessbar($percentage){
        $vars = array('percentage' => $percentage);
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/closedvoteinfo.tpl'), $vars);
    }
    public static function get_openinfo($poll_ID){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVoteByID',
                                'SELECT * FROM `uvote_votes` WHERE `ID` = ?;',
                                array($poll_ID));        
        $res = $res->next();
        $result = array();
        
        $pb = "";
        $part = $con->prepare(  'selVoteByPoll_ID',
                                'SELECT * FROM `uvote_votes_per_party` WHERE `poll_ID` = ?;',
                                array($poll_ID));
        
        while ($result = $part->next()){            
             $pb .= self::getProgessbar($result['votes_pro']);

        }
        
        $result['graph_right'] = $pb;
        $result = array_merge($result,$res);
        
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/openvoteinfo.tpl'),$result);
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
