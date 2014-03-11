<?php
class user_main_urVote extends SYSTEM\PAGE\Page { 
    
    
    
    private function user_overall_votes (){
        $vars = votes::get_user_overall_votes(\SYSTEM\SECURITY\Security::getUser()->id, \SYSTEM\SECURITY\Security::getUser()->creationDate);
        $v = $vars['voted'] > 1 ? $vars['voted'] : 1;
        $nv = $vars['not_voted'];
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/overall_all_polls.tpl'),
                array(  'vote_perc'=> round($v/($nv+$v)*100, 2),
                        'no_vote_perc'=> round($nv/($nv+$v)*100, 2),
                        'voted'=> $v,
                        'not_voted'=> $nv));
    }
    
    private function user_temp_votes (){
        $vars = votes::get_user_temp_votes(\SYSTEM\SECURITY\Security::getUser()->id);
        $v = $vars['voted'];
        $nv = $vars['not_voted'];
        print_r($vars, true);
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/all_polls.tpl'),
                array(  'vote_perc'=> round($v/($nv+$v)*100, 2),
                        'no_vote_perc'=> round($nv/($nv+$v)*100, 2),
                        'voted'=> $v,
                        'not_voted'=> $nv));
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

        $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/bt_to_user_overall.tpl'), $row);
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
        $vars['user_temp_votes'] = $this->user_temp_votes();
        $vars['user_overall_votes'] = $this->user_overall_votes();
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/urVote.tpl'),$vars);
    }
  
}