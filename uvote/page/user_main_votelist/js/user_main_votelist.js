function init_user_main_votelist(){
    $('.acc_toggle').click(function(){
    $(this).find('i').toggleClass('glyphicon-circle-arrow-down').toggleClass('glyphicon-circle-arrow-up');
});
    $('.filter_btn').click(function () {
         var filter = $(this).attr("value");
         load_list(filter);             
});
$('#btn_text_search').click(function () {
         var text = $('#list_text_search').val();
         load_list_text_search(text);             
});
}

function load_list(filter){
    $('#list_frame').load('./api.php?call=load_list&filter=' + filter + '&time=1', function(){

    });
}
function load_list_text_search(text){
    $('#list_frame').load('./api.php?call=load_list_text_search&text=%' + text + '%', function(){

    });
}