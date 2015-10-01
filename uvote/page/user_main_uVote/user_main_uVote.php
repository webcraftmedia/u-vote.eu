<?php
class user_main_uVote extends SYSTEM\PAGE\Page {    
   
   private function uvote_to_parties (){
       $votes = votes::get_uvote_to_bt_overall();
       $result = '';
       
       foreach($votes as $vote){
           $vote['match_percentage'] = round($vote['class_MATCH']/($vote['class_MATCH']+$vote['class_MISSMATCH'])*100,2);
           $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/tpl/uvoteparties.tpl'), $vote);
       }
       print_r($votes, TRUE);
       return $result;
   }
    
    
    
    
    private function user_count(){
        $vars = votes::get_user_count();       
        return $vars['count'];
    }
    private function get_list_active(){
        $classObj = new user_list();
        $var = $classObj->html();
        return $var;
    }
    

    public function html(){                 
        $vars = array();
        $vars['list_active'] = $this->get_list_active();

        $vars['uvote_to_bt'] = $this->uvote_to_parties();
        
        $vars['user_count'] = $this->user_count();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/tpl/uVote.tpl'),$vars);
    }
  
}