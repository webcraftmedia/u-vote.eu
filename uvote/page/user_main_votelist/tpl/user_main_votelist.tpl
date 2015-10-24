<div class="row panel-group row" style="">
    <div class="panel panel-default panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;Abstimmen
                
            </h4>
        </div>
        <div class="panel-body">
            ${votelist_disclaimer}
        </div>
    </div>
    </div>
    
</div>
            
<div class="panel-group row" id="filter_panel" style="margin-top: 15px;">
    <div class="panel panel-default panel-warning">
        <div class="panel-heading" style="padding: 0" >
            <a id="a_filter_panel" class="acc_toggle" data-toggle="collapse" data-parent="#filter_panel" href="#filter_panel_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-filter"></span>&nbsp;&nbsp;&nbsp;Filter
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="filter_panel_body" class="row panel-body panel-collapse collapse">${filterlist}</div>
    </div>
</div>
<div class="panel-group row" id="list_panel" style="margin-top: 15px;">
    <div class="panel panel-default panel-info">
        <div class="panel-heading" style="padding: 0" >
            
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-search"></span>&nbsp;
                        <input type="text" id="list_text_search" placeholder="Suche..."/>
                        <button id="btn_text_search" type="button" class="btn btn-sm btn-primary">anfragen</button>
                    </h4>
                </div>
         
        </div>
        <div id="list_panel_body" class="row panel-body panel-collapse">
            <div id="list_frame" class="row">
                ${votelist}
            </div>
        </div>
    </div>
</div>            
            
