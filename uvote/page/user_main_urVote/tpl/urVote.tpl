<div id="statistics_uvote_users" class="row">               
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    ${urVote_title}
                </h4>
            </div>            
            <div class="panel-body">
                ${urvote_body_text}
            </div>            
        </div>
            <div class="row" style="padding-top: 30px;">
            <div class="row-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_urVote_1">Übereinstimmung von Deiner uVote-Stimme & Politik</a>
                </h4>
            </div>
            <div id="collapse_urVote_1" class="row">
                    <div class="col-md-6">
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
                    <div id="right_float" class="col-md-6">
                    <div>${user_temp_votes}</div>
                    <br>
                    <div>${user_overall_votes}</div>
                    
                </div>
            </div>
                    <div id="graph_bt_user_overall" class="row"></div>
            <script type="text/javascript" language="JavaScript">load_visualisation_urvote('graph_bt_user_overall',84600);</script> 
        </div>
                          
    </div>   
</div>
        
       