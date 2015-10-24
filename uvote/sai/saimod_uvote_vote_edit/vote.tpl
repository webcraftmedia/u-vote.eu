<div class="row" style="border: solid lightgray 1px;">    
    <div class="col-md-3" style="padding: 5px;">            
        <input id="input_poll_title" poll_ID="${ID}" type="text" value="${title}" style="width: 100%;">
        <input id="input_poll_link" type="text" value="${iframe_link}" style="width: 100%">
    </div>
    <div class="col-md-1">
        Nr.${ID}
    </div>
    <div class="col-md-1">
        <a class="btn btn-primary btn-small btn_editvote" style="float:right" poll_ID="${ID}">Edit</a>
    </div>
    <div class="col-md-4 ${bt_vote_class}" style="margin-top: 10px; border-left: 1px solid lightgray;">
        
    </div>
    <div class="col-md-1" style="margin-top: 10px; border-left: 1px solid lightgray;">
        uv
        <br>
        <span class="badge badge-success" style="">123</span>
        <br>
        <span class="badge badge-important" style="">123</span>
        <br>
        <span class="badge" style="">123</span>
    </div>
    <div class="col-md-2 ${vote_class}" style="margin-top: 10px; border-left: 1px solid lightgray;">            
    </div>
    <!--<div style="margin: 0; padding: 0; width: 3px;" >
        <table class="poll_time" time="${time_start}" style="width: 100%; height: 100%; margin: 0; padding: 0;">
            <tr id="time_start" style="height: ${time_start}%; background: white; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
            <tr id="time_end" style="height: ${time_end}%; background: blue; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
        </table>
    </div>-->
</div>