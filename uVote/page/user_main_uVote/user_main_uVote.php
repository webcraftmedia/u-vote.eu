<?php
class user_main_uVote extends SYSTEM\PAGE\Page {   
    public function html(){        
        $result = array();      
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/uVote.tpl'),$result);
    }
  
}