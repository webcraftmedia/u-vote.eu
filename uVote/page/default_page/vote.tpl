<div class="hero-unit" style="padding: 5px; background: white; margin-bottom: 8px; -webkit-box-shadow: 1px 1px 4px 1px rgba(0, 0, 0, 0.5);
box-shadow: 1px 1px 4px 1px rgba(0, 0, 0, 0.5);">
    <div class="row" style="width: 100%; margin: auto;">           
        <div class="span6">
            <h3>${vote_title}</h3>
            
            <div class="span5" id="openvoteinfo" style="margin: 0; display: none;">
                <p>${vote_text}</p>
            </div>
            <button class="btn btn-mini btn_openvoteinfo" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
        </div>

        <div class="span5" style="margin-top: 15px;">            
            <a class="btn btn-large btn-green btnvote_yes" style="width: 110px;" poll_ID="${poll_ID}">Pro &raquo;

            </a>

            <a class="btn btn-large btn-red btnvote_no" style="width: 110px; background-color: red;" href="#" poll_ID="${poll_ID}">Contra &raquo;</a>
            <a class="btn btn-large btn-grey btnvote_off" style="width: 110px; background-color: grey;" href="#" poll_ID="${poll_ID}">Enthaltung &raquo;</a>
            
            <!-- Countdown-Generator by www.coolplace.cc -->
            <form name="coolcccount">            
                    <input size="120" name="coolcc">
            </form>
            
        </div>            
    </div>           
</div>