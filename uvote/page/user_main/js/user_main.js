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

function init_poll(){
    $('.btnvote_yes').click(function () {            
            vote_click($(this).attr('poll_ID'),1);
            });
        $('.btnvote_no').click(function () {
            vote_click($(this).attr('poll_ID'),2);
            });
        $('.btnvote_off').click(function () {
            vote_click($(this).attr('poll_ID'),3);
            });
        $('.submit_pro').click(function () {
            submit_c_data($(this).attr('poll_ID'));
            alert('success');
            });
        $('.c_up').click(function () {
                   submit_commentrate($(this).attr('c_ID'), 1);
                });
        $('.c_down').click(function () {
                   submit_commentrate($(this).attr('c_ID'), 2);
                });
        $('.c_spam').click(function () {
                   submit_commentrate($(this).attr('c_ID'), 3);
                });
        $('#test').click(function(){
            $('#myModal').modal();
        });
        
        register_registerform();
}