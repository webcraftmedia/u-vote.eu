<?php

class default_page extends SYSTEM\PAGE\Page {
      

     public function html(){
        $vars = array();               
        $vars['js'] = $this->js();
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'uVote/page/default_page/pics/');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_register/register.html'), $vars);
    }
}