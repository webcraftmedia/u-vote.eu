<?php

class api_uvote extends \SYSTEM\API\api_login {
    public static function call_vote_action_vote($poll_ID, $vote) {
        return votes::write_vote($poll_ID, $vote);
        
    }  
    public static function call_vote_action_open_vote($poll_ID) {
        return votes::open_vote($poll_ID);
        
    }
    public static function call_vote_action_barsperusers($poll_ID){
        return votes::get_barsperusers($poll_ID);} 


    public static function call_img($cat, $id){       
        return \SYSTEM\IMG\img::get($cat, $id);
        
    }
   
    public static function call_vote_action_submit($poll_ID) {
        return votes::vote_submit($poll_ID);
        
    }
}
