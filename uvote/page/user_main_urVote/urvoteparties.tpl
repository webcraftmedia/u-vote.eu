<div id="urvoteparties_{party}">
<tr>
    <td>
        <img src="${frontend_logos}icon_${party}.png"/>
    </td>
    <td><span class="badge badge-success">${class_MATCH}</span></td>
    <td><span class="badge badge-important">${class_MISSMATCH}</span></td>
    <td><span class="badge">
            <a class="urvoteparties_uvote_popover" data-content="${according_laws}">${match_percentage}%</a>
        </span>
    </td>
</tr>    
</div>
<script> 
$(function ()  
{ $(".urvoteparties_uvote_popover").popover({html: true});  
});  
</script>  