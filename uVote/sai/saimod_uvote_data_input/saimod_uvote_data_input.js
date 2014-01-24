function init_saimod_uvote_data_input(){
    
        $('#vote_data_submit').click(function (poll_ID) {
            //vote_click($(this).attr('poll_ID'));
            alert("doc ready works")
            vote_data_submit($(this).attr('poll_ID'));                           
            });
            
            };

function vote_data_submit (poll_ID, vote) {
    $.getJSON('./api.php?call=vote&action=vote&poll_ID=' + poll_ID, function(data) {
        var items = [];        
        if(data.status == true){
            alert("success");
        } else {
            alert(data.result.message);
        }
    }); 
}