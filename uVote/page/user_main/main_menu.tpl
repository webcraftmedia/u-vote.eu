<div class="tabbable" id="tabbable_main_menu">
    <ul class="nav nav-tabs" id="tabs_user_main">
        <li class="active"><a href="#tab_uVote" action="user_main_uVote">uVote</a></li>
        <li><a href="#tab_urVote" action="user_main_urVote">urVote</a></li>
        <li><a href="#tab_myVote" action="user_main_myVote">myVote</a></li>        
    </ul>
    <div class="tab-content">        
        <div class="tab-pane active" id="tab_uVote">${uVote}</div>
        <div class="tab-pane" id="tab_urVote" style="overflow: hidden;"></div>
        <div class="tab-pane" id="tab_myVote"></div>
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
