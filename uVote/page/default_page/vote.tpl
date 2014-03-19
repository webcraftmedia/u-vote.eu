<div id="vote_main">
    <div id="vote_sub1">       
        <h5>${title}</h5>           
        <img src="${frontend_logos}icon_urn_${vote_class}.png">               
        <a class="btn btn-primary btn-small btn_vote" poll_ID="${ID}">${full_vote_btn}</a>
        <a class="btn btn-primary btn-small btn_fade" poll_ID="${ID}">${fade}</a>              
    </div>
    
    <div id="vote_data_panel${ID}" poll_ID="${ID}" style="display: none; float: left;">
        <div class="${bt_vote_class}" id="bt_vote_class_">            
            <img src="${frontend_logos}icon_bt.png" width="80">
            ${bt}            
        </div>
        <div class="${uv_vote_class}" id="uv_vote_class_">          
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
        <div id="vote_sub2">
        <div id="vote_sub3" class="poll_time" time="${time_end}">
            <div id="time_done" style="height: ${time_done}%;">
                <div id="vote_sub_3_1">
                </div>
            </div>
            <div id="time_left" style="height: ${time_left}%;">
                <div id="vote_sub_3_2">
                </div>
            </div>
        </div>
        </div>
</div>
