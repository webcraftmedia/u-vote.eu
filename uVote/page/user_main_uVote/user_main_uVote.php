<?php
class user_main_uVote extends SYSTEM\PAGE\Page {    
   
   private function uvote_to_parties (){
       $votes = votes::get_uvote_to_bt_overall();
       $result = '';
       
       foreach($votes as $vote){
           $vote['match_percentage'] = round($vote['class_MATCH']/($vote['class_MATCH']+$vote['class_MISSMATCH'])*100,2);
           $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/uvoteparties.tpl'), $vote);
       }
       print_r($votes, TRUE);
       return $result;
   }
    
    
    private function votes_all(){
        $votes = votes::get_all_votes();
        $result = '';
        foreach($votes as $vote){
            switch($vote['choice']){
                case 1:
                    $vote['choice'] = 'PRO';
                    $vote['badge_color'] = 'badge-success';
                    break;
                case 2:
                    $vote['choice'] = 'CON';
                    $vote['badge_color'] = 'badge-important';
                    break;
                case 3:
                    $vote['choice'] = 'ENT';
                    $vote['badge_color'] = 'badge-info';
                    break;
            }
            //$vote['count'];
            //$vote['choice'];
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/votecountchoice.tpl'),$vote);
        }
        return $result;        
    } 
    private function votes_all_bt(){
        $votes = votes::get_all_votes_bt();
        $result = '';
        foreach($votes as $vote){
            switch($vote['bt_choice']){
                case 1:
                    $vote['bt_choice'] = 'PRO';
                    $vote['badge_color'] = 'badge-success';
                    break;
                case 2:
                    $vote['bt_choice'] = 'CON';
                    $vote['badge_color'] = 'badge-important';
                    break;
                case 3:
                    $vote['bt_choice'] = 'ENT';
                    $vote['badge_color'] = 'badge-info';
                    break;
                case 0:
                    $vote['bt_choice'] = 'OFFEN';
            }
            //$vote['count'];
            //$vote['choice'];
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/votecountchoicebt.tpl'),$vote);
        }
        return $result;        
    } 
    
    private function user_count(){
        $vars = votes::get_user_count();       
        return $vars['count'];
    }

    

    public function html(){                 
        $vars = array();
        $vars['uvote_to_bt'] = $this->uvote_to_parties();
        $vars['votes_all'] = $this->votes_all();
        $vars['votes_all_bt'] = $this->votes_all_bt();
        $vars['user_count'] = $this->user_count();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(100));
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/uVote.tpl'),$vars);
    }
  
}