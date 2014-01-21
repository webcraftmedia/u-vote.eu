function init_saimod_uvote_data_input(){
    $('#realm_start').click(function(){
        $.ajax({
                url: SAI_ENDPOINT,
                data: { sai_mod: 'saimod_mojotrollz_server_handling',
                        action: 'realmstart'
                      },
                type: 'POST',
                
            });
        update_realmstatus();
    });    
    $('#realm_stop').click(function(){
        $.ajax({
                url: SAI_ENDPOINT,
                data: { sai_mod: 'saimod_mojotrollz_server_handling',
                        action: 'realmstop'
                      },
                type: 'POST',
                
            });
        update_realmstatus();        
    });    
    $('#world_start').click(function(){
        $.ajax({
                url: SAI_ENDPOINT,
                data: { sai_mod: 'saimod_mojotrollz_server_handling',
                        action: 'worldstart'
                      },
                type: 'POST',
                
            });
        update_worldstatus();
    });
    $('#world_stop').click(function(){
        $.ajax({
                url: SAI_ENDPOINT,
                data: { sai_mod: 'saimod_mojotrollz_server_handling',
                        action: 'worldstop'
                      },
                type: 'POST',
                
            });
        update_worldstatus();
    });
}

function update_realmstatus(){
    $('status_realm').load(SAI_ENDPOINT+'sai_mod=saimod_mojotrollz_server_handling&action=realmstatus');
}

function update_worldstatus(){
    $('status_world').load(SAI_ENDPOINT+'sai_mod=saimod_mojotrollz_server_handling&action=world status');
}

