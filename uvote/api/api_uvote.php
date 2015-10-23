<?php

class api_uvote extends \SYSTEM\API\api_system {
    //votes
    public static function call_vote_action_vote($poll_ID, $vote) {
        return votes::write_vote($poll_ID, $vote);}
    public static function call_vote_action_vote_sub($poll_ID, $vote) {
        return votes::write_vote_sub($poll_ID, $vote);}    
    public static function call_vote_action_data($location, $birthyear, $gender, $children) {
        return votes::write_data($location, $birthyear, $gender, $children);}        
    
    public static function call_vote_action_new_vote($ID, $title, $iframe_link) {
        return votes::write_poll($ID, $title, $iframe_link);}
    
    public static function call_vote_action_feedback($feedback) {
        return votes::write_feedback($feedback);}
        
    public static function call_vote_action_barsperusers($poll_ID){
        return votes::get_barsperusers($poll_ID);}
   
    public static function call_vote_action_submit($poll_ID) {
        return votes::vote_submit($poll_ID);}
    public static function call_vote_action_accord($party){
        return votes::vote_accord_with_party($party);}
    
    //graphs
    public static function call_graph_bt_to_uvote_overall_by_time($timespan = 592200){
        return graphs::graph_bt_to_uvote_overall_by_time($timespan);}
        
    public static function call_graph_bt_to_user_overall_by_time($timespan = 592200){
        return graphs::graph_bt_to_user_overall_by_time($timespan);}
    public static function call_graph_party_to_user_overall_by_time_party_cdu($party = 'cdu', $timespan = 592200){
        return graphs::graph_party_to_user_overall_by_time($party, $timespan);}
    public static function call_graph_party_to_user_overall_by_time_party_csu($party = 'csu', $timespan = 592200){
        return graphs::graph_party_to_user_overall_by_time($party, $timespan);}
    public static function call_graph_party_to_user_overall_by_time_party_spd($party = 'spd', $timespan = 592200){
        return graphs::graph_party_to_user_overall_by_time($party, $timespan);}
    public static function call_graph_party_to_user_overall_by_time_party_gruene($party = 'gruene', $timespan = 592200){
        return graphs::graph_party_to_user_overall_by_time($party, $timespan);}
    public static function call_graph_party_to_user_overall_by_time_party_linke($party = 'linke', $timespan = 592200){
        return graphs::graph_party_to_user_overall_by_time($party, $timespan);}
    
    public static function call_donut_party_to_user_overall(){
        return graphs::donut_party_to_user_overall();}
        public static function call_donut_party_to_community_overall(){
        return graphs::donut_party_to_community_overall();}
    //comments
    public static function call_vote_action_comment($poll_ID, $c_choice, $c_txt, $c_src) {
        return comments::write_comment($poll_ID, $c_choice, $c_txt, $c_src);}
    
    public static function call_vote_action_commentrate($c_ID, $val) {
        return comments::write_commentrate($c_ID, $val);}
        
    public static function call_load_tab($set, $cat){
        if($set == 'basic'){
            return stats_basic::basic_basic($cat);
        }
        if($set == 'bilance'){
            return stats_bilance::basic_bilance($cat);
        }
        if($set == 'bilance_choice'){
            return stats_bilance_choice::basic_bilance_choice($cat);
        }
    }
    public static function call_load_list($filter, $time){
        return lists::generate_votelist($filter);
    }
    public static function call_load_list_text_search($text){
        return lists::text_search($text);
    }
}

    