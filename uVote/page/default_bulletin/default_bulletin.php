<?php
class default_bulletin extends SYSTEM\PAGE\Page {
    private $poll_ID = NULL;
    public function __construct($poll_ID) {
        $this->poll_ID=$poll_ID;
        
    }

private function js(){        
        return  '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_bulletin/js/vote.js').'"></script>';
}
 

    public function html(){
       
        $vars['poll_ID'] =  $this->poll_ID;
        $vars['js'] = $this->js();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,votes::get_voteinfo($this->poll_ID));       
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/bulletin.tpl'),$vars);
    }
  
}