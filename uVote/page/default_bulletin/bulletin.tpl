<div style="float: left;"> 

<h4>${title}</h4>
<div>
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
<div style="float: left; width: 50%"> 
    <div>      
       ${bars_user}    
    </div>  
    <div>         
       ${bars_bt}
    </div>
</div>
<div style="float: left; width: 50%;">   
    ${icons_party}
    ${choice_party}
</div>
<div style="clear: both"></div>
</div>

<div style="width: 50%">
        ${comments_pro}
        ${comments_con}
        <font></font>
        <textarea id="c_txt_pro">
        </textarea>
        <font></font>
        <input type="text" id="c_src_pro"/><br>
        <div class="btn btn-primary submit_pro" id="submit_pro" poll_ID="${poll_ID}">${submit}</div>  
</div>
  


<!--<div class="btn" id="test">
    test
</div>
-->

</div><!-- /.modal -->