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
        #tabs{
          border: 1px solid #dadada;
          margin:10px;
        }
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="cms" ?>
    <?php //include "admin_left_pane.php";?>

    <section id="banner" class="" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Content Management
              </a>
              <p class="pull-right"><?php echo getActiveSem(); ?></p>
        </div>
    </section><!--/#services-->

    <section style="padding:20px 0;">

        <div id="panel" class="" style="margin:0 auto; width:90%;">
          <h1>Confirm List of students</h1>
          <div id="tabs">
            <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
              <li class="active"><a href="#student" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Student List</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">
              <div class="tab-pane active" id="student">
                <h1>Student List</h1>

                <table id="student_list_table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                    <thead>
                        <tr>
                            <th width="20%">Student NO.</th>
                            <th width="30%">Name</th>
                            <th width="20%">Gender</th>
                            <th width="20%">Course</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                   
                    <?php
                        mysql_connect("localhost","root","");
                        mysql_select_db("kiosk - testing");

                        $query_student = mysql_query("SELECT * FROM personnel_t ") or die("Error at $query_student::confirm_student_list.php:: ".mysql_error());

                    ?>



                    <tbody>
                    <?php while($row_student = mysql_fetch_assoc($query_student)){ ?>
                        <tr>
                            <td><?php echo $row_student['student_id']?></td>
                            <td><?php echo $row_student['f_name']?></td>
                            <td><?php echo $row_student['m_name']?></td>
                            <td><?php echo $row_student['l_name']?></td>
                            <td>
                                <a href="#" onclick="account_delete(<?php echo $row_student['student_id']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                           
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
              </div><!--.tab-pane-->
          
            </div><!--.tab-content-->
          </div>

        </div><!-- /#panel -->
    </section>

    



    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
        $('#student_list_table').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 100,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": false
                });

        $('#student_reg_table').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 100,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": false
                });
        });
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