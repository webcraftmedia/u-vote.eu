<?php
class default_bulletin extends SYSTEM\PAGE\Page {
    private $poll_ID = NULL;
    public function __construct($poll_ID) {
        $this->poll_ID=$poll_ID;
    }

    

    public function html(){
        
        $result = array();
        $result = array_merge($result,votes::get_voteinfo($this->poll_ID));       
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/bulletin.tpl'),$result);
    }
  
}