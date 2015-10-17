         
    <div class="panel-group row" id="acc_1">
        <div class="panel panel-default panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    ${urVote_title}
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
    <div class="panel-group row" id="acc_2" style="padding-top: 30px;">
        <div class="panel panel-default panel-success">
            <div class="panel-heading" style="padding: 0" >
                <a data-toggle="collapse" data-parent="#acc_2" href="#acc_2_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Deine Daten
                </h4>
                
                </div>
                    </a>
            </div>
            <div id="acc_2_body" class="row panel-body panel-collapse collapse">
            <div class="row">
                <div class="col-md-8">
                    ${basic_stats}
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left:#d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_basic_stats}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_basic_stats}
                </div>
            </div>
                <hr>
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-8">
                    <div>${user_temp_votes}</div>
                    <br>
                    <div>${user_overall_votes}</div>
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_basic_votes}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_basic votes}
                </div>
            </div>
            
            </div>
        </div>
    </div>
    <div class="panel-group row" id="acc_4" style="padding-top: 10px;">
        <div class="panel panel-default panel-warning">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_4" href="#acc_4_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Bilanz: Fraktionen
                </h4>
                </div>
                </a>
            </div>
            <div id="acc_4_body" class="row panel-body panel-collapse collapse">
                <div class="row">
                <div class="col-md-8">
                    <h4>Absolute Übereinstimmungsrate</h4>
                    <hr>
                    <font size="1">auf ? clicken für Details</font>
                    <br>
                    <br>
                    ${choices_user_ID}
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_user_to_party_overall}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_user_to_party_overall}
                </div>
                </div>
                <hr>
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-8">
                    <h4>Relative Übereinstimmung</h4>
                    <hr>
                    <div id="donut_user_to_party_overall" class="row" style="padding: 0; margin: 0;"></div>
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_party_donut}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_party_donut}
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="panel-group row" id="acc_5" style="padding-top: 10px;">
        <div class="panel panel-default panel-warning">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_5" href="#acc_5_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;&nbsp;Bilanz: Fraktionen nach Stimmverhalten
                </h4>
                </div>
                </a>
            </div>
            <div id="acc_5_body" class="row panel-collapse collapse panel-body" style="padding-top: 20px;">
                <div class="row">
                    <div class="col-md-8">
                        <img class="img-responsive" src="${frontend_logos}icon_urn_pro.png"/>
                        <h5>Übereinstimmung der pro Stimmen</h5>
                        ${choices_user_ID_per_party_pro}
                    </div>
                    <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                        <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_uservera_to_party_pro}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_uservera_to_party_pro}
                </div>
                </div>
                <hr>
                <div class="row" style="padding-top: 20px;">
                    <div class="col-md-8">
                        <img class="img-responsive" src="${frontend_logos}icon_urn_con.png"/>
                        <h5>Übereinstimmung der contra Stimmen</h5>
                        ${choices_user_ID_per_party_con}
                    </div>
                    <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                        <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_uservera_to_party_con}
                </div>
                </div>
                <hr>
                <div class="row" style="padding-top: 20px;">
                    <div class="col-md-8">
                        <img class="img-responsive" src="${frontend_logos}icon_urn_ent.png"/>
                        <h5>Übereinstimmung der Enthaltungen</h5>
                        ${choices_user_ID_per_party_ent}
                    </div>
                    <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                        <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_uservera_to_party_ent}
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row panel-group" id="acc_6" style="padding-top: 10px;">               
        <div class="panel panel-default panel-danger">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_6" href="#acc_6_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-random"></span>&nbsp;&nbsp;&nbsp;Entwicklung: Fraktionen
                </h4>
                </div>
                </a>
            </div>
            <div id="acc_6_body" class="panel-body panel-collapse collapse">
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
    <div class="panel-group row" id="acc_7" style="padding-top: 10px;">
        <div class="panel panel-default panel-warning">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_7" href="#acc_7_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Bilanz: Bundestag
                </h4>
                </div>
                </a>
            </div>
            <div id="acc_7_body" class="row panel-body panel-collapse collapse">
                <div class="row" style="padding-bottom: 20px; padding-top: 20px;">
                    <div class="col-md-8">
                        Bundestag gesamt
                        ${choices_bt_to_user}
                    </div>
                    <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                        <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                        ${analysis_help_bt}
                        <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                        ${analysis_math_bt}
                    </div>
                </div>
                    <hr>
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-md-8">
                            Übereinstimmung mit dem Bundestag
                                <img class="img-responsive" src="${frontend_logos}icon_bt.png"/>    
                                ${choices_user_ID_per_bt_pro}
                                ${choices_user_ID_per_bt_con}
                                ${choices_user_ID_per_bt_ent}              
                        </div> 
                        <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                            <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                            ${analysis_help_bt_by_vote}
                            <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                            ${analysis_math_bt_by_vote}
                        </div> 
                    </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="row panel-group" id="acc_8" style="padding-top: 10px;">               
        <div class="panel panel-default panel-danger">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_8" href="#acc_8_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-random"></span>&nbsp;&nbsp;&nbsp;Entwicklung: Bundestag
                </h4>
                </div>
                </a>
            </div>
            <div id="acc_8_body" class="panel-body panel-collapse collapse">
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
    <div class="row panel-group" id="acc_3" style="padding-top: 10px;">               
        <div class="panel panel-default panel-success">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_3" href="#acc_3_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;&nbsp;community Daten
                </h4>
            </div>
                </a>
            </div>
            <div id="acc_3_body" class="panel-body panel-collapse collapse">
                <div class="row">
                    <div class="col-md-8">
                    <h4>Entscheidungsverhalten der uVote Community</h4>
                    ${votes_all}
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_community}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_community}
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row panel-group" id="acc_9" style="padding-top: 10px;">               
        <div class="panel panel-default panel-warning">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_9" href="#acc_9_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                    <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Bilanz: community & Fraktionen
                </h4>
            </div>
                </a>
            </div>
            <div id="acc_9_body" class="panel-body panel-collapse collapse">
                <div class="row">
                    <div class="col-md-8">
                    <h4>Übereinstimmung community und Fraktionen</h4>
                    <br>
                    ${votes_all_to_bt}
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_community_to_fr}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_community_to_fr}
                </div>
                </div>
                    
            </div>   
        </div>
    </div>
    <div class="row panel-group" id="acc_10" style="padding-top: 10px;">               
        <div class="panel panel-default panel-success">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_10" href="#acc_10_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                    <span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;&nbsp;Bundestag Daten
                </h4>
            </div>
                </a>
            </div>
            <div id="acc_10_body" class="panel-body panel-collapse collapse">
                <div class="row">
                    <div class="col-md-8">
                    <h4></h4>
                    ${bt_basic_stats}
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_bt_basic}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_bt_basic}
                </div>
                </div>
                    
            </div>   
        </div>
    </div>
    <div class="row panel-group" id="acc_11" style="padding-top: 10px;">               
        <div class="panel panel-default panel-warning">
            <div class="panel-heading" style="padding: 0">
                <a data-toggle="collapse" data-parent="#acc_11" href="#acc_11_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                    <h4 class="panel-title" style="">
                    <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Bilanz: Bundestag & Fraktionen
                </h4>
            </div>
                </a>
            </div>
            <div id="acc_11_body" class="panel-body panel-collapse collapse">
                <div class="row">
                    <div class="col-md-8">
                    <h4>Übereinstimmung Bundestag und Fraktionen</h4>
                    ${choices_bt}
                </div>
                <div class="col-md-4" style="font-size: 10pt; border-left: #d9edf7 solid 2px">
                    <h4><span class="glyphicon glyphicon-info-sign"></span></h4>
                    ${analysis_help_choices_bt}
                    <h4><span class="glyphicon glyphicon-certificate"></span></h4>
                    ${analysis_math_choices_bt}
                </div>
                </div>
                    
            </div>   
        </div>
    </div>

<!--<div id="graph_bt_user_overall" class="row"></div>

<script type="text/javascript" language="JavaScript">load_visualisation_urvote('graph_bt_user_overall',84600);</script>-->
                          

        
       