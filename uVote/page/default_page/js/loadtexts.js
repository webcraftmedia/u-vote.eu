/* jQuery on document ready */
$(document).ready(function() {
    // handle navigation link click
	/*$('.navbar ul li a').not('#menu_uvote').click(function () {
            loadAjaxContent($(this).attr('url'));
            
            //loadUrlPic($(this).attr('url'));
	});*/
        $('.btn_vote').click(function () {
            //vote_click($(this).attr('poll_ID'));
            $('#user_main').load('./?action=open_bulletin&poll_ID=' + $(this).attr('poll_ID'));
                open_vote($(this).attr('poll_ID'));                     
                register_registerform();
            });
        
        
        /*$('.btn_openvoteinfo').click(function () {                 
            if($("#openvoteinfo"+$(this).attr('poll_ID')).is(':visible')){                
                $('#openvoteinfo'+$(this).attr('poll_ID')).slideUp('slow');
            }else{                                            
                load_openvoteinfo($(this).attr('poll_ID'));
            }
        });*/

        //jqBootstrapValidation        
        
    
    $("#form_login input").not("[type=submit]").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {},
        submitSuccess: function($form, event){
            $.get('./api.php?call=account&action=login&username=' + $('#bt_login_user').val()+'&password_sha='+$.sha1($('#bt_login_password').val())+'&password_md5='+$.md5($('#bt_login_password').val()), function (data) {
                    if(data == 1){
                        window.location.reload();
                    } else {
                        $('#help-block-user-password-combi-wrong').attr('style', 'display: block;');
                    }                    
                });
                event.preventDefault();
            }            
    });
    
    $("#form_logout input").not("[type=submit]").jqBootstrapValidation(
    {
        preventSubmit: true,            
        submitError: function($form, event, errors) {},
        submitSuccess: function($form, event){
            $.get('./api.php?call=account&action=logout', function (data) {                      
                window.location.reload();                                  
            });
            event.preventDefault();
        }            
    });
    
    $('#user_main').load('./?action=user_main', function(){
        register_registerform();
        $('#feedback_submit').click(function (data){
            var test = $('textarea#feedback_text').val();
            send_feedback(test);
            
        });
        $('#tabs_user_main a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            load_user_main_tab($(this).attr('action'));        
        });

        //load_user_main_tab('user_main_uVote');
    });    
        
});

function register_registerform(){
    $("#register_user_form input").not("[type=submit]").jqBootstrapValidation(
    {
        preventSubmit: true,            
        submitError: function($form, event, errors) {},
        submitSuccess: function($form, event){
            $.get('./api.php?call=account&action=create&username=' + $('#register_username').val() + '&password_sha=' + $.sha1($('#user_register_password1').val()) + '&email=' + $('#register_email').val() + '&locale=deDE', function (data) {
                if(data == 1){
                    window.location.reload();
                } else {
                    $('#help-block-user-password-combi-wrong').attr('style', 'display: block;');
                }                    
            });
            event.preventDefault();
        }
    });
}

function drawChart(){
    //load_visualisation('#graph_bt_uv_overall',84600);
}

function load_user_main_tab(action){
    
    switch(action){
        
        case 'user_main_uVote':
            window.location.reload();
            $('#tab_uVote').load('./?action='+ action);        
            return;
        case 'user_main_urVote':
            $('#tab_urVote').load('./?action='+ action);
            return;
        case 'user_main_myVote':
            $('#tab_myVote').load('./?action='+ action, function(){
            $('.add_data_submit').click(function () {
            submit_add_data();
            alert('success');
            });
            });
            return;
        default:
    }   
}


function account_create(inputEmail, inputPassword){
    $.get('./api.php?call=account&action=create&username=' + NULL + '&password_sha=' + password + '&email=' + email + '&locale=deDE', function (data) {
            dataTmp = data;               
    }).complete(function() {      

    }); 
}

function load_openvoteinfo (poll_ID){
       var openvoteinfo;
       $.get('./index.php?action=openinfo&poll_ID=' + poll_ID, function (data) {
                openvoteinfo = data;
                bodyelem = $("");
                bodyelem.animate();                
	}).complete(function() {      
            $('#openvoteinfo'+poll_ID).slideUp({duration: 'slow',
            complete: function(){ 
                $('#openvoteinfo'+poll_ID).html(openvoteinfo);
                $('#openvoteinfo'+poll_ID).slideDown('slow');
                site_content_is_visible = true;
            }});
        });  

}

