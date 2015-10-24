<?php
class user_main_votelist extends SYSTEM\PAGE\Page { 
    private function user_count(){
        $vars = votes::get_user_count();       
        return $vars['count'];
    }
   public static function get_list_tags(){
       $result = '';
       $vars = \SQL\UVOTE_DATA_USER_TAGS::QA(array());
       foreach($vars as $tag){
           $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/filter.tpl'), $tag);
       }
       return $result;
   }
   public static function js(){        
        return array(\SYSTEM\WEBPATH(new \PPAGE(),'user_main_votelist/js/user_main_votelist.js'));}
    public function html(){
        $vars = array();
        $vars['votelist'] = lists::generate_votelist('');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars['user_count'] = $this->user_count();
        $vars['user_temp_votes'] = votes::get_user_temp_votes();
        $vars['filterlist'] = $this->get_list_tags();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/user_main_votelist.tpl'), $vars);
    }
  
}