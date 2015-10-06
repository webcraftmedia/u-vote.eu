<div class="row">
    <div class="col-md-12">
        <h5>Deine Stimmverteilung</h5>
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
        <div class="progress-bar progress-bar-success" style="width: ${user_total_pro_percentage}%">${user_total_pro}</div>
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
            <div class="progress-bar progress-bar-danger" style="width: ${user_total_con_percentage}%">${user_total_con}</div>
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
            <br>
            <div class="progress-bar progress-bar-info" style="width: ${user_total_ent_percentage}%">${user_total_ent}</div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-md-2">
        <img src="${frontend_logos}icon_urn.png"/>
    </div>
    <div class="col-md-10">
        <div class="progress">
            <div class="progress-bar progress-bar" style="width: 100%">Total: ${user_total_total}</div>
        </div>
    </div>
</div>
