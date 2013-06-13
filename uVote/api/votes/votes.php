<?php

class votes {
    public static function getAllVotesOfGroup($groupid){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
        $res = $con->prepare(   'selVoteByGrp',
                                'SELECT * FROM `uvote_votes` WHERE `group` = ?;',
                                array($groupid));        
        $result = array();
                    
        //$r = array();
        while($r = $res->next()){                        
            //print_r($r);                        
            //$result[] = array('title' => $r['title'],'text' => $r['text']);
            $result[] = $r;
            //print_r($result);
            //echo "</br></br>";
        }           
        //print_r($result);
        return $result;
    }
}
