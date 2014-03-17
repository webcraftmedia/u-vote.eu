<div style="width: 100%; padding-top: 10px;">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Welcome
                </h4>
            </div>            
            <div class="panel-body">
                ${welcome_text}
            </div>            
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Übereinstimmung von uVote & Politik</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
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
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Entscheidungsverhalten der uVote Community / Bundestag</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
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
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">uVote Community</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">                    
                    <span class="badge badge-info">${user_count}</span> Nutzer auf uVote
                </div>
            </div>
        </div>
    </div>                       
</div>
