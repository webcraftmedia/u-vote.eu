<?php

class default_page extends SYSTEM\PAGE\Page {
    
    private function js(){        
        return '<script src="'.SYSTEM\WEBPATH(new PPAGE(),'default_page/js/timer.js').'"></script>';
    }      
        
    public function generate_votelist(){
        return '<div class="hero-unit" style="padding: 5px; background: white;">
            <div class="row" style="width: 100%; margin: auto;">           
                <div class="span6">
                    <h2>Title</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper.</p>
                    <i class="icon-chevron-sign-down"></i>
                </div>

                <div class="span5" style="">
                    <h2>Abstimmung</h2>             
                    <a class="btn btn-large btn-green" style="width: 110px;" href="#">Pro &raquo;</a>
                    <a class="btn btn-large btn-red" style="width: 110px; background-color: red;" href="#">Contra &raquo;</a>
                    <a class="btn btn-large btn-grey" style="width: 110px; background-color: grey;" href="#">Enthaltung &raquo;</a>
            <!-- Countdown-Generator by www.coolplace.cc -->

    <form name="coolcccount">
      <p>
        <input size="75" name="coolcc">

    </form>

            </div>            
        </div>           
       </div>
        <div class="hero-unit" style="padding: 5px; background: white; margin-top: -20px;">
            <div class="row" style="width: 100%; margin: auto;">           
                <div class="span6">
                    <h2>Title</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper.</p>
                        <i class="icon-chevron-sign-down"></i>
                </div>
                <div class="span5" style="">
                    <h2>Abstimmung</h2>
                    <a class="btn btn-large btn-green" style="width: 110px;" href="#">Pro &raquo;</a>
                    <a class="btn btn-large btn-red" style="width: 110px; background-color: red;" href="#">Contra &raquo;</a>
                    <a class="btn btn-large btn-grey" style="width: 110px; background-color: grey;" href="#">Enthaltung &raquo;</a>
                </div>
            </div>
        </div>  
      </div>';
    }
    
    public function html(){
        $vars = array();               
        $vars['js'] = $this->js(); 
        $vars['votelist'] = $this->generate_votelist();
        $vars['PIC_PATH'] = SYSTEM\WEBPATH(new PPAGE(),'default_page/pics/');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_page/page.html'), $vars);
        
    }
}