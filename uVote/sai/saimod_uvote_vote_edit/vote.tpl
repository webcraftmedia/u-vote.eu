<tr style="border: solid lightgray 1px;">    
    <td style="padding: 5px;">            
        ${title}                
    </td>
    <td>
        Nr.${ID}
    </td>
    <td>
        <a class="btn btn-primary btn-small btn_editvote" style="float:right" poll_ID="${ID}">Edit</a>
    </td>
    <td class="${bt_vote_class}" style="width: 80px; margin-top: 10px; border-left: 1px solid lightgray;">            
        cdu<span class="badge badge-success" style="float:right;">123</span><br/>
        csu<span class="badge badge-important" style="float:right;">123</span><br/>
        spd<span class="badge" style="float:right;">123</span><br/>
        grüne<span class="badge badge-success" style="float:right;">123</span><br/>
        linke<span class="badge badge-important" style="float:right;">123</span>
    </td>
    <td class="" style="width: 30px; margin-top: 10px; border-left: 1px solid lightgray;">
        uv
        <span class="badge badge-success" style="float:right;">123</span>
        <span class="badge badge-important" style="float:right;">123</span>
        <span class="badge" style="float:right;">123</span>
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