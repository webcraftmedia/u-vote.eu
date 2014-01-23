<?php

class default_cover extends SYSTEM\PAGE\Page {
      

     public function html(){
        $vars = array();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(100));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_cover/cover.tpl'), $vars);
        
    }
}