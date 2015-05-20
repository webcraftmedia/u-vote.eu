<?php

class default_register extends SYSTEM\PAGE\Page {
      
    private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_register/css/register.css').'" rel="stylesheet">';}

     public function html(){
        $vars = array();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars['css'] = $this->css();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_register/register.tpl'), $vars);
        
    }
}