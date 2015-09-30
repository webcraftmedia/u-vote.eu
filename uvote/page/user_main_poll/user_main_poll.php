<?php
class user_main_poll extends SYSTEM\PAGE\Page { 
    private $poll_ID = null;
    public function __construct($poll_ID){
        $this->poll_ID = $poll_ID;
    }
    public function html(){
        $vote = votes::get_voteinfo($this->poll_ID); //votes::getVoteOfGroup($poll_ID);
        $result = SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/full_vote.tpl'), $vote);
        return $result;
    }
  
}