function init_saimod_uvote_vote_edit(){
    
    $('.btn_editvote').click(function() {
        alert ('');
        var poll_ID = $('#input_poll_ID').val();
        var title = $('#input_poll_title').val();
        var iframe_link = $('#input_poll_link').val();
        vote_data_edit(poll_ID, title, iframe_link);
        
            
    
//    var data = new Array(); 
//    alert("bla")
//       $.ajax({
//        url: SAI_ENDPOINT+'sai_mod=.SYSTEM.SAI.saimod_uvote_vote_edit&action='+ vote,
//        contentType : "application/json; charset=utf-8",
//        vote : JSON.stringify({
//            sai_mod: 'saimod_uvote_vote_edit', 
//            action: 'new_vote',
//            json: data,           
//        }),
//        dataType : 'json',
//        type : 'POST' ,
//        success: function(vote) {
//            alert("success");
//        }});
//        alert("js läuft");
        })};




function vote_data_edit (poll_ID, title, iframe_link) {
    alert('vote_data_edit');
    
    $.getJSON('./api.php?call=vote&action=new_vote&poll_ID=' + poll_ID + 'title=' + title + '&iframe_link=' + iframe_link, function(data) {
        var items = [];        
        if(data.status == true){
            alert("success");
        } else {
            alert(data.result.message);
        }
    }); 
}
