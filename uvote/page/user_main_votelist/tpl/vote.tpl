<div id="vote_main" class="row" style="margin: 0; margin-top: 25px; background: white; padding: 10px; ">
    <div class="row" style="margin: 0;">
        <div class="col-md-1">
            <img src="${frontend_logos}icon_urn_${vote_class}.png">
        </div>
        
        <div class="col-md-8">
            ${title}
        </div>
        <div class="col-md-1">
            <label class="label label-primary" style="padding: 5px">
            <span class="glyphicon glyphicon-info-sign"></span>
            ${statusmarker}
            </label>
            <br>
            <font size="1">${votecount}&nbsp;Stimme/n</font>
        </div>
        <div class="col-md-2">
            <a href="#!start(poll);poll.${ID}" class="btn btn-primary btn-small" poll_ID="${ID}"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Abstimmen</a>
        </div>
    </div>  
        <br>
    <div class="row" style="border-top: 1px solid #ccc">
        <div class="col-md-8" style="padding: 5px;">
            ${tags}
        </div>
    </div>
</div>



    
    
    