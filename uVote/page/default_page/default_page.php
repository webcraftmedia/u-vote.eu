<?php

class default_page extends SYSTEM\PAGE\Page {
    
    private function js(){        
        return  '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PJQUERY(),'jquery-1.9.1.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PBOOTSTRAP(),'js/bootstrap.min.js').'"></script>'.
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/timer.js').'"></script>'.
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/loadtexts.js').'"></script>';
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/account_create.js').'"></script>';
    }      
        
    public function generate_votelist(){
        $result = "";
        $votes = votes::getAllVotesOfGroup(1);        
        foreach($votes as $vote){
            $vars = array('vote_title' => $vote['title'], 'vote_text' => $vote['text'], 'poll_ID' => $vote['ID']);
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/vote.tpl'), $vars);
        }
        return $result;
    }
    
    public function getloggedinform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/loggedinform.tpl'),array());} 
    
    public function exchange_registerform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/register_form.tpl'),array());}
    
    public function create_account(){
        $result = "";
        $accdata = data::getuserpersonaldata(1);
            $vars = array('input')
        return SYSTEM\SECURITY\Security::create($dbinfo, $username, $password, $email, $locale);}
    

    



public function html(){
        //\SYSTEM\SECURITY\Security::available($dbinfo, $username)                                  //account available
        //\SYSTEM\SECURITY\Security::check($dbinfo, $rightid)                                       //recht prüfen
        //\SYSTEM\SECURITY\Security::create($dbinfo, $username, $password, $email, $locale)         //account erstellen
        //\SYSTEM\SECURITY\Security::getUser()                                                      //nutzerinfos
        //\SYSTEM\SECURITY\Security::isLoggedIn()                                                   //ist eingeloggt?
        //\SYSTEM\SECURITY\Security::login($dbinfo, $username, $password_sha, $password_md5)        //einloggen
        //\SYSTEM\SECURITY\Security::load($key)                                                     //wert aus session laden..
        //\SYSTEM\SECURITY\Security::save($key, $value)                                             //wert in session speichern(nutzerbezogen, cookie)
        //\SYSTEM\SECURITY\Security::logout()                                                       //ausloggen
        $vars = array();               
        $vars['js'] = $this->js(); 
        $vars['votelist'] = $this->generate_votelist();
        $vars['personaldata'] = $this->getuserpersonaldata();
        $vars['registerform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'default_page/pics/');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/page.html'), $vars);
        
    }
}