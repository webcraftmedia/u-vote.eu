<?php

class PageApi extends \SYSTEM\PAGE\PageClass {

    public static function default_page(){
        return new default_page();}
    
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
        return new \SYSTEM\SAI\saigui();}
    
}