<div class="hero-unit" style="padding: 5px; background: white; margin-bottom: 8px;">
    <div class="row" style="width: 100%; margin: auto;">           
        <div class="span6">
            <h2>${vote_title}</h2>
            <p>${vote_text}</p>
            <i class="icon-chevron-sign-down"></i>
        </div>

        <div class="span5" style="">
            <h2>Abstimmung</h2>             
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