function init_saimod_uvote_vote_edit(){
$('#vote_data_submit').click(function() {
    var data = new Array();   
       $.ajax({
        url: SAI_ENDPOINT+'sai_mod=.SYSTEM.SAI.saimod_uvote_vote_edit&action='+ vote,
        contentType : "application/json; charset=utf-8",
        vote : JSON.stringify({
            sai_mod: 'saimod_uvote_vote_edit', 
            action: 'new_vote',
            json: data,           
        }),
        dataType : 'json',
        type : 'POST' ,
        success: function(vote) {
            alert("success");
        }});
        alert("js läuft");
        })};




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
