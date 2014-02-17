<?php
class user_main_urVote extends SYSTEM\PAGE\Page { 
    
    private function user_per_party_overall(){
        $vars = votes::get_user_per_party_overall(array(\SYSTEM\SECURITY\Security::getUser()->id));
        return print_r($vars, TRUE);
                
//        if (!$vars['bt_total']){
//            return 'no data yet';}
//        $vars['bt_ent'] = round(($vars['bt_attending'] - $vars['bt_pro'] - $vars['bt_con'])/$vars['bt_total']*100,0);
//        $vars['bt_pro'] = round($vars['bt_pro']/$vars['bt_total']*100,0);
//        $vars['bt_con'] = round($vars['bt_con']/$vars['bt_total']*100,0);           
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_bulletin/table_bt.tpl'), $vars);
    }
    
    public function html(){
        $vars = array();
        $vars['choices_user_ID'] = $this->user_per_party_overall();        
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'user_main_urVote/urVote.tpl'),$vars);
    }
  
}