<!DOCTYPE html>
<html>
    <head>    
        <title>uVote</title>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">               
        ${css}
        ${js}
    </head>
    <body>
    <div class="main_container">
        <div class="modal fade" id="impressum">
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

            <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a class="brand" href="" id="menu_uvote">uVote</a></li>
                            <li><a data-toggle="modal" class="brand" href="#impressum" id="impressum"><font size="2">impressum</font></a></li>                            
                        </ul>
                        ${loginform}
                    </div>
                    <!--<div class="navbar-inner">-->
                          <!--  <ul class="nav navbar-nav">              
                                <li><a class="brand" href="" id="menu_uvote">uVote</a></li>
                                <li><a data-toggle="modal" class="brand" href="#impressum" id="impressum"><font size="2">impressum</font></a></li>
                                
                            </ul>                    -->
                    <!--</div>                -->
                </div>
            </nav>

            <div id="site-content">

                <div id="user_main"></div>
                
                <div id="user_list"></div>
                
            </div>
        </div>
    </body>
</html>
