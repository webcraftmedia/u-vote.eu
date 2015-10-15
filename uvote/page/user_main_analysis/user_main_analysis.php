<?php
class user_main_analysis extends SYSTEM\PAGE\Page {   
    public static function js(){        
        return array(\SYSTEM\WEBPATH(new \PPAGE(),'user_main_analysis/js/user_main_analysis.js'));}
    public function html(){
        $vars = array();
        
        //second panel
        $vars['basic_stats'] = bars::get_user_choice_overall(\SYSTEM\SECURITY\Security::getUser()->id);
        $vars['user_temp_votes'] = votes::get_user_temp_votes();
        $vars['user_overall_votes'] = votes::get_user_overall_votes();
        
        //third panel
        $vars['choices_user_ID'] = bars::user_per_party_overall();
        
        //fourth panel
        $vars['choices_user_ID_per_party_pro'] = bars::user_per_party_by_choicetype('1');
        $vars['choices_user_ID_per_party_con'] = bars::user_per_party_by_choicetype('2');
        $vars['choices_user_ID_per_party_ent'] = bars::user_per_party_by_choicetype('3');
        
        //fifth panel
        $vars['choices_bt_to_user'] = bars::user_to_bt();
        $vars['choices_user_ID_per_bt_pro'] = bars::user_per_bt_by_choicetype('1');
        $vars['choices_user_ID_per_bt_con'] = bars::user_per_bt_by_choicetype('2');
        $vars['choices_user_ID_per_bt_ent'] = bars::user_per_bt_by_choicetype('3');
         
        
        $vars['votes_all'] = bars::get_uvote_choice_overall();
        $vars['votes_all_to_bt'] = bars::get_uvote_choice_overall_to_bt();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('help'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('math'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/user_main_analysis.tpl'),$vars);
    }
  
}