<?php
namespace SAI;
class saimod_uvote_vote_edit extends \SYSTEM\SAI\sai_module {  
    public static function sai_mod__SYSTEM_SAI_saimod_uvote_vote_edit_action_new_vote($data){
        new \SYSTEM\LOG\INFO('json kommt im php an');
         $vote = $data;
         $con = new \SYSTEM\DB\Connection(new \SQL\uVote());
         $res = null;
         $res = $con->prepare('INSERT INTO uvote_votes (poll_ID, title, text, p_fields, time_start, time_end) VALUES (?1, ?2, ?3, ?4, ?5, ?6);', array($poll_ID));        
        return $res->affectedRows() == 0 ? \SYSTEM\LOG\JsonResult::error(new \SYSTEM\LOG\WARNING("no data added")) : \SYSTEM\LOG\JsonResult::ok();
        new \SYSTEM\LOG\INFO($vote);
    }

    public static function sai_mod_saimod_uvote_new_vote(){
        $ID = array();
        $ID['ID'] = '';
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/new.tpl'), $ID);
    }
    public static function party_stats($poll_ID){
        $result = '';
        $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/partynew.tpl'));
        $parties = \SQL\UVOTE_DATA_PARTY_PER_POLL::QA(array($poll_ID));
        foreach($parties as $poll){
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/party.tpl'), $poll);
        }
       return $result;
    }

    public static function sai_mod__SAI_saimod_uvote_vote_edit(){       
        /*$vars = array();
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        return \SYSTEM\PAGE\replace::replaceFile(dirname(__FILE__).'/main.tpl', $vars);*/
        
        $result = '';
        $result.=self::sai_mod_saimod_uvote_new_vote();
        $votes = \votes::getAllVotesOfGroup(1);               
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);        
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];
            $vote['parties'] = self::party_stats($vote['ID']);
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/main.tpl'), $vote);
        }
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.tpl'), array('list' => $result));
    }
    
    public static function sai_mod__SAI_saimod_uvote_vote_edit_action_edit_vote($data_json, $tags_json){
        $tags = \json_decode($tags_json);
        $data_stdClass = \json_decode($data_json);
        $data = (array)$data_stdClass;
        if(!$data['poll_ID']){
            new \SYSTEM\LOG\WARNING(print_r($data, TRUE));
            \SYSTEM\PAGE\text::save($data['title'], $data['title'], 'deDE', $tags, 'blanc');     
            return \SQL\UVOTE_DATA_NEW_POLL::QA(array($data['title'], $data['time_end'], $data['iframe_link']));
        }
        return \SQL\UVOTE_DATA_EDIT_POLL::QA(array($data['poll_ID'], $data['title'], $data['time_end'], $data['iframe_link'], $data['bt_choice']));
        
    }
    public static function sai_mod__SAI_saimod_uvote_vote_edit_action_edit_partydata($data_json){
        $datastd = \json_decode($data_json);
        $data = (array)$datastd;
        new \SYSTEM\LOG\WARNING(print_r($data, TRUE));
        return \SQL\UVOTE_DATA_EDIT_PARTYDATA::QA(array($data['poll_ID'],
                                                        $data['party'], 
                                                        $data['votes_pro'], 
                                                        $data['votes_contra'], 
                                                        $data['nr_attending'], 
                                                        $data['total'], 
                                                        $data['choice'], 
                                                        $data['votes_pro'], 
                                                        $data['votes_contra'], 
                                                        $data['nr_attending'], 
                                                        $data['total'], 
                                                        $data['choice']));
    }
    public static function html_li_menu(){return '<li><a href="#!vote">Edit Votes</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function js(){return array(
            \SYSTEM\WEBPATH(new \PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.js')
    );}
    public static function css(){return array()
    ;}
}