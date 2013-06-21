<?php
class default_myvote extends SYSTEM\PAGE\Page {
    
    private function js(){        
        return  '';
    }      
        
    public function generate_votelist(){
        $result = "";
        $votes = votes::getAllVotesOfGroup(1);        
        foreach($votes as $vote){
            $vars = array('vote_title' => $vote['title'], 'vote_text' => $vote['text']);
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/vote.tpl'), $vars);
        }
        return $result;
    }
    
    public function html(){
        $vars = array();               
        $vars['js'] = $this->js(); 
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'default_myvote/pics/');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_myvote/myvote.html'), $vars);
        
    }
}