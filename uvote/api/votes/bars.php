<?php
class bars{
    
    public static function get_user_choice_overall($user_ID){
        $vars = \SQL\UVOTE_DATA_USER_CHOICE_OVERALL::Q1(array($user_ID));
        $vars['total_total'] = $vars['total_pro'] + $vars['total_con'] + $vars['total_ent'];
        $vars['total_pro_percentage'] = $vars['total_total'] > 0 ? round($vars['total_pro']/$vars['total_total']*100) : 0;
        $vars['total_con_percentage'] = $vars['total_total'] > 0 ? round($vars['total_con']/$vars['total_total']*100) : 0;
        $vars['total_ent_percentage'] = $vars['total_total'] > 0 ? round($vars['total_ent']/$vars['total_total']*100) : 0;
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_basic/user_total.tpl'))->SERVERPATH(),$vars);
    }
    public static function get_uvote_choice_overall(){
        $vars = \SQL\UVOTE_DATA_CHOICE_OVERALL::Q1(array());
        $vars['total_total'] = $vars['pro'] + $vars['con'] + $vars['ent'];
        $vars['total_pro_percentage'] = $vars['total_total'] > 0 ? round($vars['pro']/$vars['total_total']*100+1) : 0;
        $vars['total_con_percentage'] = $vars['total_total'] > 0 ? round($vars['con']/$vars['total_total']*100+1) : 0;
        $vars['total_ent_percentage'] = $vars['total_total'] > 0 ? round($vars['ent']/$vars['total_total']*100+1) : 0;
        new SYSTEM\LOG\INFO($vars['total_ent_percentage']);
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_basic/uvote_total.tpl'))->SERVERPATH(),$vars);
    }
    public static function get_bt_choice_overall(){
        $vars = \SQL\UVOTE_DATA_CHOICE_BT_OVERALL::Q1(array());
        $vars['total_total'] = $vars['pro'] + $vars['con'] + $vars['ent'];
        $vars['total_pro_percentage'] = $vars['total_total'] > 0 ? round($vars['pro']/$vars['total_total']*100+1) : 0;
        $vars['total_con_percentage'] = $vars['total_total'] > 0 ? round($vars['con']/$vars['total_total']*100+1) : 0;
        $vars['total_ent_percentage'] = $vars['total_total'] > 0 ? round($vars['ent']/$vars['total_total']*100+1) : 0;
        new SYSTEM\LOG\INFO($vars['total_ent_percentage']);
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_basic/bt_total.tpl'))->SERVERPATH(),$vars);
    }
    public static function bilance_community(){
        $result = '';
        $vars = \SQL\UVOTE_DATA_UVOTE_TO_PARTY_OVERALL::QA(array());
        foreach($vars as $bar){
            $bar['match_percentage'] = round($bar['class_MATCH']/($bar['class_MATCH']+$bar['class_MISSMATCH'])*100,2);
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance/bars_community.tpl'))->SERVERPATH(), $bar);
        }
        return $result;
    }
    public static function bilance_bt(){
        $result = '';
        $vars = \SQL\UVOTE_DATA_BT_TO_PARTY_OVERALL::QA(array());
        foreach($vars as $bar){
            $bar['match_percentage'] = round($bar['class_MATCH']/($bar['class_MATCH']+$bar['class_MISSMATCH'])*100,2);
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance/bars_community.tpl'))->SERVERPATH(), $bar);
        }
        return $result;
    }
    public static function bilance_user(){   
        $result = '';
        $res = \SQL\UVOTE_DATA_USER_BILANCE::QA(array(\SYSTEM\SECURITY\Security::getUser()->id));
        foreach($res as $row){
            //$res2 = votes::vote_accord_with_party($row['party']);
            //$row['according_laws'] = self::build_according_law_html($res2, $row['party']);
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance/bars_user.tpl'))->SERVERPATH(), $row);
        }
        return $result;
    }
    public static function build_according_law_html($part, $party){
        $part = json_decode($part, true);
        $result = "<div class='row' style='overflow-x: scroll; overflow-y: hide; max-width: 600px; max-height: 600px;'><font color='black'><h6><i>Bei folgenden Gesetzen hast du genauso abgestimmt wie die ".$party.":</i></h6><hr>";
        foreach ($part['result'] as $p){
            $result .= $p['title']."<hr>";
        }
        $result .= "</font><hr><button id='close_popup' type='button' class='btn btn-primary'>schließen</button></div>";
        return $result;
    }
    public static function bilance_choice_user_party($choice){
        $bar = switchers::bar_class($choice);
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'user_to_party_by_choice',
                                'SELECT party, sum(case when uvote_data.choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
                                               sum(case when uvote_data.choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data INNER JOIN uvote_votes_per_party 
                                    ON uvote_data.poll_ID = uvote_votes_per_party.poll_ID 
                                WHERE user_ID = ? AND uvote_votes_per_party.choice = ? GROUP BY party;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id, $choice));
        while($row = $res->next()){
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $row['bar'] = $bar;
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance_choice/bars_user.tpl'))->SERVERPATH(), $row);;
        }
        if(empty($result)){
            return 'Keine relevanten Daten verfügbar';
        }
        return $result;        
    }
    public static function bilance_choice_user_bt($choice){
        $bar = switchers::bar_class($choice);
        $icon_type = switchers::tablerow_class($choice);
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'user_to_party_by_choice_bt',
                                'SELECT user_ID, sum(case when uvote_data.choice = uvote_votes.bt_choice then 1 else 0 end) class_MATCH,
                                               sum(case when uvote_data.choice != uvote_votes.bt_choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data INNER JOIN uvote_votes
                                    ON uvote_data.poll_ID = uvote_votes.ID 
                                WHERE user_ID = ? AND uvote_votes.bt_choice = ? GROUP by user_ID;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id, $choice));
        while($row = $res->next()){
            if(empty($row['class_MATCH'])){
            return 'Keine relevanten Daten verfügbar <br><br>';
            }
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $row['bar'] = $bar;
            $row['icon_type'] = $icon_type;
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance_choice/urvotebt_by_choice.tpl'))->SERVERPATH(), $row);;
        }
        if(empty($result)){
            return 'Keine relevanten Daten verfügbar<br><br>';
        }
        
        return $result;        
    }
    public static function bilance_user_bt(){
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'bt_to_user',
                                'SELECT sum(case when uvote_data.choice = uvote_votes.bt_choice then 1 else 0 end) class_MATCH,
                                sum(case when uvote_data.choice != uvote_votes.bt_choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data LEFT JOIN uvote_votes 
                                ON uvote_data.poll_ID = uvote_votes.ID 
                                WHERE user_ID = ?;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id));
        while($row = $res->next()){
            $row['match_percentage'] = ($row['class_MATCH']+$row['class_MISSMATCH']) > 0 ? round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2) : 0;
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_analysis/tpl/tab_bilance/bars_user_bt.tpl'))->SERVERPATH(), $row);
        }
    return $result;   
    }
}