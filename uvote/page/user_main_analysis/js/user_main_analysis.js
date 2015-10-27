function init_user_main_analysis(){
    
/* toggle little arrows on panel elements (for all) */
$('.acc_toggle').click(function(){
    $(this).find('i').toggleClass('glyphicon-circle-arrow-down').toggleClass('glyphicon-circle-arrow-up');
});

/* -------- clickhandlers for basic_stats_tab -------- */
$('#a_acc_2').click(function () {
         var set = 'basic';
         var cat = 'user';
         var body = '#acc_2_body';
         load_tab(set, cat, body);             
});
$('#a_acc_8').click(function () {
         var set = 'basic';
         var cat = 'community';
         var body = '#acc_8_body';
         load_tab(set, cat, body);             
});
$('#a_acc_10').click(function () {
         var set = 'basic';
         var cat = 'bt';
         var body = '#acc_10_body';
         load_tab(set, cat, body);             
});

/* -------- clickhandlers for bilance_stats_tab -------- */
$('#a_acc_3').click(function () {
         var set = 'bilance';
         var cat = 'user';
         var body = '#acc_3_body';
         load_tab(set, cat, body);             
});
$('#a_acc_6').click(function () {
         var set = 'bilance';
         var cat = 'user_bt';
         var body = '#acc_6_body';
         load_tab(set, cat, body);             
});
$('#a_acc_9').click(function () {
         var set = 'bilance';
         var cat = 'community';
         var body = '#acc_9_body';
         load_tab(set, cat, body);             
});
$('#a_acc_11').click(function () {
         var set = 'bilance';
         var cat = 'bt';
         var body = '#acc_11_body';
         load_tab(set, cat, body);             
});

/* -------- clickhandlers for bilance_choice_stats_tab -------- */
$('#a_acc_4').click(function () {
         var set = 'bilance_choice';
         var cat = 'user_party';
         var body = '#acc_4_body';
         load_tab(set, cat, body);             
});
$('#a_acc_12').click(function () {
         var set = 'bilance_choice';
         var cat = 'user_bt';
         var body = '#acc_12_body';
         load_tab(set, cat, body);             
});

/* -------- clickhandlers for google charts -------- */
$('#a_acc_7').click(function () {
    $('#acc_7_body').load(load_visualisation_urvote('graph_user_to_party_overall_bt', 84600));
});
$('#a_acc_13').click(function () {
    $('#acc_13_body').load(load_visualisation_user_to_parties_overall('donut_user_to_party_overall', 84600),
    load_visualisation_bt_to_parties_overall('donut_bt_to_party_overall', 84600),
    load_visualisation_community_to_parties_overall('donut_community_to_party_overall', 84600));
    
});
$('#a_acc_5').click(function () {
    $('#acc_5_body').load(load_visualisation_user_to_party_overall('graph_user_to_party_overall_cdu', 'cdu', 84600),
                            load_visualisation_user_to_party_overall('graph_user_to_party_overall_csu', 'csu', 84600),
                            load_visualisation_user_to_party_overall('graph_user_to_party_overall_spd', 'spd', 84600),
                            load_visualisation_user_to_party_overall('graph_user_to_party_overall_gruene', 'gruene', 84600),
                            load_visualisation_user_to_party_overall('graph_user_to_party_overall_linke', 'linke', 84600));
});

/* END OF CLICKHANDLERS AND INIT FUNCTION*/
}

function load_tab(set, cat, body){
    $(body).load('./api.php?call=load_tab&set=' + set + '&cat=' + cat, function(){

    });
}

function load_visualisation(id, timespan){
    $('img#loader').show();    
    $.getJSON('./api.php?call=graph_bt_to_uvote_overall_by_time',function(json){
        if(!json || json.status != true || !json.result){
            $('img#loader').hide();            
            return;
        }        
        json = json.result;
        $('img#loader').hide();
        var data = new google.visualization.DataTable();
        first = true;        
        $.each(json[0], function(key, value){
            if(first){                
                data.addColumn('datetime',key);
                first = false;
            } else {
                data.addColumn('number',key);
            }       
        });            
        $.each(json, function(key, value){
            first = true;
            data.addRow($.map(value, function(v) { if(first){first=false;return [new Date(v)];}else{return [parseFloat(v)];}}));});

        var options = {title: 'Übereinstimmung uVote Community/Bundestag', aggregationTarget: 'category', selectionMode: 'multiple', /*curveType: 'function',*/ /*focusTarget: 'category',*/ chartArea:{},  vAxis:{format:'#%', logScale: false}, interpolateNulls: false,  width: "300", height: "250"};
        //LineChart
        new google.visualization.ColumnChart(document.getElementById(id)).draw(data, options);
    });
}
function load_visualisation_urvote(id, timespan){
    $('img#loader').show();    
    $.getJSON('./api.php?call=graph_bt_to_user_overall_by_time',function(json){
        if(!json || json.status != true || !json.result){
            $('img#loader').hide();            
            return;
        }        
        json = json.result;
        $('img#loader').hide();
        var data = new google.visualization.DataTable();
        first = true;        
        $.each(json[0], function(key, value){
            if(first){                
                data.addColumn('datetime',key);
                first = false;
            } else {
                data.addColumn('number',key);
            }       
        });            
        $.each(json, function(key, value){
            first = true;
            data.addRow($.map(value, function(v) { if(first){first=false;return [new Date(v)];}else{return [parseFloat(v)];}}));});
         
        var options = {title: 'Übereinstimmung mit dem Bundestag', 
                        aggregationTarget: 'category',
                        selectionMode: 'multiple', 
                        legend: 'none',
                        animation:{
                        duration: 1000,
                        easing: 'out',},
                        chartArea:{},
//                        vAxis:{logScale: false},
                        vAxis: {viewWindow: {min: 0, max: 100}},
                        lineWidth: 7,
                        interpolateNulls: false,
                        width: "800",
                        height: "250"};
        new google.visualization.LineChart(document.getElementById(id)).draw(data, options);
    });
}

