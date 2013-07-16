<?php
class default_openinfo extends SYSTEM\PAGE\Page {   
    
    private $poll_ID;
    
    public function __construct($poll_ID) {
        $this->poll_ID = $poll_ID;
    }
    
    private function bars_user(){
        $bars = votes::get_barsperusers($this->poll_ID,false);
        $bars['vote_yes_perc'] = round($bars['yes_perc']*100,0);
        $bars['vote_no_perc'] = round($bars['no_perc']*100,0);
        $bars['vote_ent_perc'] = round($bars['ent_perc']*100,0);
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_openinfo/bars_user.tpl'),$bars);
    }
    
    private function bars_party(){
        $partyvotes = votes::get_barsperparty($this->poll_ID);
        
        $pbpp = "";
        foreach($partyvotes as $vote){
            $vote['party_yes'] = round($vote['votes_pro']/$vote['total']*100,0);
            $vote['party_no'] = round($vote['votes_contra']/$vote['total']*100,0);
            $vote['party_ent'] = round(($vote['nr_attending'] - $vote['votes_pro'] - $vote['votes_contra'])/$vote['total']*100,0);
            $vote['party_ent'] = round(($vote['total'] - $vote['nr_attending'])/$vote['total']*100,0);
            $pbpp .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_openinfo/closedvoteinfo.tpl'), $vote);
        }
        
        return $pbpp;
    }
    
    public function html(){
        
        $result = array();
        $result['bars_party'] = $this->bars_party();
        $result['bars_user'] = $this->bars_user();
        $result = array_merge($result,votes::get_voteinfo($this->poll_ID));       
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_openinfo/openvoteinfo.tpl'),$result);
    }
  
}