<div class="row">
    <div class="col-md-2">
        <img src="${frontend_logos}icon_${party}.png"/>
    </div>
    <div class="col-md-9">
        <div class="progress">
            <div class="progress-bar" style="width: ${match_percentage}%;"><a style="text-decoration: none; color: white;" class="urvoteparties_uvote_popover" data-content="${according_laws}">${match_percentage}%</a></div>
        </div>
    </div>   
    <!--<td><span class="badge badge-success">${class_MATCH}</span></td>
    <td><span class="badge badge-important">${class_MISSMATCH}</span></td>
    <td><span class="badge">
            <a class="urvoteparties_uvote_popover" data-content="${according_laws}">${match_percentage}%</a>
        </span>
    </td>
</tr>-->   
            <div class="col-md-1 urvoteparties_uvote_popover" data-content="${according_laws}">
            <span class="glyphicon glyphicon-question-sign"></span>
        </div>
</div>
        
<script> 
$(function (){ $(".urvoteparties_uvote_popover").popover({html: true});

}); 
</script>
