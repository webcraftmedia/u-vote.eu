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
function vote_click (poll_ID, vote) {
    $.getJSON('./api.php?call=vote&action=vote&poll_ID=' + poll_ID + '&vote=' + vote, function(data) {
        var items = [];   
        if(data.status == true){
            alert("success");
            system.reload();
        } else {
            alert(data.result.message);
        }
    }); 
}