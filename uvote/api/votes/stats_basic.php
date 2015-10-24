<?php
class stats_basic {
     public static function basic_basic($cat){
         if($cat == 'user'){
            return self::user_basic();
         }
         if($cat == 'community'){
            return self::community_basic();
         }
         if($cat == 'bt'){
            return self::bt_basic();
         }
    else {return 'error';}
     }
    public static function user_basic(){
        $vars['basic_stats'] = bars::get_user_choice_overall(\SYSTEM\SECURITY\Security::getUser()->id);
        $vars['user_temp_votes'] = votes::get_user_temp_votes();
        $vars['user_overall_votes'] = votes::get_user_overall_votes();
        $vars['analysis_help_basic_stats'] = \SYSTEM\PAGE\text::get('analysis_help_basic_stats');
        $vars['analysis_math_basic_stats'] = \SYSTEM\PAGE\text::get('analysis_math_basic_stats');
        $vars['analysis_help_basic_votes'] = \SYSTEM\PAGE\text::get('analysis_help_basic_votes');
        $vars['analysis_math_basic_votes'] = \SYSTEM\PAGE\text::get('analysis_math_basic_votes');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/tab_basic/tab_basic_user.tpl'),$vars);
    }
    public static function community_basic(){
        $vars['basic_stats_community'] = bars::get_uvote_choice_overall();
        $vars['analysis_help_community'] = \SYSTEM\PAGE\text::get('analysis_help_community');
        $vars['analysis_math_community'] = \SYSTEM\PAGE\text::get('analysis_math_community');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/tab_basic/tab_basic_community.tpl'),$vars);
    }
    
    public static function bt_basic(){
        $vars['basic_stats_bt'] = bars::get_bt_choice_overall();
        $vars['analysis_help_bt_basic'] = \SYSTEM\PAGE\text::get('analysis_help_bt_basic');
        $vars['analysis_math_bt_basic'] = \SYSTEM\PAGE\text::get('analysis_math_bt_basic');
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/tab_basic/tab_basic_bt.tpl'),$vars);
    }
}
