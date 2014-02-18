<?php

class default_page extends SYSTEM\PAGE\Page {
    
    private function js(){        
        return  '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PJQUERY(),'jquery-1.9.1.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PBOOTSTRAP(),'js/bootstrap.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PVALIDATION(),'jqBootstrapValidation.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PCRYPTOSHA(),'jquery.md5.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PCRYPTOSHA(),'jquery.sha1.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'jquery.countdown\jquery.countdown.js').'"></script>'.                
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/loadtexts.js').'"></script>';
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/account_create.js').'"></script>';
    }
    
    private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page\css\default_page.css').'" rel="stylesheet">';}
        
        
    private static function tablerow_class($choice){
        switch($choice){
            case 1:
                return 'pro';
            case 2:
                return 'contra';
            case 3:
                return 'ent';
            default:
                return '';
        }        
    }
    public function generate_votelist(){
        
        $result = array('','');
        $votes = votes::getAllVotesOfGroup(1);               
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);
            $vote['vote_class'] = $this->tablerow_class(votes::getUserPollData($vote['ID']));
            $vote['full_vote_btn'] = $time_remain > 0 ? 'Abstimmen' : 'Ansehen';
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];
            if($time_remain > 0){
                $result[0] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/vote.tpl'), $vote);
            } else {
                $result[1] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/vote.tpl'), $vote);
            }
        }
        return $result[0].$result[1];
    }
    
    public function get_coverpage(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/cover.tpl'), array());}

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
        $vars['votelist'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->generate_votelist() : $this->get_coverpage() ;
        $vars['registerform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['loginform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->exchange_loginform() : $this->getloginform() ;
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));

        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/page.tpl'), $vars);        
    }
}