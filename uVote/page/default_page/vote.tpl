<div class="hero-unit" style="padding: 5px; background: white;">
    <div class="row" style="width: 100%; margin: auto;">           
        <div class="span6">
            <h2>${vote_title}</h2>
            <p>${vote_text}</p>
            <i class="icon-chevron-sign-down"></i>
        </div>

        <div class="span5" style="">
            <h2>Abstimmung</h2>             
            <a class="btn btn-large btn-green" style="width: 110px;">Pro &raquo;
            <script language="javascript">            
                $(function(){

                $('#btn btn-large btn-green').on('click', function (e) {
                            
                var poll_ID = "15";
                var vote = "4";

                document.write('href="mojotrollz.eu/web/uVote/api.php?call=vote&action=vote&poll_ID=' + poll_ID + '&vote=' + vote + '"');
                });
    

});
            </script>
            </a>

            <a class="btn btn-large btn-red" style="width: 110px; background-color: red;" href="#">Contra &raquo;</a>
            <a class="btn btn-large btn-grey" style="width: 110px; background-color: grey;" href="#">Enthaltung &raquo;</a>
            
            <!-- Countdown-Generator by www.coolplace.cc -->
            <form name="coolcccount">            
                    <input size="120" name="coolcc">
            </form>

        </div>            
    </div>           
</div>