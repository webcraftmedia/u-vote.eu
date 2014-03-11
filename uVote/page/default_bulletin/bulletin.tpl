<div style="float: left; width: 100%;"> 
    <h4>${title}</h4>
    ${vote_buttons}
    <div style="float: left;">
        <img src="${frontend_logos}icon_urn_${vote_class}.png"/>
    </div>
    <div style="margin-top: 30px;">
        ${openvote_help_text}
        ${title}
        ${openvote_help_text1}
    </div>
    <div>
        ${voice_weight}
    </div>
    <div style="float: left; width: 50%; padding-top: 30px"> 
           ${bars_user}<br>      
           ${bars_bt}
    </div>
    <div style="float: right; width: 50%; padding-top: 30px">   
        ${icons_party}
        ${choice_party}
    </div>
    <div class="divider" style="clear: both"></div>
    <br>
    <div style="padding-top: 30px;">
    <h4>Kommentare</h4>
    <div style="padding-top: 20px;">
        <div style="float: left; width: 40%">
            <h5>Pro</h5>
            ${comments_pro}
        </div>
        <div style="float: right; width: 40%">
            <h5>Contra</h5>
            ${comments_con}
        </div>
    </div>
        <div style="clear: both"></div>
        <div>
            <font size="2">Kommentar</font><br>
            <textarea id="c_txt_pro"></textarea><br>
            <font size="2">Quelle</font><br>
            <input type="text" id="c_src_pro" placeholder="optional"/><br>
            <select id="side_select" name="side_select">
                <option>Seite</option>
                <option value="1">Argument Pro</option>
                <option value="2">Argument Con</option>
            </select><br>
            <div class="btn btn-primary submit_pro" id="submit_pro" poll_ID="${poll_ID}">${submit}</div>  
    </div>
    </div>


<!--<div class="btn" id="test">
    test
</div>
-->

</div><!-- /.modal -->