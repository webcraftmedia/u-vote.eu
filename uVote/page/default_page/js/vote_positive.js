         
                $(function(){

                $('#btn btn-large btn-green').on('click', function (e) {
                            
                var poll_ID = "15";
                var vote = "4";

                document.write('href="mojotrollz.eu/web/uVote/api.php?call=vote&action=vote&poll_ID=' + poll_ID + '&vote=' + vote + '"');
                });
    

});

