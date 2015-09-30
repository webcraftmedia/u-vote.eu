<?php
class default_page extends SYSTEM\PAGE\Page {        
    private function js(){   
        return  \SYSTEM\HTML\html::script(\LIB\lib_jquery::js()).
                \SYSTEM\HTML\html::script(\LIB\lib_bootstrap::js()).
                \SYSTEM\HTML\html::script(\LIB\lib_jqbootstrapvalidation::js()).
                \SYSTEM\HTML\html::script(\LIB\lib_system::js()).
                \SYSTEM\HTML\html::script(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/js/loadtexts.js')).
                \SYSTEM\HTML\html::script(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/js/account_create.js')).
                \SYSTEM\HTML\html::script('https://www.google.com/jsapi').
                '<script type="text/javascript">google.load("visualization", "1", {packages:["corechart"]});</script>';
    }
    
    private function css(){
        return  \SYSTEM\HTML\html::link(\LIB\lib_bootstrap::css()).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/default_page.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/full_vote.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/cover.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/vote.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/vote_bt.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/loggedinformtop.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/register_form.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/parties_on_vote.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/loggedinform.css')).
                \SYSTEM\HTML\html::link(\SYSTEM\WEBPATH(new \PPAGE(),'default_page/css/loginform.css'))
                ; 
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
    
    private static function badge_class($choice){
        switch($choice){
            case 1:
                return 'badge-success';
            case 2:
                return 'badge-important';
            case 3:
                return 'badge-info';
            default:
                return '';
        }
    }
    
    public static function panel_class($choice){
        switch($choice){
            case 1:
                return 'panel-success';
            case 2:
                return 'panel-danger';
            case 3:
                return 'panel-info';
            default:
                return 'panel-default';
        }
    }
    
    public function generate_votelist(){        
        $result = array('','');
        $votes = votes::getAllVotesOfGroup(1);               
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);
            $vote_count = votes::get_count_user_votes_per_poll($vote['ID']);
            
            $vote['title'] = utf8_encode($vote['title']);            
            $vote['time_left'] = round($time_remain/($time_span+1)*100,0);
            $vote['time_done'] = 100-$vote['time_left'];
            
            $vote['full_vote_btn'] = $time_remain > 0 ? 'Abstimmen' : 'Ansehen';            
            $vote['uv'] = $vote['bt'] = '';            
            $vote['uv_count'] = $vote_count['count'] > 4 ? $vote_count['count'] : '< 5';
            
            $user_vote = votes::getUserPollData($vote['ID']);
            $vote['vote_class'] = $this->tablerow_class($user_vote);
            if($user_vote){
                //user vote
                $vote['vote_class'] = $this->tablerow_class($user_vote);                

                //bt vote
                $party_votes = votes::get_barsperparty($vote['ID']);
                $vote['bt_vote_class'] = $this->tablerow_class($vote['bt_choice']);
                foreach($party_votes as $pv){
                    $vote['bt'] .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/vote_bt.tpl'),
                                    array(  'party' => $pv['party'],
                                            'choice' => $this->get_party_per_poll($pv['choice']),
                                            'choice_class' => $this->badge_class($pv['choice'])));                    
                }                        

                //uvote vote
                $uvote = votes::get_users_choice_per_poll($vote['ID']);                
                $vote['uv_vote_class'] = count($uvote) > 0 ? $this->tablerow_class($uvote[0]['choice']) : '';                                
                foreach($uvote as $v){
                    $vote['uv'] .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/vote_uv.tpl'),
                                    array(  'badge' => self::badge_class($v['choice']),
                                            'perc' => $v['count'] > 0 ? round($v['count']/$vote_count['count']*100, 2) : 0));
                }
            }
            
            //new panels:
            $vote['panel_class'] = self::panel_class($user_vote);
            
            if($time_remain > 0){               
                $result[0] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/vote.tpl'), $vote);
            } else {
                $result[1] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/vote.tpl'), $vote);
            }
        }
        return $result[0].$result[1];
    }        

    public function get_coverpage(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/cover.tpl'), array());}

    public function getloggedinform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loggedinform.tpl'),array());} 
    
    public function exchange_registerform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/register_form.tpl'),array());}
    
    public function getloginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loginform.tpl'),array());} 
    
    public function exchange_loginform(){
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/loggedinformtop.tpl'),array());}

    public function html($_escaped_fragment_ = NULL){
        $vars = array();
        if(!$_escaped_fragment_){
            $vars['js'] = $this->js();}
        $vars['css'] = $this->css();
        $vars['registerform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['loginform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->exchange_loginform() : $this->getloginform() ;
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=files&cat=frontend_logos&id=';
        $vars['votelist'] = $this->generate_votelist();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));

        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/page.tpl'), $vars);        
    }
}