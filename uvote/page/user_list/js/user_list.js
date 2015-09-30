function init_user_list(){
    $('#tabs_user_list a').click(function (e) {
        //e.preventDefault();
    });
    $('.btn_vote').click(function () {
        //vote_click($(this).attr('poll_ID'));
        //$('#user_main').load('./?action=open_bulletin&poll_ID=' + $(this).attr('poll_ID'));                      
        //open_vote($(this).attr('poll_ID'));                     
        //register_registerform();
    });      
    $('.btn_fade').click(function () {           
        $('#vote_data_panel' + $(this).attr('poll_ID')).toggle();
    });
}

function init_user_list_active(){
    $('.btn_fade').click(function () {           
        $('#vote_data_panel' + $(this).attr('poll_ID')).show();
    });
    $('.btn_vote').click(function () {
        system.load('start(user_main(poll));poll.'+ $(this).attr('poll_ID'))
        //vote_click($(this).attr('poll_ID'));
        //$('#user_main').load('./?action=open_bulletin&poll_ID=' + $(this).attr('poll_ID'));
        //open_vote($(this).attr('poll_ID'));                     
        //register_registerform();
    })
}
function init_user_list_ended(){
    $('.btn_fade').click(function () {           
        $('#vote_data_panel' + $(this).attr('poll_ID')).show();
    });
    $('.btn_vote').click(function () {
        //vote_click($(this).attr('poll_ID'));
        //$('#user_main').load('./?action=open_bulletin&poll_ID=' + $(this).attr('poll_ID'));
        //    open_vote($(this).attr('poll_ID'));                     
        //    register_registerform();
        system.load('start(user_main(poll));poll.'+ $(this).attr('poll_ID'))
    })
}