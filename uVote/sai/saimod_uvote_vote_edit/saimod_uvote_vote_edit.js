function init_saimod_uvote_vote_edit(){
    alert("doc ready works")
    
        $('#vote_data_submit').click(function () {
            //vote_click($(this).attr('poll_ID'));
            alert("doc ready works")
//            vote_data_edit($(this).attr('poll_ID'));
            $.getJSON(SAI_ENDPOINT+'sai_mod=.SYSTEM.SAI.saimod_uvote_vote_edit&action=data_submit',function(){
            init__SYSTEM_SAI_uvote_vote_edit();
            });
            });
            
            };

function vote_data_edit (poll_ID, vote) {
    $.getJSON('./api.php?call=vote&action=vote&poll_ID=' + poll_ID, function(data) {
        var items = [];        
        if(data.status == true){
            alert("success");
        } else {
            alert(data.result.message);
        }
    }); 
}
