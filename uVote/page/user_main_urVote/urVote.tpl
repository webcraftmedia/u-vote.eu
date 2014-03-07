<div id="statistics_uvote_users"> 
    <h5>${urVote_title}</h5>
    ${urvote_body_text}
    <div style="float: left;">
    <table style="border-collapse: separate;
        border-spacing: 10px 5px; width: 350px;"> 
        <tr>
        <h5>${urVote_user_party_compare}</h5>
        ${urvote_user_party_compare_sub}
        ${choices_user_ID}
        </tr>
        
        <tr>
        ${choices_bt_to_user}
        </tr>               
    </table>
    </div>
        <div style="margin-left: 40px; float: left;">
             ${user_temp_votes}
        </div>
        <div style="margin-left: 40px; float: left;">
             ${user_overall_votes}
        </div>
        <div id="graph_bt_user_overall" style=""></div>
    <script type="text/javascript" language="JavaScript">load_visualisation_urvote('graph_bt_user_overall',84600);</script>
</div>
        
       