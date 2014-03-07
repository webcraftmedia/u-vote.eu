<?php
class default_bulletin extends SYSTEM\PAGE\Page {
    private $poll_ID = NULL;
    
    public function __construct($poll_ID) {
        $this->poll_ID=$poll_ID;}
    
    public function vote_choice(){
        $vars = votes::getUserPollData($this->poll_ID);
        return $this->tablerow_class($vars);
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
            
            $result .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/vote_bt.tpl'),
                                    array(  'party' => $pv['party'],
                                            'choice' => $this->get_party_per_poll($pv['choice']),
                                            'choice_class' => $this->tablerow_class($pv['choice']),
                                            'party_yes' => $pv['votes_pro'] > 0 ? round($pv['votes_pro']/$pv['total']*100,0) : 'votes_pro',
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
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/bars_user.tpl'),$bars);
    }
    
    private function bars_party(){
        $partyvotes = votes::get_barsperparty($this->poll_ID);
        
        $result = "";
        foreach($partyvotes as $vote){
            $vote['party_yes'] = $vote['votes_pro'] > 0 ? round($vote['votes_pro']/$vote['total']*100,0) : $vote['votes_pro'];
            $vote['party_no'] = $vote['votes_contra'] > 0 ? round($vote['votes_contra']/$vote['total']*100,0) : $vote['votes_contra'];
            $vote['party_ent'] = $vote['nr_attending'] > 0 ? round(($vote['nr_attending'] - $vote['votes_pro'] - $vote['votes_contra'])/$vote['total']*100,0) : $vote['nr_attending'];
            $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/table_parties.tpl'), $vote);
        }
        
        return $result;
    }
    
    private function icons_party(){
        $vars = array();
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/icons_table_parties.tpl'), $vars);
    }
    
    private function bars_bt(){
        $vars = votes::get_bar_bt_per_poll($this->poll_ID);
        if (!$vars['bt_total']){
            return 'no data yet';}
        $vars['bt_ent'] = round(($vars['bt_attending'] - $vars['bt_pro'] - $vars['bt_con'])/$vars['bt_total']*100,0);
        $vars['bt_pro'] = round($vars['bt_pro']/$vars['bt_total']*100,0);
        $vars['bt_con'] = round($vars['bt_con']/$vars['bt_total']*100,0);           
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/table_bt.tpl'), $vars);
    }
    
    private function voice_weight(){
        $vars = votes::get_count_user_votes_per_poll($this->poll_ID);
        $vars['voteweight'] = round(1/$vars['count']*100);      
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/voteweight.tpl'), $vars);
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
                                     <a class="btn btn-success btn-default btnvote_yes"
                                        style="width: 70px"                                     
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Pro</font></a>
                                     <a class="btn btn-danger btn-default btnvote_no" 
                                        style="width: 70px" 
                                        href="#" 
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Contra</font></a>
                                     <a class="btn btn-info btn-default btnvote_off" 
                                        style="width: 70px" 
                                        href="#" 
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Enthaltung</font></a>';}
            $classes = array('','','');
            switch($user_poll){
                case 1: $classes = array('btn-success disabled','btn-danger','btn-info'); break;
                case 2: $classes = array('btn-success','btn-danger disabled','btn-info'); break;
                case 3: $classes = array('btn-success','btn-danger','btn-info disabled'); break;
                default: array('','','');
            }
            
            return '                 <h5>Ändere deine Stimme hier ab</h5>
                                     <a class="btn '.$classes[0].' btn-default btnvote_yes"
                                        style="width: 70px"                                     
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Pro</font></a>
                                     <a class="btn '.$classes[1].' btn-default btnvote_no" 
                                        style="width: 70px" 
                                        href="#" 
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Contra</font></a>
                                     <a class="btn '.$classes[2].' btn-default btnvote_off" 
                                        style="width: 70px" 
                                        href="#" 
                                        poll_ID="${poll_ID}"><font 
                                        size="3">Enthaltung</font></a>
                                        ';
        } else {
            return 'ye soon to come infos';
        }                                            
    }
        
    private function js(){        
        return  '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_bulletin/js/vote.js').'"></script>';}
    private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page\css\default_page.css').'" rel="stylesheet">';} 

    public function html(){
        $poll_expired = \DBD\UVOTE_POLL_EXPIRED::Q1(array($this->poll_ID));
        $user_vote = votes::getUserPollData($this->poll_ID);
        
        $vars = array();
        $vars['choice_party'] = '';
        $vars['voice_weight'] = $vars['bars_user'] = $vars['bars_bt'] = '';
        $vars['bars_party'] = '';
        $vars['icons_party'] = '';
        $vars['vote_class'] = $this->vote_choice();
        $vars['js'] = $this->js();
        $vars['css'] = $this->css();
                
        $vars['vote_buttons'] =   $this->vote_buttons($poll_expired,$user_vote);
//        $vars['p_fields'] = $this->p_fields();
        if($user_vote){
            $vars['icons_party'] = $this->icons_party();
            $vars['choice_party'] = $this->choice_party();
            $vars['bars_party'] = $this->bars_party();
            $vars['bars_user'] =  $this->bars_user();
            $vars['bars_bt'] = $this->bars_bt();
            $vars['voice_weight'] = $this->voice_weight();
        }
        
        $vars['poll_ID'] =  $this->poll_ID; //put it here - so its filled in!
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(DBD\locale_string::VALUE_CATEGORY_MAINPAGE));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(150));
        $vars = array_merge($vars,  \SYSTEM\locale::getStrings(100));
        
        $vars = array_merge($vars,votes::get_voteinfo($this->poll_ID));       
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/bulletin.tpl'),$vars);
    }
  
}