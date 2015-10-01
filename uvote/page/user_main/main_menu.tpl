<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="tabs_user_main">
                <li class="active"><a href="#!start(user_main(u))">Abstimmen</a></li>
                <li><a href="#!start(user_main(ur))">Auswerten</a></li>
                <li><a href="#!start(user_main(my))">Mithelfen</a></li>
                <li><a data-toggle="modal" class="brand" href="#impressum" id="impressum"><font size="2">Impressum</font></a></li>
            </ul>
            ${loginform}
        </div>
        <!--<div class="navbar-inner">-->
              <!--  <ul class="nav navbar-nav">              
                    <li><a class="brand" href="" id="menu_uvote">uVote</a></li>
                    <li><a data-toggle="modal" class="brand" href="#impressum" id="impressum"><font size="2">impressum</font></a></li>

                </ul>                    -->
        <!--</div>                -->
    </div>
</nav>

<div class="tabbable" id="tabbable_main_menu">
    
    <div class="tab-content">        
        <div class="tab-pane active" id="tab_main"></div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse_feedback">Feedback</a>
            </h4>
        </div>            
        <div id="collapse_feedback" class="panel-collapse collapse in">
            <div class="panel-body">
                <form>
                    <br /><img src="${frontend_logos}logo2.png" width="180"/>
                    <h4>uVote BETA Feedback</h4>
                    <textarea id="feedback_text">Sag uns was dich stört!</textarea>
                    <br />
                    <input type="submit" id="feedback_submit" />
                </form>
            </div>
        </div>
    </div>
</div>
