<?php
class default_page implements SYSTEM\PAGE\DefaultPage {        
    public static function js(){   
        return  \SYSTEM\HTML\html::script(\LIB\lib_jquery::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_bootstrap::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_jqbootstrapvalidation::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_system::js()->WEBPATH()).
                \SYSTEM\HTML\html::script((new \PPAGE('default_page/js/loadtexts.js'))->WEBPATH()).
                \SYSTEM\HTML\html::script('https://www.google.com/jsapi').
                '<script type="text/javascript">google.load("visualization", "1", {packages:["corechart"]});</script>';
    }
    
    public static function css(){
        return  \SYSTEM\HTML\html::link(\LIB\lib_bootstrap::css()->WEBPATH(false)).
                \SYSTEM\HTML\html::link((new \PPAGE('default_page/css/default_page.css'))->WEBPATH()).
                \SYSTEM\HTML\html::link(\LIB\lib_font_awesome::css()->WEBPATH(false)); 
    }

    public function getloggedinform(){
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/login/loggedinform.tpl'))->SERVERPATH(),array());} 
    
    public function exchange_registerform(){
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/login/register_form.tpl'))->SERVERPATH(),array());}
    
    public function getloginform(){
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/login/loginform.tpl'))->SERVERPATH(),array());} 
    
    public function exchange_loginform(){
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/login/loggedinformtop.tpl'))->SERVERPATH(),array());}
    
    public function get_menu(){
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/menu/menu.tpl'))->SERVERPATH(),array());}
    public function exchange_menu(){
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/menu/menu_loggedout.tpl'))->SERVERPATH(),array());}

    public function html($_escaped_fragment_ = NULL){
        $vars = array();
        if(!$_escaped_fragment_){
            $vars['js'] = $this->js();}
        $vars['css'] = $this->css();
        $vars['menu'] = \SYSTEM\SECURITY\security::isLoggedIn() ? $this->get_menu() : $this->exchange_menu();
        $vars['registerform'] = \SYSTEM\SECURITY\security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['loginform'] = \SYSTEM\SECURITY\security::isLoggedIn() ? $this->exchange_loginform() : $this->getloginform() ;
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));

        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/page.tpl'))->SERVERPATH(), $vars);        
    }
}