<?php
class user_main extends SYSTEM\PAGE\Page {   
    public function html(){        
        $result = array();      
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main/main_menu.tpl'),$result);
    }
  
}