<?php
class default_comment extends SYSTEM\PAGE\Page {
    private $poll_ID = NULL;
    
    public function __construct($poll_ID) {
        $this->poll_ID=$poll_ID;}
    
    public function vote_choice(){
        $vars = votes::getUserPollData($this->poll_ID);
        return $this->tablerow_class($vars);
    }
    
    private static function tablerow_class($choice){
        switch($choice){
            case 1:
                return 'pro';
            case 2:
                return 'con';
            case 3:
                return 'ent';
            default:
                return 'open';
        }        
    }
    
   
    
    private function get_pro_comments (){
        $result = '';
        $vars = votes::getUserComments($this->poll_ID, 1);
        foreach($vars as $com){
            $com['c_txt'] = utf8_encode($com['c_txt']);
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/comment.tpl'), $com);
        }
        return $result;
    
    }
    private function get_con_comments (){
        $result = '';
        $vars = votes::getUserComments($this->poll_ID, 2);
        
        foreach($vars as $com){
            $com['c_txt'] = utf8_encode($com['c_txt']);
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/comment.tpl'), $com);
        }
        return $result;
    
    }
    
    
    
    
    
        
    private function js(){        
        return  '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_bulletin/js/vote.js').'"></script>';}
    private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page\css\default_page.css').'" rel="stylesheet">';} 

    public function html(){
        $poll_expired = \DBD\UVOTE_POLL_EXPIRED::Q1(array($this->poll_ID));
        $user_vote = votes::getUserPollData($this->poll_ID);
        
        $vars = array();
        $vars['comments_pro'] = '';
        $vars['comments_con'] = '';
        $vars['js'] = $this->js();
        $vars['css'] = $this->css();
                
        $vars['vote_buttons'] =   $this->vote_buttons($poll_expired,$user_vote);
//        $vars['p_fields'] = $this->p_fields();
        if($user_vote){
            $vars['comments_pro'] = $this->get_pro_comments();
            $vars['comments_con'] = $this->get_con_comments();
        }
        
        $vars['poll_ID'] =  $this->poll_ID; //put it here - so its filled in!
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(100));
        
        $vars = array_merge($vars,votes::get_voteinfo($this->poll_ID));       
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_comment/comment.tpl'),$vars);
    }
  
}