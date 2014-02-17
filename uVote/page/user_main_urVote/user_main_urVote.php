<?php
class user_main_urVote extends SYSTEM\PAGE\Page { 
    
    private function user_per_party_overall(){
        //$vars = votes::get_user_per_party_overall(array(\SYSTEM\SECURITY\Security::getUser()->id));        
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'test',
                                'SELECT party, sum(case when uvote_data.choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
                                               sum(case when uvote_data.choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data INNER JOIN uvote_votes_per_party 
                                    ON uvote_data.poll_ID = uvote_votes_per_party.poll_ID 
                                WHERE user_ID = ? GROUP BY party;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id));
        while($row = $res->next()){          
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/urvoteparties.tpl'), $row);;
        }
        return $result;        
    }
    
    public function html(){
        $vars = array();       
        $vars['choices_user_ID'] = $this->user_per_party_overall();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/urVote.tpl'),$vars);
    }
  
}