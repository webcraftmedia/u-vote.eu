<?php

class default_page extends SYSTEM\PAGE\Page {
    
    private function js(){        
        return  '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PJQUERY(),'jquery-1.9.1.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PBOOTSTRAP(),'js/bootstrap.min.js').'"></script>'.
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/timer.js').'"></script>'.
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/loadtexts.js').'"></script>';
    }      
        
    public function generate_votelist(){
        $result = "";
        $votes = votes::getAllVotesOfGroup(1);        
        foreach($votes as $vote){
            $vars = array('vote_title' => $vote['title'], 'vote_text' => $vote['text'], 'poll_ID' => rand(1, 100));
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/vote.tpl'), $vars);
        }
        return $result;
    }
    
    public function html(){
        $vars = array();               
        $vars['js'] = $this->js(); 
        $vars['votelist'] = $this->generate_votelist();
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'default_page/pics/');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/page.html'), $vars);
        
    }
}