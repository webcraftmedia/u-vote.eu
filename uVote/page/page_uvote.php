<?php

class page_uvote extends \SYSTEM\API\api_default {

    public static function default_page(){
        return new default_page();}        
        
    public static function action_open_bulletin ($poll_ID){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return new default_register ($poll_ID);}
        return new default_bulletin($poll_ID);}
        
    public static function action_user_main(){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return new default_register ();}
        return new user_main();}    
    
    public static function action_user_main_uVote(){
        return new user_main_uVote();}
    
    public static function action_user_main_urVote(){
        return new user_main_urVote();}
        
    public static function action_user_main_myVote(){
        return new user_main_myVote();}                         
}