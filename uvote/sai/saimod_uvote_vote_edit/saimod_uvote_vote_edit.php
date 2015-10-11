<?php
namespace SAI;
class saimod_uvote_vote_edit extends \SYSTEM\SAI\SaiModule {  
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
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/main.tpl'), $ID);
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
            $vote['vote_class'] = \switchers::tablerow_class(\votes::getUserPollData($vote['ID']));
            $vote['bt_vote_class'] = \switchers::tablerow_class($vote['bt_choice']);            
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];
            
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/main.tpl'), $vote);
        }
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.tpl'), array('list' => $result));
    }
    
    public static function sai_mod__SAI_saimod_uvote_vote_edit_action_edit_vote($data_json){
        $data_stdClass = \json_decode($data_json);
        $data = (array)$data_stdClass;
        if(!$data['poll_ID']){
            new \SYSTEM\LOG\WARNING(print_r($data, TRUE));
            \SYSTEM\DBD\SYS_TEXT_SAVE::QI(array($stamp,'deDE',$data['title'], 'wed', ''));
            \SYSTEM\DBD\SYS_TEXT_SAVE_TAG::QI(array($stamp,$tag));          
            return \SQL\UVOTE_DATA_NEW_POLL::QA(array($data['title'], $data['time_end'], $data['iframe_link']));
        }
        return \SQL\UVOTE_DATA_EDIT_POLL::QA(array($data['poll_ID'], $data['title'], $data['time_end'], $data['iframe_link']));
        
    }
    public static function html_li_menu(){return '<li><a href="#!vote">Edit Votes</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function js(){return array(
            \SYSTEM\WEBPATH(new \PSAI(),'saimod_uvote_vote_edit/saimod_uvote_vote_edit.js')
    );}
    public static function css(){return array()
    ;}
}