function get_barsperparty (poll_ID) {
    $.get('./api.php?call_bars_action_getbarsperparty&poll_ID=' + poll_ID, function (data) {
    dataTmp = data;               
    }).complete(function() {      

    }); 
}

function vote_click (poll_ID, vote) {
    $.getJSON('./api.php?call=vote&action=vote&poll_ID=' + poll_ID + '&vote=' + vote, function(data) {
        var items = [];   
        if(data.status == true){
            alert("success");
            $('#user_main').load('./?action=open_bulletin&poll_ID=' + poll_ID, function(){
                open_vote(poll_ID);                
            });                   
        } else {
            alert(data.result.message);
        }
    }); 
}

function submit_add_data () {
    var a = document.getElementById("location");
    var location = a.options[a.selectedIndex].text;
    var b = document.getElementById("birthyear");
    var birthyear = b.options[b.selectedIndex].text;
    var c = document.getElementById("gender");
    var gender = c.options[c.selectedIndex].text;
    var d = document.getElementById("children");
    var children = d.options[d.selectedIndex].text;
    $.getJSON('./api.php?call=vote&action=data&location=' + location + '&birthyear=' + birthyear + '&gender=' + gender + '&children=' + children, function(data) {
        var items = [];   
        if(data.status == true){
            alert("success");                   
        } else {
            alert(data.result.message);
        }
    }); 
}

function send_feedback (feedback) {
    
//    $.getJSON('./api.php?call=vote&action=feedback&feedback=' + feedback, function(data) {
//        console.log("hallo3672rt2ziuzir");
//        var items = []; 
//        alert(feedback);
//        if(data.status == true){
//            alert("success");
//        } else {
//            alert(data.result.message);
//        }
//    }); 

$.ajax({
        url: 'http://mojotrollz.eu/web/uVote/api.php',
       // contentType : "application/json; charset=utf-8",
        data : {
            call: 'vote',
            action: 'feedback',
            feedback: feedback
        },
        dataType : 'json',
        type : 'POST' ,
        success: function(data) {
            alert("success");
        }});
}

function open_vote (poll_ID) {
    $('#list').load('./api.php?call=vote&action=open_vote&poll_ID=' + poll_ID, function(){
        $('.btnvote_yes').click(function () {            
            vote_click($(this).attr('poll_ID'),1);
            });
        $('.btnvote_no').click(function () {
            vote_click($(this).attr('poll_ID'),2);
            });
        $('.btnvote_off').click(function () {
            vote_click($(this).attr('poll_ID'),3);
            });
        $('#test').click(function(){
            $('#myModal').modal();
        });
        register_registerform();        
    }); 
}

function loadAjaxContent(url) {
        var dataTmp;
	$.get(url, function (data) {
                dataTmp = data;
                bodyelem = $("html,body");
                bodyelem.animate();
	}).complete(function() {      
            $('#site-content-wrapper').slideUp({duration: 'slow',
            complete: function(){ 
                $('#site-content').html(dataTmp);
                $('#site-content-wrapper').slideDown('slow');
                site_content_is_visible = true;
            }});
        }); 
}
function loadUrlPic(url_pic) {
    var dataTmp;
    $.get(url_pic, function (data) {
        dataTmp = data;
        bodyelem = $("html,body");
        bodyelem.animate();
    }).complete(function() {
            $('.carousel-inner').slideUp({duration: 'slow',
            complete: function(){
                $('#pic').html(dataTmp);
                $('.carousel-inner').slideDown('slow');
                site_content_is_visible = true;
            }});
        }); 
}

function loadApiPic(id) {
    var dataTmp;
    $.get('./api.php?call=img&id='+id, function (data) {
        dataTmp = data;
        bodyelem = $("html,body");
        bodyelem.animate();
    }).complete(function() { 
        
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
         
        console.log(data);
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
         
        console.log(data);
        var options = {title: id, aggregationTarget: 'category', selectionMode: 'multiple', curveType: 'function', /*focusTarget: 'category',*/ chartArea:{},  vAxis:{logScale: false}, interpolateNulls: false,  width: "300", height: "250"};
        new google.visualization.LineChart(document.getElementById(id)).draw(data, options);
    });
}