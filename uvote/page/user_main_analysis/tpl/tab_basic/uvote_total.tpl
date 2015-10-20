<div class="row">
    <div class="col-md-12">
        <h5>Absolute Stimmen der Community</h5>
        <hr>
    </div>   
</div>
<div class="row">
    <div class="col-md-2">
        <br>
        <img src="${frontend_logos}icon_urn_pro.png"/>
    </div>
    <div class="col-md-10">
        <font size="1">pro Stimmen</font>
        <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: ${total_pro_percentage}%">${pro}</div>
        </div>
</div>
</div>
<div class="row">
    <div class="col-md-2">
        <br>
        <img src="${frontend_logos}icon_urn_con.png"/>
    </div>
    <div class="col-md-10">
        <font size="1">contra Stimmen</font>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" style="width: ${total_con_percentage}%">${con}</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <br>
        <img src="${frontend_logos}icon_urn_ent.png"/>
    </div>
    <div class="col-md-10">
        <font size="1">Enthaltungen</font>
        <div class="progress">
            <div class="progress-bar progress-bar-info" style="width: ${total_ent_percentage}%">${ent}</div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-md-2">
        <img src="${frontend_logos}icon_urn.png"/>
    </div>
    <div class="col-md-10">
        <div class="progress">
            <div class="progress-bar progress-bar" style="width: 100%">Total: ${total_total}</div>
        </div>
    </div>
</div>
