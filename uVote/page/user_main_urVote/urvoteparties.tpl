<tr>
    <td>
        <img src="${frontend_logos}icon_${party}.png"/>
    </td>
    <td><span class="badge badge-success">${class_MATCH}</span></td>
    <td><span class="badge badge-important">${class_MISSMATCH}</span></td>
    <td><span class="badge"><a class="uvote_test" data-toggle="popover" title="Popover title" data-content="The last tip!">
 
                               ${match_percentage}%</a></span></td>
</tr>    
<script>  
$(function ()  
{ $(".uvote_test").popover();  
});  
</script>  