<div id="statistics_uvote_users" style="width: 100%; padding-top:10px;">            
    
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_urVote_1">Übereinstimmung von Deiner uVote-Stimme & Politik</a>
                </h4>
            </div>
            <div id="collapse_urVote_1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div style="float: left; width: 49%;">
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
                    <div id="right_float" style="float: right; width: 44%;">
                    <div>${user_temp_votes}</div>
                    <br>
                    <div>${user_overall_votes}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_urVote_2">Deine Übereinstimmung mit dem Bundestag</a>
                </h4>
            </div>
            <div id="collapse_urVote_2" class="panel-collapse collapse">
                <div class="panel-body">
                    <div id="graph_bt_user_overall" style="float: left"></div>
                    <script type="text/javascript" language="JavaScript">load_visualisation_urvote('graph_bt_user_overall',84600);</script>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_urVote_3">Collapsible Group Item #3</a>
                </h4>
            </div>
            <div id="collapse_urVote_3" class="panel-collapse collapse">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>   
</div>
        
       