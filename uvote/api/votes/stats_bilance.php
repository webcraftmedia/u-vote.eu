<?php
class stats_bilance {
    
    public static function basic_bilance($cat){
        if($cat == 'user'){return self::user_bilance();}
        if($cat == 'user_bt'){return self::user_bt_bilance();}
        if($cat == 'community'){ return self::community_bilance();}
        if($cat == 'bt'){return self::bt_bilance();}
        else {return 'error';}
        }
        
    public static function user_bilance(){
        $vars = array();
        $vars['bilance_user'] = bars::bilance_user();
        $vars['analysis_help_user_to_party_overall'] = \SYSTEM\PAGE\text::get('analysis_help_user_to_party_overall');
        $vars['analysis_math_user_to_party_overall'] = \SYSTEM\PAGE\text::get('analysis_math_user_to_party_overall');
        $vars['analysis_help_party_donut'] = \SYSTEM\PAGE\text::get('analysis_help_party_donut');
        $vars['analysis_math_party_donut'] = \SYSTEM\PAGE\text::get('analysis_math_party_donut');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/tab_bilance/tab_bilance_user.tpl'),$vars);
    }
    public static function user_bt_bilance(){
        $vars = array();
        $vars['bilance_user_bt'] = bars::bilance_user_bt();
        $vars['analysis_help_bt'] = \SYSTEM\PAGE\text::get('analysis_help_bt');
        $vars['analysis_math_bt'] = \SYSTEM\PAGE\text::get('analysis_math_bt');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/tab_bilance/tab_bilance_user_bt.tpl'),$vars);
    }
    public static function community_bilance(){
        $vars = array();
        $vars['analysis_help_community_to_fr'] = \SYSTEM\PAGE\text::get('analysis_help_community_to_fr');
        $vars['analysis_math_community_to_fr'] = \SYSTEM\PAGE\text::get('analysis_math_community_to_fr');
        $vars['bilance_community'] = bars::bilance_community();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/tab_bilance/tab_bilance_community.tpl'),$vars);
    }
    public static function bt_bilance(){
        $vars = array();
        $vars['analysis_help_choices_bt'] = \SYSTEM\PAGE\text::get('analysis_help_choices_bt');
        $vars['analysis_math_choices_bt'] = \SYSTEM\PAGE\text::get('analysis_math_choices_bt');
        $vars['bilance_bt'] = bars::bilance_bt();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/tab_bilance/tab_bilance_bt.tpl'),$vars);
    }
}
