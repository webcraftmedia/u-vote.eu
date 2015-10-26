<div id="vote_main" class="row" style="margin: 0; margin-top: 25px; background: white; padding: 10px; ">
    <div class="row" style="margin: 0;">
        <div class="col-md-1">
            <img src="${frontend_logos}icon_urn_${vote_class}.png">
        </div>
        
        <div class="col-md-8">
            <font size="1">Abstimmung im Bundestag: ${quick}</font><br>
            ${title}
        </div>
        <div class="col-md-1">
            <span class="glyphicon glyphicon-info-sign"></span>
            ${statusmarker}
            <br>
            <font size="1">${votecount}&nbsp;Stimme/n</font>
        </div>
        <div class="col-md-2">
            <a href="#!start(poll);poll.${ID}" class="btn btn-primary btn-small" poll_ID="${ID}"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Abstimmen</a>
        </div>
    </div>  
        
    <div class="row" style="border-bottom: 1px solid #ccc">
        <div class="col-md-8" style="padding: 5px;">
            ${tags}
        </div>
    </div>
</div>



    
    
    