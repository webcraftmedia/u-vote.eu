<?php
class user_main_impressum implements \SYSTEM\PAGE\Page{
    public static function title(){
        return null;}
    public static function meta(){
        return array();}
    
    public static function js(){
        return array();}
    public static function css(){
            return array();}

    public function html(){
        $vars = array();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_impressum/tpl/user_main_impressum.tpl'))->SERVERPATH(), $vars);
    }
}