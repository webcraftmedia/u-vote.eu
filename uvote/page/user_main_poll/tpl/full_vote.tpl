
<div class="col-md-4" style="padding: 0; margin: 0;">       
    <div class="row">
        <div class="panel-group" id="poll_3">
            <div class="panel panel-default panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_3" href="#poll_3_body"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;&nbsp;Info</a>
                    </h4>
                </div>            
                <div class="panel-body row" id="poll_3_body">
                    <div class="col-md-12">
                        <h4 style="word-break: break-all;">${title}</h4>
                        ${openvote_help_text}
                        ${title} abstimmen.
                    </div>
                </div>            
            </div>
        </div>         
    </div>
    <div class="row" style="padding: 0; margin: 0;">
        <div class="panel-group" id="poll_7">
            <div class="panel panel-default panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_7" href="#poll_7_body"><i class="glyphicon glyphicon-paperclip"></i>&nbsp;&nbsp;Änderungsanträge</a>
                    </h4>
                </div>     
            <div class="panel-body panel-collapse collapse" id="poll_7_body" style="padding: 0;">                
                <div class="row" style="padding: 0; margin: 0;">
                    <div class="row">
                        <div class="col-md-12" style="padding-bottom: 10px;">
                            ${sub_buttons}
                        </div>
                    </div>

                </div>            
            </div>
        </div>         
    </div>
    </div>
    <div class="row" style="padding: 0; margin: 0;">
        <div class="panel-group" id="poll_6">
            <div class="panel panel-default panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_6" href="#poll_6_body"><i class="glyphicon glyphicon-stats"></i>&nbsp;&nbsp;Statistik</a>
                    </h4>
                </div>     
            <div class="panel-body panel-collapse collapse" id="poll_6_body" style="padding: 0;">                
    <div class="row" style="padding: 0; margin: 0;">
        <div class="panel-group" id="poll_1" style="padding: 0; margin: 0;">
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
    <div class="row" style="padding: 0; margin: 0;">
        <div class="panel-group" id="poll_2" style="padding: 0; margin: 0;">
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

    <div class="col-md-8" style="height: 100%">
        
        
        <div class="row">
            <div class="panel-group" id="poll_4">
                <div class="panel panel-default panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#poll_4" href="#poll_4_body"><i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Abstimmen</a>
                        </h4>
                    </div>            
                    <div class="panel-body" id="poll_4_body">
                        <div class="row">
                            ${vote_buttons}
                            ${voice_weight}
                        </div>
                    </div>            
                </div>
            </div>     
        </div>
        
    <div class="row" style="text-align: center;">       
        Quelle: <a href="${iframe_link}">${iframe_link} </a>
    </div>
    <div class="row" style="text-align: center;">          
        <iframe id="poll_frame" class="col-md-12" height="700" style="padding: 0;  overflow-y: scroll;" src="${iframe_link}"></iframe>
    </div>

    </div> 


