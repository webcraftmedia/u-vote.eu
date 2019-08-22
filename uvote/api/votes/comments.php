<?php

class comments {
    public static function getUserComments($poll_ID, $c_choice){
        return \SQL\UVOTE_GENERATE_COMMENTS_PER_POLL::QA(array($poll_ID, $c_choice));}
        
    public static function insertUserComment($c_choice, $poll_ID, $user_ID, $c_txt, $c_src, $timestamp){
        return \SQL\UVOTE_DATA_USER_COMMENT_INSERT::QI(array($c_choice, $poll_ID, $user_ID, $c_txt, $c_src, $timestamp));}
        
    public static function get_commentrate($c_ID, $val){
        return \SQL\UVOTE_DATA_USER_COMMENTRATE_PER_COMMENT::Q1(array($c_ID, $val));}
    
    public static function write_comment($poll_ID, $c_choice, $c_txt, $c_src){
        if(!\SYSTEM\SECURITY\security::isLoggedIn()){
            throw new ERROR("You need to be logged in.");}
        return \SQL\UVOTE_DATA_USER_COMMENT_INSERT::Q1(array($c_choice, $poll_ID, \SYSTEM\SECURITY\security::getUser()->id, utf8_encode($c_txt), $c_src));}
        
    public static function write_commentrate($c_ID, $val){
        if(!\SYSTEM\SECURITY\security::isLoggedIn()){
            throw new ERROR("You need to be logged in.");}
        return \SQL\UVOTE_DATA_USER_COMMENTRATE_INSERT::Q1(array($c_ID, \SYSTEM\SECURITY\security::getUser()->id, $val, $c_ID, \SYSTEM\SECURITY\security::getUser()->id, $val));}
}
