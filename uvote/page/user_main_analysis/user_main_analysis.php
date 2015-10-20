<?php
class user_main_analysis extends SYSTEM\PAGE\Page {   
    public static function js(){        
        return array(\SYSTEM\WEBPATH(new \PPAGE(),'user_main_analysis/js/user_main_analysis.js'));}
    public function html(){
        $vars = array();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('help'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('math'));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/user_main_analysis.tpl'),$vars);
    }
  
}