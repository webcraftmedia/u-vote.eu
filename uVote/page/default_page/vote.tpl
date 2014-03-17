<div style="margin-bottom: 5px; width: 100%; min-height: 125px; border: solid lightgray 1px; background: beige;">
    <div style="float: left; width: 75%; padding: 5px; padding-top: 0;">       
        <h5>${title}</h5>           
        <img src="${frontend_logos}icon_urn_${vote_class}.png">               
        <a class="btn btn-primary btn-small btn_vote" poll_ID="${ID}">${full_vote_btn}</a>
        <a class="btn btn-primary btn-small btn_fade" poll_ID="${ID}">${fade}</a>              
    </div>
    
    <div id="vote_data_panel${ID}" poll_ID="${ID}" style="display: none; float: left;">
        <div class="${bt_vote_class}" style="float: left; width: 80px; border-left: 1px solid lightgray; padding-right: 2px; padding-left: 2px;">            
            <img src="${frontend_logos}icon_bt.png" width="80">
            ${bt}            
        </div>
        <div class="${uv_vote_class}" style="float: left; height: 125px; width: 60px; border-left: 1px solid lightgray; padding-right: 2px; padding-left: 2px;">          
            <img src="${frontend_logos}icon_urn.png" width="20">
            <span style="">
                <font size="2">uVote</font>
            </span>
            ${uv}
            <span class="badge" style="">
                ${uv_count}
            </span>
        </div>          
    </div>
        <div style="margin: 0; padding: 0; float: right;" >
        <div class="poll_time" time="${time_end}" style="width: 100%; height: 125px; margin: 0; padding: 0;">
            <div id="time_done" style="height: ${time_done}%; background: white; margin: 0; padding: 0;">
                <div style="width: 5px; margin: 0; padding: 0;">
                </div>
            </div>
            <div id="time_left" style="height: ${time_left}%; background: blue; margin: 0; padding: 0;">
                <div style="width: 5px; margin: 0; padding: 0;">
                </div>
            </div>
        </div>
        </div>
</div>
