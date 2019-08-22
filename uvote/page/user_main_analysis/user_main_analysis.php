<?php
class user_main_analysis implements SYSTEM\PAGE\Page {
    public static function title(){
        return null;}
    public static function meta(){
        return array();}
    
    public static function css(){
            return array();}
    public static function js(){        
        return array(new \PPAGE('user_main_analysis/js/user_main_analysis.js'));}
    public function html(){
        $vars = array();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('help'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('math'));
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/user_main_analysis.tpl'))->SERVERPATH(),$vars);
    }
  
}