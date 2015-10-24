<div class="row">
    <div class="col-md-8">
        <h5>Ändere deine Stimme hier ab</h5>
        <button id="btnvote_yes" class="btn btn-success btn_vote ${yes} btn-default btnvote_yes"
           style=""                                     
           poll_ID="${poll_ID}"><font 
           size="3"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp;Pro</font></button>
        <button id="btnvote_no" class="btn btn-danger btn_vote ${no} btn-default btnvote_no" 
           style="" 
           href="#" 
           poll_ID="${poll_ID}"><font 
           size="3"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Contra</font></button>
        <button id="btnvote_off" class="btn btn-info btn_vote ${ent} btn-default btnvote_off" 
           style="" 
           href="#" 
           poll_ID="${poll_ID}"><font 
           size="3"><span class="glyphicon glyphicon-ban-circle"></span>&nbsp;Enthaltung</font></button>
    </div>
    <div class="col-md-4">
        <h5>Abgestimmt mit:</h5>
        <img class="img-responsive" src="${frontend_logos}icon_urn${choice}.png"/>
        
    </div>
</div>
