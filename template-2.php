<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ours.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <header id="header" class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner" style="height:80px">
        <div class="">
            <div class="navbar-header">
            <!--
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            _--> <?php ?>
                <h2 class="navigation-controler">
                    <a class="" href="" onclick="goBack()" ><i class="icon-chevron-left "></i></a>
                    <a class="" href="menu.html"><i class="icon-th "></i></a>
                    <a class="" href="#" onclick="alert('This should be an information block')"><i class="icon-info-sign "></i></a>
                </h2>
                
            </div>
            <div class="">
                <div >
                    <h2 class="navigation-controler rigth">
                    <a href="#" onclick="alert('This is suppose to be a dropdown menu.')"><i class="icon-list"></i></a>
                    </h2>
                </div>
            </div>
        </div>
    </header><!--/header-->



    <section id="services" class="torquiose peter-river" style="padding:0;">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-home" ></i> Module Name</h3>
            </div>
        </div>
    </section><!--/#services-->

    <div id="viewport" class="hidden" style="margin:20px; background-color:#FFF; height:460px; border:1px solid #DADADA; padding: 10px;">
        <h1>This is it</h1>
        <i class="icon-linux "></i>
    </div><!--/#main-->

    <section style="padding-bottom:0; padding-top:20px; height:85%">
        <div id="panel" style="width: 90%; margin: 0 auto; border: 1px solid #dadada; border-radius: 4px; height:100%; background-color:#fafafa">
            <div class="container">
                <h1>Welcome to the BU Kiosk</h1>
            </div>
        </div><!-- /#panel -->
    </section>
    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>

</body>
</html>