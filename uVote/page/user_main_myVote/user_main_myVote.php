<?php
class user_main_myVote extends SYSTEM\PAGE\Page { 
    
    public function get_add_data (){
        $qqresult = votes::get_add_data();
        $vars['keineangaben_location'] = $qqresult['location'] ? $qqresult['location'] : 'Keine Angaben';
        $vars['keineangaben_age'] = $qqresult['birthyear'] ? $qqresult['birthyear'] : 'Keine Angaben';
        $vars['keineangaben_gender'] = $qqresult['gender'] ? $qqresult['gender'] : 'Keine Angaben';
        $vars['keineangaben_children'] = $qqresult['children'] ? $qqresult['children'] : 'Keine Angaben';
        return $vars;
        
 
        
    }
    
    public function html(){
        $vars = array();
        $vars = $this->get_add_data();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(110));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_myVote/myVote.tpl'), $vars);
    }
  
}