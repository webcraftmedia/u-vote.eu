<?php
class default_register implements SYSTEM\PAGE\Page {
    public static function title(){
        return null;}
    public static function meta(){
        return array();}
    
    public static function css(){  
        return array(new PPAGE('default_register/css/default_register.css'));}
    public static function js(){        
        return array(new PPAGE('default_register/js/default_register.js'));}
     public function html(){
        $vars = array();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_register/tpl/register.tpl'))->SERVERPATH(), $vars);
        
    }
}