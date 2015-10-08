<?php
class user_main_start extends SYSTEM\PAGE\Page { 
    private function user_count(){
        $vars = votes::get_user_count();       
        return $vars['count'];
    }
    
    
    public function html(){
        $vars = array();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars['user_count'] = $this->user_count();
        $vars['user_temp_votes'] = votes::get_user_temp_votes();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_start/tpl/user_main_start.tpl'), $vars);
    }
  
}