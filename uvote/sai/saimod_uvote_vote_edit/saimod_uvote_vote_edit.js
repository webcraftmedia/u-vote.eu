function init_saimod_uvote_vote_edit(){
$('.bt_data_submit').click(function() {
        var poll_ID = $(this).attr('poll_ID');
        var title = $('#' + poll_ID + '_vote_title').val();
        var time_end = $('#' + poll_ID + '_time_end').val();
        var iframe_link = $('#' + poll_ID + '_iframe_link').val();
        var bt_choice = $('#' + poll_ID + '_bt_choice').val();
        var tags = JSON.stringify($('#' + poll_ID + '_tags').val().split(',').map(function(s) { return s.trim() }));
        var data = {poll_ID: poll_ID, title: title, time_end: time_end, iframe_link: iframe_link, bt_choice: bt_choice};
        $.getJSON('./sai.php?sai_mod=.SAI.saimod_uvote_vote_edit&action=edit_vote&data=' + JSON.stringify(data) + '&tags=' + tags, function(data) {
            var items = [];        
            if(data.status == true){
                alert("success");
            } else {
                alert(data.result.message);
            }
        }); 
    });
    
    $('.bt_partydata_submit').click(function() {
        var poll_ID = $(this).attr('poll_ID');
        var party = $('#input_party').val();
        var votes_pro = $('#input_pro').val();
        var votes_contra = $('#input_con').val();
        var nr_attending = $('#input_att').val();
        var total = $('#input_total').val();
        var choice = $('#input_choice').val();
        var data = {poll_ID: poll_ID, party: party, votes_pro: votes_pro, votes_contra: votes_contra, nr_attending: nr_attending, total: total, choice: choice};
        $.getJSON('./sai.php?sai_mod=.SAI.saimod_uvote_vote_edit&action=edit_partydata&data=' + JSON.stringify(data), function(data) {
            var items = [];        
            if(data.status == true){
                alert("success");
            } else {
                alert(data.result.message);
            }
        }); 
    });
};




