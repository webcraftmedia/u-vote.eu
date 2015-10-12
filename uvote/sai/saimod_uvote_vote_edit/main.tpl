<div class="panel-group row" id="panel_${ID}" style="padding-top: 5px;">
        <div class="panel panel-default panel-success">
            <div class="panel-heading" style="padding: 0" >
                <a data-toggle="collapse" data-parent="#panel_${ID}" href="#panel_${ID}_body">
                <div style="width: 100%; height: 100%; padding: 10px;">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;${title}
                </h4>
                
                </div>
                    </a>
            </div>
            <div id="panel_${ID}_body" class="row panel-body panel-collapse collapse">
            <div class="row">
                <div class="col-md-6">
                    <h4>title</h4>
                    <input style="width: 100%" type="text" id="${ID}_vote_title" value="${title}"/><br><br>
                    <h4>src</h4>
                    <input style="width: 100%" type="text" id="${ID}_iframe_link" value="${iframe_link}"/>
                    <h4>tags</h4>
                    <input type="text" id="${ID}_tags" value="tags" style="width: 100%"/>
                </div>
                <div class="col-md-6">
                    <h4>poll start</h4>
                    <input type="text" id="${ID}_time_start" value="${time_start}"/> - 00:00
                    <h4>poll end</h4>
                    <input type="text" id="${ID}_time_end" value="${time_end}"/> - 00:00
                    <h4>bt choice</h4>
                    <input type="text" id="${ID}_bt_choice" value="${bt_choice}"/><br><br>
                    <a id="${ID}_data_submit" class="btn btn-primary bt_data_submit" poll_ID="${ID}">Submit</a>
                </div>
            </div>
                <hr>
            ${parties}
            <a id="${ID}_partydata_submit" class="btn btn-primary bt_partydata_submit" poll_ID="${ID}">Submit</a>
    </div>
</div>
</div>