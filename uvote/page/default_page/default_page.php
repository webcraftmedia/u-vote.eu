<?php

class default_page extends SYSTEM\PAGE\Page {        
    private function js(){        
        return  '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'jquery/jquery-1.9.1.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'bootstrap/js/bootstrap.min.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'jqbootstrapvalidation/jqBootstrapValidation.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'hashmask/jquery.md5.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'hashmask/jquery.sha1.js').'"></script>'.
                '<script type="text/javascript" language="JavaScript" src="'.SYSTEM\WEBPATH(new PLIB(),'jquery.countdown\jquery.countdown.js').'"></script>'.                
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/loadtexts.js').'"></script>'.               
                '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/account_create.js').'"></script>'.
                '<script src="https://www.google.com/jsapi" type="text/javascript"></script>'.
                '<script type="text/javascript">google.load("visualization", "1", {packages:["corechart"]});</script>';
    }
    
    private function css(){  
        return '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/default_page.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/page.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/full_vote.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/cover.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/vote.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/vote_bt.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/loggedinformtop.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/register_form.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/parties_on_vote.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/loggedinform.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/css/loginform.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PLIB(),'bootstrap/css/bootstrap.min.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PLIB(),'bootstrap/css/bootstrap-theme.min.css').'" rel="stylesheet">'.
               '<link href="'.SYSTEM\WEBPATH(new PLIB(),'bootstrap/css/bootstrap-responsive.min.css').'" rel="stylesheet">';}        

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
        $vars['votelist'] = $this->generate_votelist();
        $vars['registerform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->getloggedinform() : $this->exchange_registerform();
        $vars['loginform'] = \SYSTEM\SECURITY\Security::isLoggedIn() ? $this->exchange_loginform() : $this->getloginform() ;
        $vars['frontend_logos'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).'api.php?call=img&cat=frontend_logos&id=';        
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));

        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/page.tpl'), $vars);        
    }
}