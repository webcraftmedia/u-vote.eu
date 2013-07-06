/* jQuery on document ready */
$(document).ready(function() {
    // handle navigation link click
	$('.navbar ul li a').not('#menu_uvote').click(function () {
            loadAjaxContent($(this).attr('url'));
            
            //loadUrlPic($(this).attr('url'));
	});
        $('.btnvote_yes').click(function () {
            vote_click($(this).attr('poll_ID'),1);
            });
        $('.btnvote_no').click(function () {
            vote_click($(this).attr('poll_ID'),2);
            });
        $('.btnvote_off').click(function () {
            vote_click($(this).attr('poll_ID'),3);
            });
        
        $('.btn_openvoteinfo').click(function () {            
            if($("#openvoteinfo"+$(this).attr('poll_ID')).is(':visible')){                
                $('#openvoteinfo'+$(this).attr('poll_ID')).slideUp('slow');                
            }else{                                            
                load_openvoteinfo($(this).attr('poll_ID'));
            }
        });

        //jqBootstrapValidation        
        $("#form_register input").not("[type=submit]").jqBootstrapValidation(
        {
            preventSubmit: true,            
            submitError: function($form, event, errors) {},
            submitSuccess: function($form, event){
//             alert ('.api.php?call=account&action=create&username=' + $('#bt_login_user').val() + '&password_sha=' + $.sha1($('#bt_login_password').val()) + '&email=' + $('#bt_login_user').val() + '&locale=deDE');
                $.get('./api.php?call=account&action=create&username=' + $('#bt_login_user').val() + '&password_sha=' + $.sha1($('#bt_login_password').val()) + '&email=' + $('#bt_login_user').val() + '&locale=deDE', function (data) {
                    if(data == 1){
                        window.location.reload();
                    } else {
                        $('#help-block-user-password-combi-wrong').attr('style', 'display: block;');
                    }                    
                });
                event.preventDefault();
            }            
    });

    $("#form_login input").not("[type=submit]").jqBootstrapValidation(
        {
            preventSubmit: true,            
            submitError: function($form, event, errors) {},
            submitSuccess: function($form, event){
//             alert ('.api.php?call=account&action=create&username=' + $('#bt_login_user').val() + '&password_sha=' + $.sha1($('#bt_login_password').val()) + '&email=' + $('#bt_login_user').val() + '&locale=deDE');
                $.get('./api.php?call=account&action=login&username=' + $('#login_email').val() + '&password_sha=' + $.sha1($('#login_password').val()) + '&password_md5=' + $.md5($('#login_password').val()), function (data) {
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

});

function account_create(inputEmail, inputPassword){
    $.get('./api.php?call=account&action=create&username=' + NULL + '&password_sha=' + password + '&email=' + email + '&locale=deDE', function (data) {
            dataTmp = data;               
    }).complete(function() {      

    }); 
}

function load_openvoteinfo (poll_ID){
       var openvoteinfo;
       $.get('./api.php?call=vote&action=openinfo&poll_ID=' + poll_ID, function (data) {
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

function vote_click (poll_ID, vote) {
    $.get('./api.php?call=vote&action=vote&poll_ID=' + poll_ID + '&vote=' + vote, function (data) {
            dataTmp = data;               
    }).complete(function() {      
        alert (poll_ID);
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
}/* jQuery on document ready */
$(document).ready(function() {
    // handle navigation link click
	$('.navbar ul li a').not('#menu_uvote').click(function () {
            loadAjaxContent($(this).attr('url'));
            
            //loadUrlPic($(this).attr('url'));
	});
        $('.btnvote_yes').click(function () {
            vote_click($(this).attr('poll_ID'),1);
            });
        $('.btnvote_no').click(function () {
            vote_click($(this).attr('poll_ID'),2);
            });
        $('.btnvote_off').click(function () {
            vote_click($(this).attr('poll_ID'),3);
            });
        
        $('.btn_openvoteinfo').click(function () {
            alert ("#openvoteinfo"+$(this).attr('poll_ID')('time_end'));
            if($("#openvoteinfo"+$(this).attr('poll_ID')).not(":visible")){
            load_openvoteinfo($(this).attr('poll_ID'));
            }
        else{
            exit;
        }
            });
//        $('#register_btn').click(function () {
//            account_create ($(this).attr ('#inputEmail'))
//            });
            //jqBootstrapValidation        
        $("#form_register input").not("[type=submit]").jqBootstrapValidation(
        {
            preventSubmit: true,            
            submitError: function($form, event, errors) {},
            submitSuccess: function($form, event){
//             alert ('.api.php?call=account&action=create&username=' + $('#bt_login_user').val() + '&password_sha=' + $.sha1($('#bt_login_password').val()) + '&email=' + $('#bt_login_user').val() + '&locale=deDE');
                $.get('./api.php?call=account&action=create&username=' + $('#bt_login_user').val() + '&password_sha=' + $.sha1($('#bt_login_password').val()) + '&email=' + $('#bt_login_user').val() + '&locale=deDE', function (data) {
                    if(data == 1){
                        window.location.reload();
                    } else {
                        $('#help-block-user-password-combi-wrong').attr('style', 'display: block;');
                    }                    
                });
                event.preventDefault();
            }            
        });

    $("#form_login input").not("[type=submit]").jqBootstrapValidation(
        {
            preventSubmit: true,            
            submitError: function($form, event, errors) {},
            submitSuccess: function($form, event){
//             alert ('.api.php?call=account&action=create&username=' + $('#bt_login_user').val() + '&password_sha=' + $.sha1($('#bt_login_password').val()) + '&email=' + $('#bt_login_user').val() + '&locale=deDE');
                $.get('./api.php?call=account&action=login&username=' + $('#login_email').val() + '&password_sha=' + $.sha1($('#login_password').val()) + '&password_md5=' + $.md5($('#login_password').val()), function (data) {
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

});
function account_create(inputEmail, inputPassword){
    $.get('./api.php?call=account&action=create&username=' + NULL + '&password_sha=' + password + '&email=' + email + '&locale=deDE', function (data) {
            dataTmp = data;               
    }).complete(function() {      

    }); 
}

function load_openvoteinfo (poll_ID){
       var openvoteinfo;
       $.get('./api.php?call=vote&action=openinfo&poll_ID=' + poll_ID, function (data) {
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

function vote_click (poll_ID, vote) {
    $.get('./api.php?call=vote&action=vote&poll_ID=' + poll_ID + '&vote=' + vote, function (data) {
            dataTmp = data;               
    }).complete(function() {      
        alert (poll_ID);
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