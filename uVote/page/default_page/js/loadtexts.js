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
        $('.inputEmail, inputPassword, inputPassword2').click(function () {
            vote_click($(this).attr('email', 'password', 'password2'), inputEmail, inputPassword, inputPassword2);
            });
});
function getuserpersonaldata(inputEmail, inputPassword){
    $.get('.api.php?call=account&action=create&username=' + NULL + '&password_sha=' + password + '&email=' + email + '&locale=deDE', function (data) {
            dataTmp = data;               
    }).complete(function() {      

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