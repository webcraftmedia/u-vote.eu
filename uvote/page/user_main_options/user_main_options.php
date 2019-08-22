<?php
class user_main_options implements SYSTEM\PAGE\Page { 
    public static function title(){
        return null;}
    public static function meta(){
        return array();}
    
    public static function js(){
        return array();}
    
    public function get_add_data (){
        $qqresult = votes::get_add_data();
        $vars['keineangaben_location'] = $qqresult['location'] ? $qqresult['location'] : 'Keine Angaben';
        $vars['keineangaben_age'] = $qqresult['birthyear'] ? $qqresult['birthyear'] : 'Keine Angaben';
        $vars['keineangaben_gender'] = $qqresult['gender'] ? $qqresult['gender'] : 'Keine Angaben';
        $vars['keineangaben_children'] = $qqresult['children'] ? $qqresult['children'] : 'Keine Angaben';
        return $vars;
        
 
        
    }
    
    private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'user_main_options/css/myVote.css').'" rel="stylesheet">';}
    
    public function html(){
        $vars = array();
        $vars = $this->get_add_data();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_options/tpl/user_main_options.tpl'), $vars);
    }
  
}