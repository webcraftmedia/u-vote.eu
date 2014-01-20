$('#btnvote_yes').click(function () {
            alert("1");
            vote_click($(this).attr('poll_ID'),1);
            alert("2");
            });
             

$('#btnvote_no').click(function () {
            vote_click($(this).attr('poll_ID'),2);
            });

$('#btnvote_off').click(function () {
            vote_click($(this).attr('poll_ID'),3);
            });
            
           
function vote_click (poll_ID, vote) {
    $.getJSON('./api.php?call=vote&action=vote&poll_ID=' + poll_ID + '&vote=' + vote, function(data) {
        var items = [];        
        if(data.status == true){
            alert("sucess");
        } else {
            alert(data.result.message);
            alert("abc")
        }
    }); 
}