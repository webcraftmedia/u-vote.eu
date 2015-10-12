<?php

class page_uvote extends \SYSTEM\API\api_default {

    public static function default_page($_escaped_fragment_ = NULL){
        return (new default_page())->html($_escaped_fragment_);}
    
     public static function page_user_main_start(){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return (new default_register ())->html();}
        return (new user_main_start())->html();}
        
    public static function page_user_main_analysis(){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return (new default_register ())->html();}
        return (new user_main_analysis())->html();}
        
    public static function page_user_main_options(){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return (new default_register ())->html();}
        return (new user_main_options())->html();}    
    
    public static function page_user_main_poll($poll_ID) {
        //return (new user_main_poll($poll_ID))->html();}
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return (new default_register ())->html();}
        return (new user_main_poll($poll_ID))->html();}       
    
    public static function page_user_main_votelist(){
        if(!\SYSTEM\SECURITY\Security::isLoggedIn()){
            return (new default_register ())->html();}
        return (new user_main_votelist())->html();}
        
    public static function page_user_main_impressum(){
        return (new user_main_impressum())->html();}
    
}