<?php
class user_main_poll implements SYSTEM\PAGE\Page { 
    public static function title(){
        return null;}
    public static function meta(){
        return array();}
    
    public static function css(){
            return array();}

    private $poll_ID = null;
    public function __construct($poll_ID){
        $this->poll_ID = $poll_ID;
    }
  
    private function choice_party (){
        $result = '';
        $party_votes = \SQL\UVOTE_DATA_PARTY_PER_POLL::QA(array($this->poll_ID));
        foreach($party_votes as $pv){
            $vote = array(  'party' => $pv['party'],
                            'choice' => switchers::get_party_per_poll($pv['choice']),
                            'choice_class' => switchers::tablerow_class($pv['choice']),
                            'party_yes' => $pv['votes_pro'] > 0 ? round($pv['votes_pro']/$pv['total']*100,0) : ($pv['choice'] == 1 ? '100' : '0'),
                            'party_no' => $pv['votes_contra'] > 0 ? round($pv['votes_contra']/$pv['total']*100,0) : ($pv['choice'] == 2 ? '100' : '0'),
                            'party_off' => $pv['total'] > 0 ? round(($pv['total'] - $pv['nr_attending'])/$pv['total']*100,0) : '0',
                            'party_ent' => $pv['nr_attending'] > 0 ? round(($pv['nr_attending'] - $pv['votes_pro'] - $pv['votes_contra'])/$pv['nr_attending']*100,0) : $pv['nr_attending']);
            if($vote['party_yes'] == '0' && $vote['party_no'] == '0' && $vote['party_ent'] == '0'){
                $vote['party_ent'] = 100;}
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/stats/vote_bt.tpl'))->SERVERPATH(),$vote);                    
        }
        return $result;              
    }
    
    private function bars_user(){
        $bars = votes::get_barsperusers($this->poll_ID,false);
        $bars['vote_yes_perc'] = round($bars['yes_perc']*100,0);
        $bars['vote_no_perc'] = round($bars['no_perc']*100,0);
        $bars['vote_ent_perc'] = round($bars['ent_perc']*100,0);
        $bars['title'] = 'Gemessen auf uVote';
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/stats/bars_user.tpl'))->SERVERPATH(),$bars);
    }
    
    private function bars_bt(){
        $vars = votes::get_bar_bt_per_poll($this->poll_ID);
        $info = votes::get_voteinfo($this->poll_ID, 1);
        if (!$vars['bt_total']){
            $var['disclaimer'] = 'Keine differenzierten Ergebnisse für den Bundestag verfügbar';
            $var['choice'] = switchers::tablerow_class($info['bt_choice']);
            $var['choice_full'] = switchers::tablerow_class($info['bt_choice']);
            if ($var['choice_full'] == 'open'){
                $var['choice_full'] = 'noch nicht';
                }
            return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/stats/table_bt_choice.tpl'))->SERVERPATH(), $var); 
        }
        $vars['disclaimer'] = '';
        $vars['choice'] = switchers::tablerow_class($info['bt_choice']);
        $vars['choice_full'] = switchers::tablerow_class($info['bt_choice']);
        if ($vars['choice_full'] == 'open'){
            $vars['choice_full'] = 'noch nicht';
        }
        $vars['choice_show'] = SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/stats/table_bt_choice.tpl'))->SERVERPATH(), $vars);        
        $vars['bt_ent'] = round(($vars['bt_attending'] - $vars['bt_pro'] - $vars['bt_con'])/$vars['bt_total']*100,0);
        $vars['bt_pro'] = round($vars['bt_pro']/$vars['bt_total']*100,0);
        $vars['bt_con'] = round($vars['bt_con']/$vars['bt_total']*100,0);
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/stats/table_bt.tpl'))->SERVERPATH(), $vars);
    }
    
    private function voice_weight(){
        $vars = \SQL\UVOTE_DATA_USER_COUNT_CHOICE_PER_POLL::Q1(array($this->poll_ID));
        $vars['voteweight'] = $vars['count'] ? round(1/$vars['count']*100) : 'no votes';      
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/stats/voteweight.tpl'))->SERVERPATH(), $vars);
    }
    
    private function vote_buttons($user_poll){        
            if(!$user_poll){
                return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/buttons/vote_buttons_fresh.tpl'))->SERVERPATH(), array('poll_ID'=>$this->poll_ID));
                }
            $classes = array('','','');
            switch($user_poll){
                case 1: $classes = array('poll_ID'=>$this->poll_ID, 'yes'=>'disabled','no'=>'','ent'=>'','choice'=>'_pro'); break;
                case 2: $classes = array('poll_ID'=>$this->poll_ID, 'yes'=>'','no'=>'disabled','ent'=>'','choice'=>'_con'); break;
                case 3: $classes = array('poll_ID'=>$this->poll_ID, 'yes'=>'','no'=>'','ent'=>'disabled','choice'=>'_ent'); break;
                default: $classes = array('poll_ID'=>$this->poll_ID, 'yes'=>'','no'=>'','ent'=>'','choice'=>'');
            }
            
            return SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/buttons/vote_buttons.tpl'))->SERVERPATH(), $classes);
                                                                         
    }
    public static function js(){        
        return array(new \PPAGE('user_main_poll/js/user_main_poll.js'));}

    public function html(){
        $user_vote = votes::getUserPollData($this->poll_ID);
        $vars = array();
        $vars = array_merge($vars, votes::get_voteinfo($this->poll_ID, 1));
        $vars['sub_buttons'] = votes::get_sublinks($this->poll_ID);
        $vars['choice_party'] = $this->choice_party();
        $vars['bars_user'] =  $this->bars_user();
        $vars['bars_bt'] = $this->bars_bt();
        $vars['voice_weight'] = $this->voice_weight();
        $vars['vote_buttons'] = $this->vote_buttons($user_vote);
        $vars['poll_ID'] =  $this->poll_ID; //put it here - so its filled in!
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $result = SYSTEM\PAGE\replace::replaceFile((new PPAGE('user_main_poll/tpl/full_vote.tpl'))->SERVERPATH(), $vars);
        return $result;
    }
  
}