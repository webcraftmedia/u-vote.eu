
    <div class="col-md-4">       
    <div class="row">
        <div class="panel-group" id="poll_3">
            <div class="panel panel-default panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_3" href="#poll_3_body">Info</a>
                    </h4>
                </div>            
                <div class="panel-body" id="poll_3_body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="word-break: break-all;">${title}</h4>

                            ${openvote_help_text}

                            ${title} abstimmen.
                            <hr>
                            ${voice_weight}
                        </div>
                    </div>
                </div>            
            </div>
        </div>         
    </div>
    <div class="row">
        <div class="panel-group" id="poll_6">
            <div class="panel panel-default panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_6" href="#poll_6_body">Statistik</a>
                    </h4>
                </div>     
            <div class="panel-body panel-collapse" id="poll_6_body">
                
    <div class="row">
        <div class="panel-group" id="poll_1">
            <div class="panel panel-default panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_1" href="#poll_1_body">Endergebnis</a>
                    </h4>
                </div>            
                <div class="panel-body panel-collapse collapse" id="poll_1_body">
                    ${bars_user}<br>      
                    ${bars_bt}
                </div>            
            </div>
        </div>         
    </div>
    <div class="row">
        <div class="panel-group" id="poll_2">
            <div class="panel panel-default panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_2" href="#poll_2_body">Ergebnis nach Fraktionen</a>
                    </h4>
                </div>            
                <div class="panel-body panel-collapse collapse" id="poll_2_body">
                    ${choice_party}
                </div>            
            </div>
        </div>     
    </div>
                </div>            
            </div>
        </div>         
    </div>
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="panel-group" id="poll_4">
                <div class="panel panel-default panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#poll_4" href="#poll_4_body">Abstimmen</a>
                        </h4>
                    </div>            
                    <div class="panel-body" id="poll_4_body">
                        <div class="row">
                            ${vote_buttons}
                        </div>
                    </div>            
                </div>
            </div>     
        </div>
        
    <div class="row" style="text-align: center;">       
        Quelle: <a href="${iframe_link}">${iframe_link} </a>
    </div>
    <div class="row" style="text-align: center;" id="iframe_">          
        <iframe class="col-md-12" height="700" style="padding: 0;  overflow-y: scroll;" src="${iframe_link}"></iframe>
    </div>

    </div> 


