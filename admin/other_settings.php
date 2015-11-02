<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['kiosk']['user_id'])){


}
else{
    header("location: login.php");
}


$link = mysql_connect('localhost','root', '');
$link_status = null;
if(!$link){
    $link_status = "bad";
}
else{
    $link_status = "good";
}

$db_selected = mysql_select_db('kiosk', $link);
$db_status = "";
if(!$db_selected){
    $db_status = "No Database Found.";
}
else{
    $db_status = "Connected";
}

$query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_status='1'") or die(mysql_error());
$row_sem = mysql_fetch_assoc($query_sem);
$ay_id = $row_sem['ay_no'];
$sem_no = $row_sem['sem_no'];

$query_ay = mysql_query("SELECT * FROM academic_year_t  WHERE ay_id='{$ay_id}'") or die(mysql_error());
$row_ay = mysql_fetch_assoc($query_ay);
$year_start = $row_ay['year_start'];
$year_end = $row_ay['year_end'];


$sem = "";

switch($sem_no){
  case 1:
      $sem = "1st Semester";
      break;
  case 2:
      $sem = "2nd Semester";
      break;
  case 3:
      $sem = "summer";
      break;
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
    <?php $active_page="sem" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section style="padding: 20px 0;">
        
        <div id="panel" style="">
        <!-- border: 1px solid #dadada; -->
            <div class="col-lg-6">
            <div class="panel panel-default " style="">
              <div class="panel-heading">SEMESTER
              </div>
              <div class="panel-body" style="max-height:400px;overflow-y:auto">
                <table class="table">
                  <thead>

                  </thead>
                  <tr>
                    <td>Current Semeseter: </td>
                    <td id="status"><?php echo $sem." ".$year_start." - ".$year_end; ?></td>
                  </tr>
                  <tr>
                    <td>Latest Semester: </td>
                    <td id="deployment"</td>
                  </tr>
                  <tr>
                    <td>Active: </td>
                    <td id="active"></td>
                  </tr>
                  <tr>
                    <td>Date Deployed: </td>
                    <td id="date_deployed">No Database Found!</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: right;">
                      <a href="#" class="btn btn-success">Close</a>
                      <a href="#" class="btn btn-success">Deploy</a>
                      <a href="#" class="btn btn-danger">Uninstall</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            </div><!--.col-lg-6-->

            <div class="col-lg-6">
            
            </div><!--.col-lg-6-->


        </div><!-- /#panel -->
    </section>

    

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script>
        (function(){
            var left_panel = $("#left-panel"); 
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });

        })();
    </script>
</body>
</html>