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
        $('#tabs_user_main a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            load_user_main_tab($(this).attr('action'));        
        });
    });
        
});

function load_user_main_tab(action){
    switch(action){
        case 'user_main_uVote':
            $('#tab_uVote').load('./?action='+ action);
            return;
        case 'user_main_urVote':
            $('#tab_urVote').load('./?action='+ action);
            return;
        case 'user_main_myVote':
            $('#tab_myVote').load('./?action='+ action);
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
        } else {
            alert(data.result.message);
        }
    }); 
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