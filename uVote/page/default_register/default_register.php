<?php

class default_register extends SYSTEM\PAGE\Page {
      

     public function html(){
        $vars = array();               
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_register/register.tpl'), $vars);
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'default_register/pics/');
    }
}