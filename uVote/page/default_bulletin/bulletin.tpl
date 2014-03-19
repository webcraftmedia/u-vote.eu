<div id="bulletin_main"> 
    <h4>${title}</h4>
    ${vote_buttons}
    <div id="bulletin_left">
        <img src="${frontend_logos}icon_urn_${vote_class}.png"/>
    </div>
    <div id="bulletin_sub1">
        ${openvote_help_text}
        ${title}
        ${openvote_help_text1}
    </div>
    <div>
        ${voice_weight}
    </div>
    <div id="bulletin_sub2"> 
           ${bars_user}<br>      
           ${bars_bt}
    </div>
    <div id="bulletin_sub3">   
        ${icons_party}
        ${choice_party}
    </div>
    <div id="divider"></div>
    <br>
    <div id="bulletin_sub4">
    <h4>Kommentare</h4>
    <div id="bulletin_sub5">
        <div id="bulletin_sub5_sub">
            <h5>Pro</h5>
            ${comments_pro}
        </div>
        <div id="bulletin_sub6">
            <h5>Contra</h5>
            ${comments_con}
        </div>
    </div>
        <div id="bulletin_sub7"></div>
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