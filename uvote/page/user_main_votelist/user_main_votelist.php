<?php
class user_main_votelist extends SYSTEM\PAGE\Page { 
    
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
                return 'badge-danger';
            case 3:
                return 'badge-info';
            default:
                return '';
        }
    }
    private function user_count(){
        $vars = votes::get_user_count();       
        return $vars['count'];
    }
    public function generate_votelist(){        
        $result = array('','');
        $votes = votes::getAllVotesOfGroup(1);               
        foreach($votes as $vote){
            $time_remain = strtotime($vote['time_end'])-  microtime(true);
            $time_span = strtotime($vote['time_end']) - strtotime($vote['time_start']);
            $vote_count = votes::get_count_user_votes_per_poll($vote['ID']);
            
//            $vote['title'] = utf8_encode($vote['title']);            
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
                    $vote['bt'] .= \SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/vote_bt.tpl'),
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
                $result[0] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/vote.tpl'), $vote);
            } else {
                $result[1] .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/vote.tpl'), $vote);
            }
        }
        return $result[0].$result[1];
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
    public function html(){
        $vars = array();
        $vars['votelist'] = $this->generate_votelist();
        $vars['frontend_logos'] = './api.php?call=files&cat=frontend_logos&id=';
        $vars['user_count'] = $this->user_count();
        $vars['user_temp_votes'] = user_main_analysis::user_temp_votes();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote_register'));
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('uvote'));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_votelist/tpl/user_main_votelist.tpl'), $vars);
    }
  
}