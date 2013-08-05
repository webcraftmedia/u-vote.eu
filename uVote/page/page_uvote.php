<?php

class page_uvote extends \SYSTEM\API\api_default {

    public static function default_page(){
        return new default_page();}
    
    public static function action_myvote(){
        return new default_myvote();}
    
    public static function action_media(){      
        throw new ERROR("test");
    }
    
    public static function action_googlemaps(){      
        return new googlemaps();
    }
    
    public static function action_osm(){      
        return new osm();
    }
    
    public static function action_test(){      
        return new default_page();
    }
    
    public static function action_prices(){      
        return new default_prices();}
    
    public static function action_contact(){      
        return new default_contact();}
    
    public static function action_certificates(){      
        return new default_certificates();}
        
    public static function action_partners(){      
        return new default_partners();
    }
    
    public static function action_developer(){
        require_once '../system/sai/autoload.inc.php';        
        //require_once 'dasense/sai/autoload.inc.php';
        //require_once 'dasense/sai/register_modules.php';
        return new \SYSTEM\SAI\saigui();}
                
     public static function action_openinfo($poll_ID){
        return new default_openinfo($poll_ID);}
    
}