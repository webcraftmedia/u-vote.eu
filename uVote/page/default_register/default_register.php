<?php

class default_page extends SYSTEM\PAGE\Page {
    
    private function js(){        
        return '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/timer.js').'"></script>';
    }      

     public function html(){
        $vars = array();               
        $vars['js'] = $this->js(); 
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'uVote/page/default_page/pics/');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_register/register.html'), $vars);
    }
}