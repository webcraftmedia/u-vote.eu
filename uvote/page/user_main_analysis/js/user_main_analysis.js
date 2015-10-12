function init_user_main_analysis(){
    
load_visualisation_urvote('graph_user_to_party_overall_bt', 84600);
load_visualisation_user_to_party_overall('graph_user_to_party_overall_cdu', 'cdu', 84600);
load_visualisation_user_to_party_overall('graph_user_to_party_overall_csu', 'csu', 84600);
load_visualisation_user_to_party_overall('graph_user_to_party_overall_spd', 'spd', 84600);
load_visualisation_user_to_party_overall('graph_user_to_party_overall_gruene', 'gruene', 84600);
load_visualisation_user_to_party_overall('graph_user_to_party_overall_linke', 'linke', 84600);
load_visualisation_user_to_parties_overall('donut_user_to_party_overall', 84600);

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
         
        var options = {title: id, 
                        aggregationTarget: 'category', 
                        selectionMode: 'multiple', 
                        legend: 'none', 
                        curveType: 'function', /*focusTarget: 'category',*/ chartArea:{},  
                        vAxis:{logScale: false},
                        legend: 'none', 
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
                        width: "500",
                        height: "400"};
        new google.visualization.PieChart(document.getElementById(id)).draw(data, options);
    });
}