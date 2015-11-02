<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['kiosk']['user_id'])){


}
else{
    header("location: login.php");
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kiosk Admin</title>
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
        
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="cms" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Content Management
              </a>
              <p class="sem-header">Active semester : <?php echo sem_name(semester()); ?></p>
        </div>
    </section><!--/#services-->

    <section style="padding:20px 0;">

        <div id="panel" class="" style="background-color:#FFF; width:75%;">
          <div class="col-md-12 container">
          <div class=" col-md-3 tile-view " style="width:33%;">
            <a href="cms_panel.php" class="btn btn-primary btn-large" style="display: block;width:100%;margin: 10px auto;font-size: 16px;padding: 20px;">
              Personnel Data
            </a>
          </div><!--.tile-view-->
          <div class=" col-md-3 tile-view " style="width:34%;">
            <a href="cms_panel.php" class="btn btn-primary btn-large" style="display: block;width:100%;margin: 10px auto;font-size: 16px;padding: 20px;">
              Classes & Grades 
            </a>
          </div><!--.tile-view-->
          <div class=" col-md-3 tile-view " style="width:33%;">
            <a href="cms_panel.php" class="btn btn-primary btn-large btn-block" style="display: block;width:100%;margin: 10px auto;font-size: 16px;padding: 20px;">
              Payments Data
            </a>
          </div><!--.tile-view-->
          </div>

          <div class="col-md-12">
            <img src="images/flow.jpg" style="width:100%;" />
          </div>

          <div class="col-md-12 container">
          <div class=" col-md-3 tile-view " style="width:33%;">
            <a href="cms_panel.php" class="btn btn-primary btn-large" style="display: block;width:100%;margin: 10px auto;font-size: 16px;padding: 20px;">
              Personnel Data
            </a>
          </div><!--.tile-view-->
          <div class=" col-md-3 tile-view " style="width:34%;">
            <a href="cms_panel.php" class="btn btn-primary btn-large" style="display: block;width:100%;margin: 10px auto;font-size: 16px;padding: 20px;">
              Classes & Grades 
            </a>
          </div><!--.tile-view-->
          <div class=" col-md-3 tile-view " style="width:33%;">
            <a href="cms_panel.php" class="btn btn-primary btn-large btn-block" style="display: block;width:100%;margin: 10px auto;font-size: 16px;padding: 20px;">
              Payments Data
            </a>
          </div><!--.tile-view-->
          </div>
          <div class="list-view">
            <div>
              <table class="table">
                <thead>

                </thead>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                
              </table>
            </div>
          </div><!--.list-view-->
        </div><!-- /#panel -->
    </section>

    



    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script>
        (function(){
            /*
            var left_panel = $("#left-panel"); 
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });
            */

        })();
    </script>
</body>
</html>