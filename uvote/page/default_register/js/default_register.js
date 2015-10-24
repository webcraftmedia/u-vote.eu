function init_default_register(){
    register_registerform();
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

