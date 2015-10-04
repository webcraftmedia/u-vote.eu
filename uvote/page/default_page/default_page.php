<?php
class default_page extends SYSTEM\PAGE\Page {        
    private function js(){   
        return  \SYSTEM\HTML\html::script(\LIB\lib_jquery::js()).
                \SYSTEM\HTML\html::script(\LIB\lib_bootstrap::js()).
                \SYSTEM\HTML\html::script(\LIB\lib_jqbootstrapvalidation::js()).
                \SYSTEM\HTML\html::script(\LIB\lib_system::js()).
                \SYSTEM\HTML\html::script(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/js/loadtexts.js')).
                \SYSTEM\HTML\html::script(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/js/account_create.js')).
                \SYSTEM\HTML\html::script('https://www.google.com/jsapi').
                '<script type="text/javascript">google.load("visualization", "1", {packages:["corechart"]});</script>';
    }
    
    private function css(){
        return  \SYSTEM\HTML\html::link(\LIB\lib_bootstrap::css()).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/default_page.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/full_vote.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/cover.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/vote.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/vote_bt.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/loggedinformtop.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/register_form.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/parties_on_vote.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/loggedinform.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/loginform.css'))
                ; 
    }

          

    public function getloggedinform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loggedinform.tpl'),array());} 
    
    public function exchange_registerform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/register_form.tpl'),array());}
    
    public function getloginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loginform.tpl'),array());} 
    
    public function exchange_loginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loggedinformtop.tpl'),array());}

    public function html($_escaped_fragment_ = NULL){
        $vars = array();
        if(!$_escaped_fragment_){
            $vars['js'] = $this->js();}
        $vars['css'] = $this->css();
        $vars['registerform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['loginform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->exchange_loginform() : $this->getloginform() ;
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));

        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/page.tpl'), $vars);        
    }
}