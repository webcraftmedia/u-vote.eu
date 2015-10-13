<?php
class lists{
    public static function generate_votelist(){        
        $result = array('','');
        $votes = votes::getAllVotesOfGroup(1);               
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);
            $vote_count = votes::get_count_user_votes_per_poll($vote['ID']);   
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];
            $vote['full_vote_btn'] = $time_remain > 0 ? 'Abstimmen' : 'Ansehen';            
            $vote['uv'] = $vote['bt'] = '';            
            $vote['uv_count'] = $vote_count['count'] > 4 ? $vote_count['count'] : '< 5';
            $user_vote = votes::getUserPollData($vote['ID']);
            $vote['vote_class'] = switchers::tablerow_class($user_vote);
            if($time_remain > 0){
                $vote['statusmarker'] = 'aktuell';
                $result[0] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/vote.tpl'), $vote);
            } else {
                $vote['statusmarker'] = 'vergangen';
                $result[1] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/vote.tpl'), $vote);
            }
        }
        return $result[0].$result[1];
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

