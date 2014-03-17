<!DOCTYPE html>
<html>
    <head>    
        <title>uVote</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!--<link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="lib/custom/custom_buttons.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">-->
    
        ${css}

        ${js}

    </head>

    <body style="padding-top: 60px;">
    <div class="modal fade" id="impressum" style="float: left; display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Impressum</h4>
                </div>
                <div class="modal-body">
                    <div style="background: white;">
                        ${impressum_header}
                        ${impressum_1}
                        ${impressum_2}
                        ${impressum_3}
                        ${impressum_4}
                        ${impressum_5}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
        <div class="navbar navbar-inverse navbar-fixed-top" style="">
            <div class="navbar-inner" style="padding-left: 50px; padding-right: 50px;">                
                    <ul class="nav navbar-nav">              
                        <li><a class="brand" href="" id="menu_uvote">uVote</a></li>
                        <li><a data-toggle="modal" class="brand" href="#impressum" id="impressum"><font size="2">impressum</font></a></li>
                        ${loginform}
                    </ul>                    
                </div>                
            </div>
        </div>
                
        <div id="site-content" style="padding: 0; margin: 0; margin-left: 35px;">
            
            <div id="user_main" style="position: absolute; padding: 0; padding-top: 0px; width: 49%;"></div>
            
            <div id="user_list" style="padding: 0px; width: 50%; float: right;">            
                
            </div>
        </div>

    </body>
</html>
