function init_saimod_uvote_vote_edit(){
$('.bt_data_submit').click(function() {
        var poll_ID = $(this).attr('poll_ID');
        var title = $('#' + poll_ID + '_vote_title').val();
        var time_start = $('#' + poll_ID + '_time_start').val();
        var iframe_link = $('#' + poll_ID + '_iframe_link').val();
        var data = {poll_ID: poll_ID, title: title, iframe_link: iframe_link}
        $.getJSON('./sai.php?sai_mod=.SAI.saimod_uvote_vote_edit&action=edit_vote&data=' + JSON.stringify(data), function(data) {
            var items = [];        
            if(data.status == true){
                alert("success");
            } else {
                alert(data.result.message);
            }
        }); 
    });
};



