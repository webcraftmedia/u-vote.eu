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
function encode_utf8(c) {
  return unescape(encodeURIComponent(c));
}

function decode_utf8(c) {
  return decodeURIComponent(escape(c));
}

