<table class="table" style="display: table; margin-bottom: 5px; float: left; width: 95%; height: 100px;"> 
    <div style="margin: 0; margin-top: 5px; margin-bottom: 8px;">    
    <tr>        
        <td class="" style="">
            <a class="btn btn-primary btn-small btn_vote" style="float:right" poll_ID="${ID}">${full_vote_btn}</a>
            <h4>${title}</h4>
             Nr.${ID}         
        </td>
        <td class="${vote_class}" style="width: 20px; margin-top: 10px; border-left: 2px solid black;"></td>
        <td style="margin: 0; padding: 0; width: 3px;" >
            <table class="poll_time" time="${time_end}" style="width: 100%; height: 100%; margin: 0; padding: 0;">
                <tr id="time_done" style="height: ${time_done}%; background: white; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
                <tr id="time_left" style="height: ${time_left}%; background: blue; margin: 0; padding: 0;"><td style="width: 1px; margin: 0; padding: 0;"></td></tr>
            </table>
        </td>
    </tr>            
</table>
