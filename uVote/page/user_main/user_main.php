<?php

class user_main extends SYSTEM\PAGE\Page {      
    public function html(){ 
        $vars = array();

        $uv = new user_main_uVote();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id='; 
        $vars['uVote'] = $uv->html();
        
        
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main/main_menu.tpl'),$vars);
    }
  
}