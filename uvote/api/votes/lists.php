<?php
class lists{

    public static function generate_votelist($filter){        
        $result = array('','');
        if(!$filter){
            $votes = votes::getAllVotesOfGroup(1); 
        }
        else{
            $votes = \SQL\UVOTE_GENERATE_VOTELIST_FILTERED::QA(array(1, $filter));   
        }
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);
            $vote_count = votes::get_count_user_votes_per_poll($vote['ID']);  
            $vote['votecount'] = $vote_count['count'];
            $vote['tags'] = self::get_all_tags_of_vote($vote['ID']);
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];
            $vote['full_vote_btn'] = $time_remain > 0 ? 'Abstimmen' : 'Ansehen';            
            $vote['uv'] = $vote['bt'] = '';            
            $vote['uv_count'] = $vote_count['count'] > 4 ? $vote_count['count'] : '< 5';
            $user_vote = votes::getUserPollData($vote['ID']);
            $vote['vote_class'] = switchers::tablerow_class($user_vote);
            $vote['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
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
    public static function get_all_tags_of_vote($poll_ID){
        $result = '';
        $vars = \SQL\UVOTE_DATA_USER_TAGS_OF_VOTE::QA(array($poll_ID));
        foreach ($vars as $tag){
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/tag.tpl'),$tag);
        }
        return $result;
    }
    
    public static function text_search($text){
        $result = array('','');
        $votes = \SQL\UVOTE_DATA_TEXT_SEARCH::QA(array($text));
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);
            $vote_count = votes::get_count_user_votes_per_poll($vote['ID']);  
            $vote['votecount'] = $vote_count['count'];
            $vote['tags'] = self::get_all_tags_of_vote($vote['ID']);
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];
            $vote['full_vote_btn'] = $time_remain > 0 ? 'Abstimmen' : 'Ansehen';            
            $vote['uv'] = $vote['bt'] = '';            
            $vote['uv_count'] = $vote_count['count'] > 4 ? $vote_count['count'] : '< 5';
            $user_vote = votes::getUserPollData($vote['ID']);
            $vote['vote_class'] = switchers::tablerow_class($user_vote);
            $vote['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
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

