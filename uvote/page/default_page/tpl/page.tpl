<!DOCTYPE html>
<html>
    <head>    
        <title>u-vote.eu</title>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">  
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        ${css}
        ${js}
    </head>
    <body style="background: url(${frontend_logos}tapete.gif); background-attachment: fixed;">
            <div class="container" id="site-content">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6" style="margin: 0; padding: 0;">
                        <img class="img-responsive" src="${frontend_logos}u-vote.png"/>
                    </div>
                    <div class="col-md-6" style="margin: 0; padding: 0; text-align: right;">
                            ${loginform}
                    </div>
                    
                </div>
                <div class="row" style="margin-bottom: 15px;">
                    
                    <div class="col-md-6" style="margin: 0; padding: 0;">
                        ${menu}
                    </div>
                    <div class="col-md-6" style="margin: 0; padding: 0;">
                        <div class="row">
                            <ul class="nav nav-pills pull-right">
                                <li> <a href="#"><span class="fa fa-facebook fa-lg"></span>&nbsp;&nbsp;facebook&nbsp;&nbsp;</a></li>
                                <li><a href="https://twitter.com/uvote_de" target="blank"><span class="fa fa-twitter fa-lg"></span>&nbsp;&nbsp;twitter</a></li>
                        </ul> 
                        </div>
                        
                    </div>
                    </div>            
                <div class="row" id="user_main"></div> 
                <a href="#!start(user_main(imp))">&nbsp;&nbsp;Impressum</a>
            </div>
                
    </body>
</html>
