<?php
class user_main_uVote extends SYSTEM\PAGE\Page {
    private function votes_overall(){
        $partyvotes = votes::get_barsperparty($this->poll_ID);
        
        $pbpp = "";
        foreach($partyvotes as $vote){
            $vote['party_yes'] = round($vote['votes_pro']/$vote['total']*100,0);
            $vote['party_no'] = round($vote['votes_contra']/$vote['total']*100,0);
            $vote['party_ent'] = round(($vote['nr_attending'] - $vote['votes_pro'] - $vote['votes_contra'])/$vote['total']*100,0);
            $pbpp .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/table_parties.tpl'), $vote);
        }
        
        return $pbpp;
    }
    
    public function html(){ 
        $poll_data = array();
        $poll_data[] = DBD\UVOTE_DATA_CHOICE_OVERALL::Q1(array(1));
        $poll_data[] = DBD\UVOTE_DATA_CHOICE_OVERALL::Q1(array(2));
        $poll_data[] = DBD\UVOTE_DATA_CHOICE_OVERALL::Q1(array(3));
        $vars['votes_overall'] = $this->votes_overall();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id='; 
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_uVote/uVote.tpl'),$vars);
    }
  
}