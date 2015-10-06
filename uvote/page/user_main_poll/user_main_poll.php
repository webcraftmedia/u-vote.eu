<?php
class user_main_poll extends SYSTEM\PAGE\Page { 
    private $poll_ID = null;
    public function __construct($poll_ID){
        $this->poll_ID = $poll_ID;
    }
    private static function tablerow_class($choice){
        switch($choice){
            case 1:
                return 'pro';
            case 2:
                return 'con';
            case 3:
                return 'ent';
            default:
                return 'open';
        }        
    }
    
    private function get_party_per_poll($choice){
        switch($choice){
            case 1:
                return 'PRO';
            case 2:
                return 'CON';
            case 3:
                return 'ENT';
            default:
                return 'NONE';
        }           
    }
  
    private function choice_party (){
        $result = '';
        $party_votes = votes::get_barsperparty($this->poll_ID);

//        $vote['bt_vote_class'] = $this->tablerow_class($vote['bt_choice']);
        foreach($party_votes as $pv){
            
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/vote_bt.tpl'),
                                    array(  'party' => $pv['party'],
                                            'choice' => $this->get_party_per_poll($pv['choice']),
                                            'choice_class' => $this->tablerow_class($pv['choice']),
                                            'party_yes' => $pv['votes_pro'] > 0 ? round($pv['votes_pro']/$pv['total']*100,0) : $pv['votes_pro'],
                                            'party_no' => $pv['votes_contra'] > 0 ? round($pv['votes_contra']/$pv['total']*100,0) : $pv['votes_contra'],
                                            'party_off' => $pv['total'] > 0 ? round(($pv['total'] - $pv['nr_attending'])/$pv['total']*100,0) : $pv['total'],
                                            'party_ent' => $pv['nr_attending'] > 0 ? round(($pv['nr_attending'] - $pv['votes_pro'] - $pv['votes_contra'])/$pv['nr_attending']*100,0) : $pv['nr_attending']));                    
        }
        return $result;              
    }
    private function bars_user(){
        $bars = votes::get_barsperusers($this->poll_ID,false);
        $bars['vote_yes_perc'] = round($bars['yes_perc']*100,0);
        $bars['vote_no_perc'] = round($bars['no_perc']*100,0);
        $bars['vote_ent_perc'] = round($bars['ent_perc']*100,0);
        $bars['title'] = 'Gemessen auf uVote';
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/bars_user.tpl'),$bars);
    }
    
    private function bars_party(){
        $partyvotes = votes::get_barsperparty($this->poll_ID);
        
        $result = "";
        foreach($partyvotes as $vote){
            $vote['party_yes'] = $vote['votes_pro'] > 0 ? round($vote['votes_pro']/$vote['total']*100,0) : $vote['votes_pro'];
            $vote['party_no'] = $vote['votes_contra'] > 0 ? round($vote['votes_contra']/$vote['total']*100,0) : $vote['votes_contra'];
            $vote['party_ent'] = $vote['nr_attending'] > 0 ? round(($vote['nr_attending'] - $vote['votes_pro'] - $vote['votes_contra'])/$vote['total']*100,0) : $vote['nr_attending'];
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/table_parties.tpl'), $vote);
        }
        
        return $result;
    }
    
    private function icons_party(){
        $vars = votes::get_bar_bt_per_poll($this->poll_ID);
        if (!$vars['bt_total']){
            return '';}
        $info = array();
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/icons_table_parties.tpl'), $info);
    }
    
    private function bars_bt(){
        $vars = votes::get_bar_bt_per_poll($this->poll_ID);
        if (!$vars['bt_total']){
            return 'Keine Ergebnisse für den Bundestag verfügbar';}
        $vars['bt_ent'] = round(($vars['bt_attending'] - $vars['bt_pro'] - $vars['bt_con'])/$vars['bt_total']*100,0);
        $vars['bt_pro'] = round($vars['bt_pro']/$vars['bt_total']*100,0);
        $vars['bt_con'] = round($vars['bt_con']/$vars['bt_total']*100,0);           
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/table_bt.tpl'), $vars);
    }
    
    private function voice_weight(){
        $vars = votes::get_count_user_votes_per_poll($this->poll_ID);
        $vars['voteweight'] = $vars['count'] ? round(1/$vars['count']*100) : 'no votes';      
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/voteweight.tpl'), $vars);
    }
    
    private function p_fields (){
        $result = "";
        
        $list = array   (array(1, 'Aussenpolitik'),
                        array(2, 'Aussenpolitik'),
                        array(4, 'Aussenpolitik'),
                        array(8, 'Aussenpolitik'));
        foreach($list as $l){
        if($p_fields & $l[0]) $result .= $l[1];       
        }
        return $result;
    }
    
    private function vote_buttons($poll_expired,$user_poll){        
        if($poll_expired){
            if(!$user_poll){
                return '<h5>Stimme hier ab</h5>
                                     <button id="btnvote_yes" class="btn btn-success btn-default"
                                        style="width: 90px"                                     
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Pro</font></button>
                                     <button id="btnvote_no" class="btn btn-danger btn-default" 
                                        style="width: 90px" 
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Contra</font></button>
                                     <button id="btnvote_off" class="btn btn-info btn-default" 
                                        style="width: 90px"
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Enthaltung</font></button>';}
            $classes = array('','','');
            switch($user_poll){
                case 1: $classes = array('btn-success disabled','btn-danger','btn-info'); break;
                case 2: $classes = array('btn-success','btn-danger disabled','btn-info'); break;
                case 3: $classes = array('btn-success','btn-danger','btn-info disabled'); break;
                default: array('','','');
            }
            
            return '                 <h5>Ändere deine Stimme hier ab</h5>
                                     <button id="btnvote_yes" class="btn btn_vote '.$classes[0].' btn-default btnvote_yes"
                                        style="width: 90px"                                     
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Pro</font></button>
                                     <button id="btnvote_no" class="btn btn_vote '.$classes[1].' btn-default btnvote_no" 
                                        style="width: 90px" 
                                        href="#" 
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Contra</font></button>
                                     <button id="btnvote_off" class="btn btn_vote '.$classes[2].' btn-default btnvote_off" 
                                        style="width: 90px" 
                                        href="#" 
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Enthaltung</font></button>
                                        ';
        } else {
            return 'ye soon to come infos';
        }                                            
    }
    private function get_voteinfo(){
         $var = votes::get_voteinfo($this->poll_ID);
         return $var['iframe_link'];
    }
    public static function js(){        
        return array(\SYSTEM\WEBPATH(new \PPAGE(),'user_main_poll/js/user_main_poll.js'));}
    private function css(){  
        return \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_bulletin\css\bars_user.css')).
               \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_bulletin\css\bulletin.css')).
               \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_bulletin\css\comment.css'));                      
    }
    public function html(){
        $poll_expired = \SQL\UVOTE_POLL_EXPIRED::Q1(array($this->poll_ID));
        $user_vote = votes::getUserPollData($this->poll_ID);
        $vars = array();
        $vars = array_merge($vars,votes::get_voteinfo($this->poll_ID));
        //$vars['comments_pro'] = $this->get_pro_comments();
        //$vars['comments_con'] = $this->get_con_comments();
        $vars['icons_party'] = $this->icons_party();
        $vars['choice_party'] = $this->choice_party();
        $vars['bars_party'] = $this->bars_party();
        $vars['bars_user'] =  $this->bars_user();
        $vars['bars_bt'] = $this->bars_bt();
        $vars['voice_weight'] = $this->voice_weight();
        $vars['vote_buttons'] = $this->vote_buttons($poll_expired, $user_vote);
        $vars['poll_ID'] =  $this->poll_ID; //put it here - so its filled in!
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        //$vars['vote'] = $this->get_voteinfo(); //votes::getVoteOfGroup($poll_ID);
        $result = SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_poll/tpl/full_vote.tpl'), $vars);
        return $result;
    }
  
}