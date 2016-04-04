<?php
class stats_bilance_choice {
    public static function basic_bilance_choice($cat){
        if($cat == 'user_party'){
            return self::user_party_bilance_choice();
        }
        if($cat == 'user_bt'){
            return self::user_bt_bilance_choice();
        }
    }
    
    public static function user_party_bilance_choice(){
        $vars['choices_user_ID_per_party_pro'] = bars::bilance_choice_user_party('1');
        $vars['choices_user_ID_per_party_con'] = bars::bilance_choice_user_party('2');
        $vars['choices_user_ID_per_party_ent'] = bars::bilance_choice_user_party('3');
        $vars['analysis_help_uservera_to_party_pro'] = \SYSTEM\PAGE\text::get('analysis_help_uservera_to_party_pro');
        $vars['analysis_math_uservera_to_party_pro'] = \SYSTEM\PAGE\text::get('analysis_math_uservera_to_party_pro');
        $vars['analysis_help_uservera_to_party_con'] = \SYSTEM\PAGE\text::get('analysis_help_uservera_to_party_con');
        $vars['analysis_math_uservera_to_party_con'] = \SYSTEM\PAGE\text::get('analysis_math_uservera_to_party_con');
        $vars['analysis_help_uservera_to_party_ent'] = \SYSTEM\PAGE\text::get('analysis_help_uservera_to_party_ent');
        $vars['analysis_math_uservera_to_party_ent'] = \SYSTEM\PAGE\text::get('analysis_math_uservera_to_party_ent');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance_choice/tab_bilance_choice_user_party.tpl'))->SERVERPATH(),$vars);
    }
    public static function user_bt_bilance_choice(){
        $vars['choices_user_ID_per_bt_pro'] = bars::bilance_choice_user_bt('1');
        $vars['choices_user_ID_per_bt_con'] = bars::bilance_choice_user_bt('2');
        $vars['choices_user_ID_per_bt_ent'] = bars::bilance_choice_user_bt('3');
        $vars['analysis_help_bt_by_vote'] = \SYSTEM\PAGE\text::get('analysis_help_bt_by_vote');
        $vars['analysis_math_bt_by_vote'] = \SYSTEM\PAGE\text::get('analysis_math_bt_by_vote');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance_choice/tab_bilance_choice_user_bt.tpl'))->SERVERPATH(),$vars);
    }
}
