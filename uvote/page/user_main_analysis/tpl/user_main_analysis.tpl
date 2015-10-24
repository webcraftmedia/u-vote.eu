<div class="panel-group row" id="acc_1">
    <div class="panel panel-default panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="glyphicon glyphicon-cd"></i>&nbsp;&nbsp;${urVote_title}
            </h4>
        </div>            
        <div class="panel-body" id="acc_1_body">
            <div class="col-md-8">
                ${urvote_body_text}
            </div>
            <div class="col-md-4" style="border-left: #d9edf7 solid 2px">
                ${urvote_info_info_1}
                <span class="glyphicon glyphicon-info-sign"></span>
                ${urvote_info_info_2}
                <span class="glyphicon glyphicon-certificate"></span>
                ${urvote_info_info_3}
            </div>
        </div>            
    </div>
</div>
<div class="row">
    <h3>Deine Statistik</h3>
</div>
<div class="panel-group row" id="acc_2" style="">
    <div class="panel panel-default panel-success">
        <div class="panel-heading" style="padding: 0" >
            <a id="a_acc_2" class="acc_toggle" data-toggle="collapse" data-parent="#acc_2" href="#acc_2_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Deine Daten
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_2_body" class="row panel-body panel-collapse collapse"></div>
    </div>
</div>
<div class="panel-group row" id="acc_13" style="padding-top: 10px;">
    <div class="panel panel-default panel-info">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_13" class="acc_toggle" data-toggle="collapse" data-parent="#acc_13" href="#acc_13_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;&nbsp;Gesamtsituation
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_13_body" class="row panel-body panel-collapse collapse">
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-4">
                    <h4>"Dein" Bundestag</h4>
                    <hr>
                    <div id="donut_user_to_party_overall" class="row" style="padding: 0; margin: 0;"></div>
                </div>
                <div class="col-md-4">
                    <h4>Der Bundestag</h4>
                    <hr>
                    <div id="donut_bt_to_party_overall" class="row" style="padding: 0; margin: 0;"></div>
                </div>
                <div class="col-md-4">
                    <h4>die uvote community</h4>
                    <hr>
                    <div id="donut_community_to_party_overall" class="row" style="padding: 0; margin: 0;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_party_donut}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_party_donut}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-group row" id="acc_3" style="padding-top: 10px;">
    <div class="panel panel-default panel-warning">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_3" class="acc_toggle" data-toggle="collapse" data-parent="#acc_3" href="#acc_3_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Bilanz: Fraktionen
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_3_body" class="row panel-body panel-collapse collapse"></div>
    </div>
</div>

            
<div class="panel-group row" id="acc_4" style="padding-top: 10px;">
    <div class="panel panel-default panel-warning">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_4" class="acc_toggle" data-toggle="collapse" data-parent="#acc_4" href="#acc_4_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;&nbsp;Bilanz: Fraktionen nach Stimmverhalten
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_4_body" class="row panel-collapse collapse panel-body" style="padding-top: 20px;"></div>
    </div>
