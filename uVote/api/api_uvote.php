<?php

class api_uvote extends \SYSTEM\API\api_login {
    public static function call_vote_action_vote($poll_ID, $vote) {
        return votes::write_vote($poll_ID, $vote);
        
    }
     public static function call_vote_action_data($location, $birthyear, $gender, $children) {
        return votes::write_data($location, $birthyear, $gender, $children);
        
    }
    
    public static function call_vote_action_comment($poll_ID, $c_choice, $c_txt, $c_src) {
        return votes::write_comment($poll_ID, $c_choice, $c_txt, $c_src);
        
    }
    
    public static function call_vote_action_commentrate($c_ID, $val) {
        return votes::write_commentrate($c_ID, $val);
        
    }
    
    public static function call_vote_action_new_vote($ID, $title, $iframe_link) {
        return votes::write_poll($ID, $title, $iframe_link);
        
    }
    
    public static function call_vote_action_feedback($feedback) {
        return votes::write_feedback($feedback);
        
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
    
    public static function call_vote_action_accord($party){
        return votes::vote_accord_with_party($party);
    }
    
    public static function call_graph_bt_to_uvote_overall_by_time($timespan = 84600){
        return votes::get_graph_bt_to_uvote_overall_by_time($timespan);}
}
