<?php
class user_main_myVote extends SYSTEM\PAGE\Page {   
    public function html(){                
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_myVote/myVote.tpl'),array());
    }
  
}