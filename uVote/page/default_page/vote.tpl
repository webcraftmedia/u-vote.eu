<table style="margin-bottom: 5px; width: 95%; height: 100px; border: solid lightgray 1px; background: beige;">
    <tr> 
        <td class="${vote_class}" style="width: 10px; margin-top: 10px; border-left: 1px solid lightgray;">            
        </td>
        <td style="padding: 5px;">            
            <h4>${title}</h4>
            <a class="btn btn-primary btn-small btn_vote" style="" poll_ID="${ID}">${full_vote_btn}</a>
        </td>
        <td class="${bt_vote_class}" style="width: 80px; margin-top: 10px; border-left: 1px solid lightgray;">            
            <img src="${frontend_logos}icon_bt.png" width="80"/>
            ${bt}            
        </td>
        <td class="${uv_vote_class}" style="width: 50px; height: 100%; border-left: 1px solid lightgray;">          
            <img src="${frontend_logos}icon_urn.png" width="25"/><br/>
            ${uv}
            <span class="badge badge-info" style="">${uv_count}</span>
        </td>
        <td style="margin: 0; padding: 0; width: 3px;" >
            <table class="poll_time" time="${time_end}" style="width: 100%; height: 100%; margin: 0; padding: 0;">
                <tr id="time_done" style="height: ${time_done}%; background: white; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
                <tr id="time_left" style="height: ${time_left}%; background: blue; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
            </table>
        </td>
    </tr>
</table>
