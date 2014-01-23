<div class="${vote_class}" style="padding: 5px; margin-bottom: 8px; border: 2px solid #ccc; float: left;">
    <div class="row" style="width: 100%; margin: 0; margin-top: 5px; margin-bottom: 8px;">    
        <div class="span6">
            <h4>${vote_title}</h4>
            Initiiert von: ${vote_init}
            <br>
            Politikfeld(er):
        </div>
        <a class="btn btn_primary btn_vote" poll_ID="${poll_ID}" style="float: right; margin-top: 10px;">Abstimmen</a>            
         <!--<div class="span5" style="margin-top: 15px;">            
            <a class="btn btn-large btn-green btnvote_yes" style="width: 110px;" poll_ID="$">Pro &raquo;</a>
            <a class="btn btn-large btn-red btnvote_no" style="width: 110px; background-color: red;" href="#" poll_ID="$">Contra &raquo;</a>
            <a class="btn btn-large btn-grey btnvote_off" style="width: 110px; background-color: grey;" href="#" poll_ID="$">Enthaltung &raquo;</a>-->
            
            <!-- Countdown-Generator by www.coolplace.cc -->
           <!-- <div class="progress">                        
                <div class="bar countdownbar" pollid="$" style="width: 0%;">                     
                </div>
                <div class="countdown"></div>
            </div>-->   
        </div>           
            <div class="span5" id="openvoteinfo${poll_ID}" style="margin: 0; display: none; width: 100%; margin-top: 15px;">
                
            </div>  
        
            </div>
