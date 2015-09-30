function init_user_main(){
    register_registerform();
    $('#feedback_submit').click(function (data){
        var test = $('textarea#feedback_text').val();
        send_feedback(test);            
    });
    $('#tabs_user_main a').click(function (e) {
        //e.preventDefault();
    });
}

function init_myvote(){
    $('.add_data_submit').click(function () {
        submit_add_data();
        alert('success');
    });
}