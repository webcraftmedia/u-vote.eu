<?php

class page_uvote extends \SYSTEM\API\api_default {

    public static function default_page($_escaped_fragment_ = NULL){
        return (new default_page())->html($_escaped_fragment_);}
        
    public static function page_open_bulletin ($poll_ID){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return (new default_register ())->html();}
        return (new default_bulletin($poll_ID))->html();}
        
    public static function page_user_main(){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return (new default_register ())->html();}
        return (new user_main())->html();}
        
    public static function page_user_list(){
        return (new user_list())->html();}
    
    public static function page_user_list_active(){
        return (new user_list_active())->html();}
    
    public static function page_user_list_ended(){
        return (new user_list_ended())->html();}
    
    public static function page_user_main_urVote(){
        return (new user_main_urVote())->html();}
        
    public static function page_user_main_myVote(){
        return (new user_main_myVote())->html();}
}