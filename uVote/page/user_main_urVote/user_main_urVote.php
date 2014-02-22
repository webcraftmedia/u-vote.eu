<?php
class user_main_urVote extends SYSTEM\PAGE\Page { 
    
    private function count_all_polls (){
        $result = '';
        $vars = votes::countAllPolls(); 
        new INFO(print_r($vars, true));       
        return $result;        
    }

        private function user_to_bt(){
        //$vars = votes::get_user_per_party_overall($user_ID);
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'bt_to_user',
                                'SELECT sum(case when uvote_data.choice = uvote_votes.bt_choice then 1 else 0 end) class_MATCH,
                                sum(case when uvote_data.choice != uvote_votes.bt_choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data LEFT JOIN uvote_votes 
                                ON uvote_data.poll_ID = uvote_votes.ID 
                                WHERE user_ID = ?;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id));
        while($row = $res->next()){
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH']+1)*100,2);
            
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/bt_to_user_overall.tpl'), $row);;
        }
        return $result;   
        $row['votes_cast'] = round(($row['class_MATCH']+$row['class_MISSMATCH']),2);
    }
    


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
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/urvoteparties.tpl'), $row);;
        }
        return $result;        
    }
    
    public function html(){
        $vars = array();
//        $vars['poll_compare'] = $this->count_all_polls();
        $vars['choices_user_ID'] = $this->user_per_party_overall();
        $vars['choices_bt_to_user'] = $this->user_to_bt();      
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/urVote.tpl'),$vars);
    }
  
}