<?php
class bars{
    public static function get_user_choice_overall($user_ID){
        $vars = \SQL\UVOTE_DATA_USER_CHOICE_OVERALL::Q1(array($user_ID));
        $vars['user_total_total'] = $vars['user_total_pro'] + $vars['user_total_con'] + $vars['user_total_ent'];
        $vars['user_total_pro_percentage'] = round($vars['user_total_pro']/$vars['user_total_total']*100+1);
        $vars['user_total_con_percentage'] = round($vars['user_total_con']/$vars['user_total_total']*100+1);
        $vars['user_total_ent_percentage'] = round($vars['user_total_ent']/$vars['user_total_total']*100+1);
        return \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/user_total.tpl'),$vars);
    }
    
    public static function user_per_party_overall(){
    //$vars = votes::get_user_per_party_overall(array(\SYSTEM\SECURITY\Security::getUser()->id));        
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'test',
                                'SELECT party, sum(case when uvote_data.choice = uvote_votes_per_party.choice then 1 else 0 end) class_MATCH,
                                               sum(case when uvote_data.choice != uvote_votes_per_party.choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data INNER JOIN uvote_votes_per_party 
                                    ON uvote_data.poll_ID = uvote_votes_per_party.poll_ID 
                                WHERE user_ID = ? GROUP BY party;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id));
        $i = 0;
        while($row = $res->next()){

            $res2 = votes::vote_accord_with_party($row['party']);
            $row['according_laws'] = self::build_according_law_html($res2, $row['party']);
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/urvoteparties.tpl'), $row);;
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
        new INFO($result);
        return $result;
    }
    public static function user_per_party_by_choicetype($choice){
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
        $i = 0;
        while($row = $res->next()){
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $row['bar'] = $bar;
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/urvoteparties_by_choice.tpl'), $row);;
        }
        if(empty($result)){
            return 'Keine relevanten Daten verfügbar';
        }
        
        return $result;        
    }
    public static function user_per_bt_by_choicetype($choice){
        switch($choice){
                case 1:
                    $bar = 'progress-bar-success';
                    $icon_type = 'pro';
                    break;
                case 2:
                    $bar = 'progress-bar-danger';
                    $icon_type = 'con';
                    break;
                case 3:
                    $bar = 'progress-bar-info';
                    $icon_type = 'ent';
                    break;
                case 0:
                    $bar = 'progress-bar';
            }
        $result = '';
        $con = new \SYSTEM\DB\Connection();
        $res = $con->prepare(   'user_to_party_by_choice_bt',
                                'SELECT user_ID, sum(case when uvote_data.choice = uvote_votes.bt_choice then 1 else 0 end) class_MATCH,
                                               sum(case when uvote_data.choice != uvote_votes.bt_choice then 1 else 0 end) class_MISSMATCH 
                                FROM uvote_data INNER JOIN uvote_votes
                                    ON uvote_data.poll_ID = uvote_votes.ID 
                                WHERE user_ID = ? AND uvote_votes.bt_choice = ? GROUP by user_ID;',
                                array(\SYSTEM\SECURITY\Security::getUser()->id, $choice));
        $i = 0;
        
        while($row = $res->next()){
            if(empty($row['class_MATCH'])){
            return 'Keine relevanten Daten verfügbar <br>';
            }
            $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);
            $row['bar'] = $bar;
            $row['icon_type'] = $icon_type;
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/urvotebt_by_choice.tpl'), $row);;
        }
        if(empty($result)){
            return 'Keine relevanten Daten verfügbar';
        }
        
        return $result;        
    }
    public static function user_to_bt(){
    //$vars = votes::get_user_per_party_overall($user_ID);
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
        $row['match_percentage'] = round($row['class_MATCH']/($row['class_MATCH']+$row['class_MISSMATCH'])*100,2);

        $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_analysis/tpl/bt_to_user_overall.tpl'), $row);
    }
    return $result;   
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

