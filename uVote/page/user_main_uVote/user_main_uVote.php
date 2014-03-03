<?php
class user_main_uVote extends SYSTEM\PAGE\Page {    
   
   
    
    
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
        $vars['votes_all'] = $this->votes_all();
        $vars['votes_all_bt'] = $this->votes_all_bt();
        $vars['user_count'] = $this->user_count();
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/uVote.tpl'),$vars);
    }
  
}