<?php
class user_main_uVote extends SYSTEM\PAGE\Page {    
    private function votes_all(){
        return print_r(votes::get_all_votes(),true);} 
    
    public function html(){                 
        $vars = array();
        $vars['votes_all'] = $this->votes_all();        
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/uVote.tpl'),$vars);
    }
  
}