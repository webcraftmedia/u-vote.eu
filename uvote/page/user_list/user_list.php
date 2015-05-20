<?php

class user_list extends SYSTEM\PAGE\Page {      
    
     private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'user_list/css/list_menu.css').'" rel="stylesheet">';}
    
    public function html(){ 
        $vars = array();

        $uv = new user_list_active();
        $vars['css'] = $this->css();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id='; 
        $vars['active'] = $uv->html();
        
        
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_list/list_menu.tpl'),$vars);
    }
  
}