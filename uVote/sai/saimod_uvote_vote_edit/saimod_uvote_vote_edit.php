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
    
    public static function sai_mod_saimod_uvote_vote_edit_action_insertPartyChoice ($poll_ID, $party, $votes_pro, $votes_contra, $nr_attending, $total, $choice){
        $vars = votes::insertPartyChoice($poll_ID, $party, $votes_pro, $votes_contra, $nr_attending, $total, $choice);       
    }

    public static function sai_mod_saimod_uvote_new_vote(){
        $result = '';
        $vote = array();
        $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(),'saimod_uvote_vote_edit/vote.tpl'), $vote);
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.tpl'), array('vote' => $result));
    }


    public static function sai_mod_saimod_uvote_vote_edit(){       
        /*$vars = array();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(dirname(__FILE__).'/main.tpl', $vars);*/
        
        $result = '';
        $votes = votes::getAllVotesOfGroup(1);               
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);
            $vote['vote_class'] = self::tablerow_class(votes::getUserPollData($vote['ID']));
            $vote['bt_vote_class'] = self::tablerow_class($vote['bt_choice']);            
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];            
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(),'saimod_uvote_vote_edit/vote.tpl'), $vote);
        }
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.tpl'), array('list' => $result));
    }
    
    private static function tablerow_class($choice){
        switch($choice){
            case 1:
                return 'pro';
            case 2:
                return 'contra';
            case 3:
                return 'ent';
            default:
                return '';
        }        
    }
        
    public static function html_li_menu(){return '<li><a href="#" saimenu="saimod_uvote_vote_edit">Edit Votes</a></li><li class="divider"></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function sai_mod_saimod_uvote_vote_edit_flag_js(){return \SYSTEM\LOG\JsonResult::toString(array(
            \SYSTEM\WEBPATH(new PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.js')
    ));}
    
}