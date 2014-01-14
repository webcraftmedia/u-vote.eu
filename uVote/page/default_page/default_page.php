<?php

class default_page extends SYSTEM\PAGE\Page {
    
    private function js(){        
        return  '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PJQUERY(),'jquery-1.9.1.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PBOOTSTRAP(),'js/bootstrap.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PVALIDATION(),'jqBootstrapValidation.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PCRYPTOSHA(),'jquery.sha1.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'jquery.countdown\jquery.countdown.js').'"></script>'.
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/timer.js').'"></script>'.
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/loadtexts.js').'"></script>';
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/account_create.js').'"></script>';
    }
    
    private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page\css\default_page.css').'" rel="stylesheet">';}
        
    public function generate_votelist(){
        
        $result = "";
        $votes = votes::getAllVotesOfGroup(1);        
        foreach($votes as $vote){
            $vars = array('vote_title' => $vote['title'], 'vote_text' => $vote['text'], 'vote_init' => $vote['initiative'], 'poll_ID' => $vote['ID'], 'time_end' => $vote['time_end']);
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/vote.tpl'), $vars);
        }
        new \SYSTEM\LOG\INFO("generated votelist successfully");
        return $result;
    }
    
    public function generate_vote(){
        $result = "";
        $votes = votes::getAllVotesOfGroup(1);  
        
        foreach($votes as $vote){
            $vars = array('vote_title' => $vote['title'], 'vote_text' => $vote['text'], 'vote_init' => $vote['initiative'], 'poll_ID' => $vote['ID'], 'time_end' => $vote['time_end']);
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/full_vote.tpl'), $vars);
        }
        return $result;
    }


    public function getloggedinform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/loggedinform.tpl'),array());} 
    
    public function exchange_registerform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/register_form.tpl'),array());}
    
    public function getloginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/loginform.tpl'),array());} 
    
    public function exchange_loginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/loggedinformtop.tpl'),array());}

    public function html(){
        $vars = array();               
        $vars['js'] = $this->js(); 
        $vars['css'] = $this->css();
        $vars['votelist'] = $this->generate_votelist();
        $vars['vote'] = $this->generate_vote();
        $vars['registerform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['loginform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->exchange_loginform() : $this->getloginform() ;
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'default_page/pics/');
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/page.html'), $vars);
        
    }
}