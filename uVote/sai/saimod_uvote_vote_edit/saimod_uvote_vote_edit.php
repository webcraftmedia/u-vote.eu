<?php
class saimod_uvote_vote_edit extends \SYSTEM\SAI\SaiModule {  
    public static function sai_mod__SYSTEM_SAI_saimod_uvote_vote_edit_action_new_vote($data){
        new \SYSTEM\LOG\INFO('json kommt im php an');
         $vote = $data;
         $con = new \SYSTEM\DB\Connection(new \DBD\uVote());
         $res = null;
         $res = $con->prepare('INSERT INTO uvote_votes (poll_ID, title, text, p_fields, time_start, time_end) VALUES (?1, ?2, ?3, ?4, ?5, ?6);', array($poll_ID));        
        return $res->affectedRows() == 0 ? \SYSTEM\LOG\JsonResult::error(new \SYSTEM\LOG\WARNING("no data added")) : \SYSTEM\LOG\JsonResult::ok();
        new \SYSTEM\LOG\INFO($vote);
    }

    public static function sai_mod_saimod_uvote_vote_edit(){       
        $vars = array();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(dirname(__FILE__).'/main.tpl', $vars);}     
        
    public static function html_li_menu(){return '<li><a href="#" saimenu="saimod_uvote_vote_edit">votemask</a></li><li class="divider"></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function sai_mod_saimod_uvote_vote_edit_flag_js(){return \SYSTEM\LOG\JsonResult::toString(array(
            \SYSTEM\WEBPATH(new PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.js')
    ));}
    public static function sai_mod_saimod_uvote_data_input_flag_css(){}
    
}