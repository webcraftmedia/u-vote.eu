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
            <div class="container" id="site-content" style="">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-responsive" src="${frontend_logos}logo2.png"/>
                    </div>
                    <div class="col-md-6">
                        <img class="img-responsive" src="${frontend_logos}cover.png"/>
                    </div>
                </div>
                    <div class="row"><hr></div>
                        <div class="row">
                            <div class="col-md-10">
                                ${menu}
                            </div>
                            <div class="col-md-2">
                                ${loginform}
                            </div>
                        </div>            
                <div class="row" id="user_main"></div>  
            </div>
        </div>
    </body>
</html>
