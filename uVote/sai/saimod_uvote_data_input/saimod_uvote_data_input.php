<?php
class saimod_uvote_data_input extends \SYSTEM\SAI\SaiModule {    
    public function saimod_uvote_data_input(){       
        $vars = array();
        return \SYSTEM\PAGE\replace::replaceFile(dirname(__FILE__).'/main.tpl', $vars);}     
        
    public static function html_li_menu(){return '<li><a href="#" saimenu="saimod_uvote_data_input">data completion</a></li><li class="divider"></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function sai_mod_saimod_uvote_vote_edit_flag_js(){return \SYSTEM\LOG\JsonResult::toString(array(
            \SYSTEM\WEBPATH(new PSAI(),'saimod_uvote_data_input/saimod_uvote_data_input.js')
    ));}
    public static function sai_mod_saimod_uvote_data_input_flag_css(){}    
}