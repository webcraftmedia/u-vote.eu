<!DOCTYPE html>
<html>
    <head>    
        <title>uVote</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="lib/custom/custom_buttons.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    
        ${css}

        ${js}

    </head>

    <body style="background: ${frontend_logos}background.png, padding-top: 50px;">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner" style="padding-left: 50px; padding-right: 50px;">                
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="" id="menu_uvote">uVote</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">              
<!--
                            <li><a href="#" url="?action=myvote">myVote</a></li>
                            <li><a href="#" url="?action=Dokumentation">Dokumentation</a></li>
                            <li><a href="#" url="?action=Download">Download</a></li>
-->              
                    </ul>              
                    ${loginform}
                </div>                
            </div>
        </div>        
        <div id="site-content" style="padding: 0; margin: 0; margin-left: 40px;">         
            <div id="user_main" style="padding: 0px; width: 50%; float: left;"></div>
            <div id="list" style="padding: 0px; width: 50%; float: right;">            
                ${votelist}
            </div>
        </div>        
    </body>
</html>
