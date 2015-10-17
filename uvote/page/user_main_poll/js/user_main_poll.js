function init_user_main_poll(){
    $('#btnvote_yes').click(function () {            
            vote_click($(this).attr('poll_ID'),1);
            });
        $('#btnvote_no').click(function () {
            vote_click($(this).attr('poll_ID'),2);
            });
        $('#btnvote_off').click(function () {
            vote_click($(this).attr('poll_ID'),3);
            });
        $('#user_main').resize(function(){
            $('#pollframe').height($('#user_main').height());
        });

}