<?php
class user_main_votelist implements SYSTEM\PAGE\Page { 
    public static function title(){
        return null;}
    public static function meta(){
        return array();}
    
    public static function css(){
            return array();}

    private function user_count(){
        $vars = votes::get_user_count();       
        return $vars['count'];
    }

    public static function get_list_tags(){
        $result = '';
        $vars = \SQL\UVOTE_DATA_USER_TAGS::QA(array());
        foreach($vars as $tag){
            $result .= SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_votelist/tpl/filter.tpl'))->SERVERPATH(), $tag);
        }
        return $result;
    }
    public static function js(){        
        return array(new \PPAGE('user_main_votelist/js/user_main_votelist.js'));}
    public function html(){
        $vars = array();
        $vars['votelist'] = lists::generate_votelist('');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars['user_count'] = $this->user_count();
        $vars['user_temp_votes'] = votes::get_user_temp_votes();
        $vars['filterlist'] = $this->get_list_tags();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_votelist/tpl/user_main_votelist.tpl'))->SERVERPATH(), $vars);
    }
  
}