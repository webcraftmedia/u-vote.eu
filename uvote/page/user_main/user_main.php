<?php

class user_main extends SYSTEM\PAGE\Page {      
    
    public static function css(){  
        return array(\SYSTEM\WEBPATH(new PPAGE(),'user_main/css/main_menu.css'));}
    public static function js(){  
        return array(\SYSTEM\WEBPATH(new PPAGE(),'user_main/js/user_main.js'));}
    public function exchange_loginformmain(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loggedinformtop.tpl'),array());}

    public function getloginformmain(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loginform.tpl'),array());} 
    
    public function html(){ 
        $vars = array();
        $vars['loginform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->exchange_loginformmain() : $this->getloginformmain() ;
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main/main_menu.tpl'),$vars);
    }
  
}