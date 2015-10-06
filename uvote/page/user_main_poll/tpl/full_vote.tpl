<div class="row">
    <div class="col-md-4">
        <div class="row">
        <h4>${title}</h4>
        
        ${openvote_help_text}
        
        ${title} abstimmen.
        <hr>
        ${vote_buttons}
        <hr>
        ${voice_weight}
    </div>
    <hr>
    <div class="row">
        <div class="panel-group" id="poll_1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_1" href="#poll_1_body">Endergebnis</a>
                    </h4>
                </div>            
                <div class="panel-body" id="poll_1_body">
                    ${bars_user}<br>      
                    ${bars_bt}
                </div>            
            </div>
        </div>         
    </div>
    <hr>
    <div class="row">
        <div class="panel-group" id="poll_2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#poll_2" href="#poll_2_body">Ergebnis nach Fraktionen</a>
                    </h4>
                </div>            
                <div class="panel-body" id="poll_2_body">
                    
                    ${choice_party}
                </div>            
            </div>
        </div>     
    </div>
    </div>

    <div class="col-md-6">

    <div class="row" style="text-align: center;">       
        Quelle: <a href="${iframe_link}">${iframe_link} </a>
    </div>
    <div class="row" style="text-align: center;" id="iframe_">          
        <iframe src="${iframe_link}" width="730" height="4000"></iframe>
    </div>

    </div> 
    </div>


