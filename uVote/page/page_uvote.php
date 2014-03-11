<?php

class page_uvote extends \SYSTEM\API\api_default {

    public static function default_page(){
        return new default_page();}        
        
    public static function action_open_bulletin ($poll_ID){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return new default_register ();}
        return new default_bulletin($poll_ID);}
        
    public static function action_user_main(){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return new default_register ();}
        return new user_main();}
        
    public static function action_user_list(){
        return new user_list();}
    
    public static function action_user_list_active(){
        return new user_list_active();}
    
    public static function action_user_list_ended(){
        return new user_list_ended();}
    
    public static function action_user_main_urVote(){
        return new user_main_urVote();}
        
    public static function action_user_main_myVote(){
        return new user_main_myVote();}                         
}