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
              <p class="pull-right"><?php echo getActiveSem(); ?></p>
        </div>
    </section><!--/#services-->

    <section style="padding:20px 0;">

        <div id="panel" class="">
          <div class="tile-view ">
            <div class="col-lg-6">
            <div class="panel panel-default " style="">
              <div class="panel-heading">List of Students</div>
              <div class="panel-body" style="max-height:400px;overflow-y:auto">

                <form id="student_list" role="form" action="excel_upload/upload_student_list.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Source File</label>
                    <input type="file" id="student_list_file" name="student_list_file" />
                  </div>
                  
                  <div class="btn-grp pull-right">
                    <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Source</button>
                    <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> File Format</button>
                    <input type="submit" name="submit_student_list" class="btn btn-success" value="Upload" />
                  </div>
                </form>
                    
              </div>
            </div>


            

            </div><!--.col-lg-6-->


            <div class="col-lg-6">

            <div class="panel panel-default " style="">
              <div class="panel-heading">List of Faculty</div>
              <div class="panel-body" style="max-height:400px;overflow-y:auto">

                <form id="faculty_list" role="form" action="excel_upload/upload_faculty_list.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Source File</label>
                    <input type="file" id="faculty_list_file" name="faculty_list_file">
                  </div>
                  
                  <div class="btn-grp pull-right">
                    <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Source</button>
                    <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> File Format</button>
                    <input type="submit" name="submit_faculty_list" class="btn btn-success" value="Upload" />
                  </div>
                </form>
                    
              </div>
            </div>
            
            
            </div><!--.col-lg-6-->
          </div><!--.tile-view-->


          <div class="list-view">
            <div>
              <table class="table">
                <thead>

                </thead>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: right;">
                    <a href="#" class="btn btn-success">Check</a>
                    <a href="#" class="btn btn-success">Deploy</a>
                    <a href="#" class="btn btn-danger">Uninstall</a>
                  </td>
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