function load_visualisation_user_to_party_overall(id, party, timespan){
    $('img#loader').show();  
    $.getJSON('./api.php?call=graph_party_to_user_overall_by_time&party=' + party,function(json){            
        if(!json || json.status != true || !json.result){
            $('img#loader').hide();            
            return;
        }
        json = json.result;
        $('img#loader').hide();
        var data = new google.visualization.DataTable();
        first = true;
        $.each(json[0], function(key, value){
            if(first){                
                data.addColumn('datetime',key);
                first = false;
            } else {
                data.addColumn('number',key);
            }       
        });            
        $.each(json, function(key, value){
            first = true;
            data.addRow($.map(value, function(v) { if(first){first=false;return [new Date(v)];}else{return [parseFloat(v)];}}));});
         
        
        var options = { title: 'Übereinstimmung mit ' + party, 
                        aggregationTarget: 'category',
                        selectionMode: 'multiple', 
                        legend: 'none', 
                        chartArea:{},
//                        vAxis:{logScale: false},
                        vAxis: {viewWindow: {min: 0, max: 100}},
                        lineWidth: 7,
                        interpolateNulls: false,
                        width: "800",
                        height: "250"};
        new google.visualization.LineChart(document.getElementById(id)).draw(data, options);
    });
}
function load_visualisation_user_to_parties_overall(id, timespan){
    $('img#loader').show();  
    $.getJSON('./api.php?call=donut_party_to_user_overall',function(json){            
        if(!json || json.status != true || !json.result){
            $('img#loader').hide();            
            return;
        }
        json = json.result;
        $('img#loader').hide();
        var data = new google.visualization.DataTable();
        first = true;
        $.each(json[0], function(key, value){
            if(first){                
                data.addColumn('string',key);
                first = false;
            } else {
                data.addColumn('number',key);
            }       
        });                    
        $.each(json, function(key, value){
        first = true;
        data.addRow($.map(value, function(v) { if(first){first=false;return v;}else{return [parseFloat(v)];}}));});
        var options = { title: 'Übereinstimmung mit den Fraktionen relativ zueinander', 
                        titleTextStyle: {fontSize: 14, bold: 0, italic: 0},
                        pieSliceText: 'label',
                        legend: 'none',
                        colors: ['#000736', '#0022FF', '#33FF00', '#D2067A', '#F20101'],
                        pieHole: '0.4',
                        chartArea:{},
                        width: "350",
                        height: "400"};
        new google.visualization.PieChart(document.getElementById(id)).draw(data, options);
    });
}
function load_visualisation_community_to_parties_overall(id, timespan){
    $('img#loader').show();  
    $.getJSON('./api.php?call=donut_party_to_community_overall',function(json){            
        if(!json || json.status != true || !json.result){
            $('img#loader').hide();            
            return;
        }
        json = json.result;
        $('img#loader').hide();
        var data = new google.visualization.DataTable();
        first = true;
        $.each(json[0], function(key, value){
            if(first){                
                data.addColumn('string',key);
                first = false;
            } else {
                data.addColumn('number',key);
            }       
        });                    
        $.each(json, function(key, value){
        first = true;
        data.addRow($.map(value, function(v) { if(first){first=false;return v;}else{return [parseFloat(v)];}}));});
        var options = { title: 'Übereinstimmung mit den Fraktionen relativ zueinander', 
                        titleTextStyle: {fontSize: 14, bold: 0, italic: 0},
                        pieSliceText: 'label',
                        legend: 'none',
                        colors: ['#000736', '#0022FF', '#33FF00', '#D2067A', '#F20101'],
                        pieHole: '0.4',
                        chartArea:{},
                        width: "350",
                        height: "400"};
        new google.visualization.PieChart(document.getElementById(id)).draw(data, options);
    });
}
function load_visualisation_bt_to_parties_overall(id, timespan){
    $('img#loader').show();  
    $.getJSON('./api.php?call=donut_party_to_user_overall',function(json){            
        if(!json || json.status != true || !json.result){
            $('img#loader').hide();            
            return;
        }
        json = json.result;
        $('img#loader').hide();
        var data = google.visualization.arrayToDataTable([
          ['party', 'seats'],
          ['cdu',     255],
          ['csu',      56],
          ['grüne', 63],
          ['linke',    64],
          ['spd',  193]
        ]);
        var options = { title: 'Sitzverteilung im Plenum', 
                        titleTextStyle: {fontSize: 14, bold: 0, italic: 0},
                        pieSliceText: 'label',
                        legend: 'none',
                        colors: ['#000736', '#0022FF', '#33FF00', '#D2067A', '#F20101'],
                        pieHole: '0.4',
                        chartArea:{},
                        width: "350",
                        height: "400"};
        new google.visualization.PieChart(document.getElementById(id)).draw(data, options);
    });
}