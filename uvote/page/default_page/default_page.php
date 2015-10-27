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
                \SYSTEM\HTML\html::link(\LIB\lib_font_awesome::css())
                ; 
    }

          

    public function getloggedinform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/login/loggedinform.tpl'),array());} 
    
    public function exchange_registerform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/login/register_form.tpl'),array());}
    
    public function getloginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/login/loginform.tpl'),array());} 
    
    public function exchange_loginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/login/loggedinformtop.tpl'),array());}
    
    public function get_menu(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/menu/menu.tpl'),array());}
    public function exchange_menu(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/menu/menu_loggedout.tpl'),array());}

    public function html($_escaped_fragment_ = NULL){
        $vars = array();
        if(!$_escaped_fragment_){
            $vars['js'] = $this->js();}
        $vars['css'] = $this->css();
        $vars['menu'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->get_menu() : $this->exchange_menu();
        $vars['registerform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['loginform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->exchange_loginform() : $this->getloginform() ;
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));

        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/page.tpl'), $vars);        
    }
}