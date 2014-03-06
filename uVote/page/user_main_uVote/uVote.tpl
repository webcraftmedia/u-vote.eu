<div style="width: 100%;">
     ${welcome_text}
    <div style="float: left;">
        <table style="border-collapse: separate; border-spacing: 10px 5px; width: 350px;">           
            <tr>
             <h5>Übereinstimmung von uVote & Politik</h5>
             ${uvote_to_bt}
             </tr>
        </table>
    </div>
    <div id="graph_bt_uv_overall" style="float: left; width: 300px;"></div>
    <script type="text/javascript" language="JavaScript">load_visualisation('graph_bt_uv_overall',84600);</script>
</div>
<div style="clear: both"></div>
<div style="width: 50%; margin-bottom: 30px; float: left;">   
    <h5>Entscheidungsverhalten der uVote Community</h5>
    <span style="">
    ${votes_all}
    </span>
    <span style="">  Wie oft die uVote Community 
        <br>  insgesamt Dafür, Dagegen oder 
        <br>  Enthaltung gestimmt hat.</span>
</div>
<div style="width: 50%; float: right;">
    <h5>Entscheidungsverhalten des Bundestags</h5>
    <span style="">
    ${votes_all_bt}
    </span>
    <span style="">  Wie oft der Bundestag 
        <br>  Dafür, Dagegen oder 
        <br>  Enthaltung gestimmt hat.</span>    
</div>

    <div style="clear: both; height: 50px;">
    </div>
    <div>
        <span class="badge badge-info">${user_count}</span> Nutzer auf uVote
    </div>