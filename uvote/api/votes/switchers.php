<?php
class switchers{
    public static function get_party_per_poll($choice){
        switch($choice){
            case 1:
                return 'pro';
            case 2:
                return 'con';
            case 3:
                return 'ent';
            default:
                return 'none';
        }           
    }
    
    public static function tablerow_class($choice){
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
    public static function tablerow_class_full($choice){
        switch($choice){
            case 1:
                return 'pro';
            case 2:
                return 'contra';
            case 3:
                return 'enthaltung';
            default:
                return '';
        }        
    }
    
    public static function badge_class($choice){
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
    public static function bar_class($choice){
        switch($choice){
                case 1:
                    return 'progress-bar-success';
                case 2:
                    return 'progress-bar-danger';
                case 3:
                    return 'progress-bar-info';
                case 0:
                    return 'progress-bar';
            }
    }
    public static function bar_ico_class($choice){
        switch($choice){
                case 1:
                    $bar = 'progress-bar-success';
                    $icon_type = 'pro';
                    break;
                case 2:
                    $bar = 'progress-bar-danger';
                    $icon_type = 'con';
                    break;
                case 3:
                    $bar = 'progress-bar-info';
                    $icon_type = 'ent';
                    break;
                case 0:
                    $bar = 'progress-bar';
            }
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

