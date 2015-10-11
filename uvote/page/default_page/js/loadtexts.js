$(document).ready(function() {                
    new SYSTEM('./api.php',1,'start');
    register_login();
    register_logout();
    navstate();
});
function navstate(){
    $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
});
}


function register_login(){
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
}
function register_logout(){
    $('#btn_logout').click(function(){
        $.get('./api.php?call=account&action=logout', function () {                      
            window.location.reload();                                  
        });
    })
}

/*function account_create(inputEmail, inputPassword){
    $.get('./api.php?call=account&action=create&username=' + NULL + '&password_sha=' + password + '&email=' + email + '&locale=deDE', function (data) {
            dataTmp = data;               
    }).complete(function() {      

    }); 
}*/

function load_openvoteinfo (poll_ID){
       var openvoteinfo;
       $.get('./api.php?page=openinfo&poll_ID=' + poll_ID, function (data) {
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

function submit_commentrate (c_ID, val) {
    alert('success');
    $.getJSON('./api.php?call=vote&action=commentrate&c_ID=' + c_ID + '&val=' + val, function(data) {         
        var items = [];   
        if(data.status == true){                  
        } else {
            alert(data.result.message);
        }
    }); 
}

function encode_utf8(c) {
  return unescape(encodeURIComponent(c));
}

function decode_utf8(c) {
  return decodeURIComponent(escape(c));
}

function submit_c_data (poll_ID) {
    var c = $("#c_txt_pro").val();
    var c_src = $("#c_src_pro").val();
    var a = document.getElementById("side_select");
    var c_choice = a.options[a.selectedIndex].value;
    $.getJSON('./api.php?call=vote&action=comment&poll_ID=' + poll_ID + '&c_choice=' + c_choice + '&c_txt=' + c_txt + '&c_src=' + c_src, function(data) {
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
    var val = JSON.stringify(feedback);
    console.log("feedback called");
    $.ajax({
        url: './api.php',
       // contentType : "application/json; charset=utf-8",
        data : {
            'call': 'vote',
            'action': 'feedback',
            'feedback': val
        },
        type : 'POST',
        dataType: 'json',
        async: false,
        success: function() {
            alert("success");
        },
        error: function(error){
            alert("something failed..."+error);
        }
    });
}

function register_registerform(){
    //console.log("wegwegwegwegwegweg");
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

