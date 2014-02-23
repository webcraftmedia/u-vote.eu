<table style="margin-bottom: 5px; width: 95%; height: 100px; border: solid lightgray 1px; background: beige;">
    <tr>        
        <td style="padding: 5px;">            
            <h4>${title}</h4>
            Nr.${ID}
            <a class="btn btn-primary btn-small btn_vote" style="float:right" poll_ID="${ID}">${full_vote_btn}</a>
        </td>
        <td class="${bt_vote_class}" style="width: 80px; margin-top: 10px; border-left: 1px solid lightgray;">            
            <img src="${frontend_logos}icon_cdu.png" width="30"/><span class="badge ${choice_class_cdu}" style="float:right;">${cdu}</span><br/>
            <img src="${frontend_logos}icon_csu.png" width="30"/><span class="badge ${choice_class_csu}" style="float:right;">${csu}</span><br/>
            <img src="${frontend_logos}icon_spd.png" width="30"/><span class="badge ${choice_class_spd}" style="float:right;">${spd}</span><br/>
            <img src="${frontend_logos}icon_gruene.png" width="30"/><span class="badge ${choice_class_gruene}" style="float:right;">${gruene}</span><br/>
            <img src="${frontend_logos}icon_linke.png" width="30"/><span class="badge ${choice_class_linke}" style="float:right;">${linke}</span>
        </td>
        <td class="${uv_vote_class}" style="width: 30px; margin-top: 10px; border-left: 1px solid lightgray;">
            uv
            <span class="badge badge-success" style="float:right;">${uv_pro}</span>
            <span class="badge badge-important" style="float:right;">${uv_con}</span>
            <span class="badge" style="float:right;">${uv_ent}</span>
        </td>
        <td class="${vote_class}" style="width: 20px; margin-top: 10px; border-left: 1px solid lightgray;">            
        </td>
        <td style="margin: 0; padding: 0; width: 3px;" >
            <table class="poll_time" time="${time_end}" style="width: 100%; height: 100%; margin: 0; padding: 0;">
                <tr id="time_done" style="height: ${time_done}%; background: white; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
                <tr id="time_left" style="height: ${time_left}%; background: blue; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
            </table>
        </td>
    </tr>
</table>
