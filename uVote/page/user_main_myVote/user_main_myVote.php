<?php
class user_main_myVote extends SYSTEM\PAGE\Page {   
    public function html(){        
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id='; 
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_myVote/myVote.tpl'),$vars);
    }
  
}