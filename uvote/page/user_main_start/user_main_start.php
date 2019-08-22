<?php
class user_main_start implements SYSTEM\PAGE\Page { 
    public static function title(){
        return null;}
    public static function meta(){
        return array();}
    
    public static function js(){
        return array();}
    public static function css(){
            return array();}

    private function user_count(){
        $vars = votes::get_user_count();       
        return $vars['count'];
    }
     public static function newsfeed(){
     $result = '';
     $vars = \SQL\UVOTE_DATA_NEWSFEED::QA(array());
        foreach($vars as $news){
            $result .= $news['text'];
        }
     return $result;
    }
    public function html(){
        $vars = array();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars['user_count'] = $this->user_count();
        $vars['user_temp_votes'] = votes::get_user_temp_votes();
        $vars['news'] = $this->newsfeed();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_start/tpl/user_main_start.tpl'))->SERVERPATH(), $vars);
    }
  
}