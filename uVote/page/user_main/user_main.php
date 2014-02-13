<?php

class user_main extends SYSTEM\PAGE\Page {  
    public function get_main_uVote(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/uVote.tpl'), array());}
      
    private static function user_all_votes(){
        $result = '';
        $res = votes::get_all_votes($result);
        return $result;
    }
        
    public function html(){ 
        $vars = array();
//        $vars['votes_all'] = $this->user_all_votes();
        $vars['uVote'] = $this->get_main_uVote();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id='; 
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main/main_menu.tpl'),$vars);
    }
  
}