</div>
<div class="row panel-group" id="acc_5" style="padding-top: 10px;">               
    <div class="panel panel-default panel-danger">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_5" class="acc_toggle" data-toggle="collapse" data-parent="#acc_5" href="#acc_5_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-random"></span>&nbsp;&nbsp;&nbsp;Entwicklung: Fraktionen
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_5_body" class="panel-body panel-collapse collapse">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <img class="img-responsive" src="${frontend_logos}icon_cdu.png"/>
                    </div>
                    <div id="graph_user_to_party_overall_cdu" class="row"></div>
                    <hr>
                    <div class="row">
                        <img class="img-responsive" src="${frontend_logos}icon_csu.png"/>
                    </div>
                    <div id="graph_user_to_party_overall_csu" class="row"></div>
                    <hr>
                    <div class="row">
                        <img class="img-responsive" src="${frontend_logos}icon_spd.png"/>
                    </div>
                    <div id="graph_user_to_party_overall_spd" class="row"></div>
                    <hr>
                    <div class="row">
                        <img class="img-responsive" src="${frontend_logos}icon_gruene.png"/>
                    </div>
                    <div id="graph_user_to_party_overall_gruene" class="row"></div>
                    <hr>
                    <div class="row">
                        <img class="img-responsive" src="${frontend_logos}icon_linke.png"/>
                    </div>
                    <div id="graph_user_to_party_overall_linke" class="row"></div>
                </div>
                    <div class="col-md-3" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                        <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                        ${analysis_help_overtime_party}
                        <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                        ${analysis_math_overtime_party}
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-group row" id="acc_6" style="padding-top: 10px;">
    <div class="panel panel-default panel-warning">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_6" class="acc_toggle" data-toggle="collapse" data-parent="#acc_6" href="#acc_6_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Bilanz: Bundestag
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_6_body" class="row panel-body panel-collapse collapse"></div>
    </div>
</div>
<div class="panel-group row" id="acc_12" style="padding-top: 10px;">
    <div class="panel panel-default panel-warning">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_12" class="acc_toggle" data-toggle="collapse" data-parent="#acc_12" href="#acc_12_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;&nbsp;Bilanz: Bundestag nach Stimmverhalten
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_12_body" class="row panel-body panel-collapse collapse"></div>
    </div>
</div>
<div class="row panel-group" id="acc_7" style="padding-top: 10px;">               
    <div class="panel panel-default panel-danger">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_7" class="acc_toggle" data-toggle="collapse" data-parent="#acc_7" href="#acc_7_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-random"></span>&nbsp;&nbsp;&nbsp;Entwicklung: Bundestag
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_7_body" class="panel-body panel-collapse collapse">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <img class="img-responsive" src="${frontend_logos}icon_bt.png"/>
                    </div>
                    <div id="graph_user_to_party_overall_bt" class="row"></div>
                </div>
                <div class="col-md-3" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_overtime_bt}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_overtime_bt}
                </div>
                <hr>
            </div>
        </div>   
    </div>
</div>
<div class="row">
    <h3>community Statistik</h3>
</div>
<div class="row panel-group" id="acc_8" style="padding-top: 10px;">               
    <div class="panel panel-default panel-success">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_8" class="acc_toggle" data-toggle="collapse" data-parent="#acc_8" href="#acc_8_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                        <span class="glyphicon glyphicon-cloud"></span>&nbsp;&nbsp;&nbsp;community Daten
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_8_body" class="panel-body panel-collapse collapse"></div>
    </div>
</div>
<div class="row panel-group" id="acc_9" style="padding-top: 10px;">               
    <div class="panel panel-default panel-warning">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_9" class="acc_toggle" data-toggle="collapse" data-parent="#acc_9" href="#acc_9_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                        <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;community-Bilanz: Fraktionen
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_9_body" class="panel-body panel-collapse collapse"></div>   
    </div>
</div>
<div class="row">
    <h3>Bundestag Statistik</h3>
</div>
<div class="row panel-group" id="acc_10" style="padding-top: 10px;">               
    <div class="panel panel-default panel-success">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_10" class="acc_toggle" data-toggle="collapse" data-parent="#acc_10" href="#acc_10_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                        <span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;&nbsp;Bundestag Daten
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_10_body" class="panel-body panel-collapse collapse"></div>   
    </div>
</div>
<div class="row panel-group" id="acc_11" style="padding-top: 10px;">               
    <div class="panel panel-default panel-warning">
        <div class="panel-heading" style="padding: 0">
            <a id="a_acc_11" class="acc_toggle" data-toggle="collapse" data-parent="#acc_11" href="#acc_11_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                        <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Bundestag-Bilanz: Fraktionen
                        <i style="float: right" class="glyphicon glyphicon-circle-arrow-down"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div id="acc_11_body" class="panel-body panel-collapse collapse">
            
        </div>   
    </div>
</div>