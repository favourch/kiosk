<!DOCTYPE html>

<?php
session_start();
$temp_db_con = mysqli_connect("localhost","root", "","kiosk - testing");
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
        .cms-panel{
            border: 1px solid #dadada;
            border-radius: 4px;

            display: inline-block;
            vertical-align: top;
        }
        .btn-banner{
            color:#FFF;
            border:1.5px solid white;
        }
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="cms" ?>
    <?php // include "admin_left_pane.php";?>

    <section id="banner" class="" style="height:44px;">
         <div class="panel-menu-item" style="padding:5px 40px;">
              <div id="banner_buttons" style = "float:left;">
                  <a href="#" class="menu-toggle" style="color:white;">
                  <span class="glyphicon glyphicon-list-alt" > </span> Content Management
                  </a>
              </div>
              <div id="banner_buttons" style = "float:right;">
                  
                  <a href="#" class="btn btn-banner"><span class="glyphicon glyphicon-check"></span> Save</a>
                  <a href="#" class="btn btn-banner"><span class="glyphicon glyphicon-refresh"></span> Reset</a>
                  <a href="#" class="btn btn-banner"><span class="glyphicon glyphicon-back"></span> Exit</a>
              </div>
              <!--<p class="pull-right"><?php echo getActiveSem(); ?></p>-->
        </div>
    </section><!--/#services-->

    <section style="padding:20px 0;">

        <div id="left_panel" class="cms-panel" style="margin:0 50px; width:70%;">
            <!-- Nav tabs -->
                <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
                  <li class="active"><a href="#students" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Students</a></li>
                  <li><a href="#personnel" role="tab" data-toggle="tab"><i class="icon icon-time"></i> Personnel</a></li>
                  <li><a href="#classes" role="tab" data-toggle="tab"><i class="icon icon-book"></i> Classes</a></li>
                  <li><a href="#blocks" role="tab" data-toggle="tab"><i class="icon icon-pencil"></i> Blocks</a></li>
                  <li><a href="#subjects" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Subjects</a></li>
                </ul>
                <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">
                    <div class="tab-pane active" id="students">
                        
                        <div class="container">
                            <h1>Student </h1>
                            <table id="table_student" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">Student No.</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Gender</th>
                                        <th wieth="30%">Address</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                               
                                <?php
                                    //$query_student = mysqli_query($temp_db_con, "SELECT * FROM student_t") or die("Error at cms_panel.php : line 93 :: ".mysql_error());

                                ?>



                                <tbody>
                                <!--
                                <?php while($row_student=mysqli_fetch_array($query_student)){ ?>
                                    <tr>
                                        <td><?php echo $row_student['student_id']?></td>
                                        <td><?php echo $row_student['f_name']?></td>
                                        <td><?php echo $row_student['gender']?></td>
                                        <td><?php echo $row_student['address'];?></td>
                                        <td>
                                            <a href="#" onclick="account_view(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Details</a>
                                            <a href="#" onclick="account_edit(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            <a href="#" onclick="account_delete(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
                                        </td>
                                       
                                    </tr>
                                <?php }?>
                                -->
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#students-->
                    

                    <div class="tab-pane" id="personnel">
                        
                        <div class="container">
                            <h1>Personnel </h1>
                            <table id="table_personnel" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">ID No.</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Gender</th>
                                        <th width="30%">Rank</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                               
                                <?php
                                    
                                    //$query_personnel = mysqli_query($temp_db_con, "SELECT * FROM personnel_t") or die("Error at cms_panel.php : line 141 :: ".mysql_error());

                                ?>



                                <tbody>
                                <!---
                                <?php while($row_personnel=mysqli_fetch_array($query_personnel)){ ?>
                                    <tr>
                                        <td><?php echo $row_personnel['personnel_id']?></td>
                                        <td><?php echo $row_personnel['f_name']?></td>
                                        <td><?php echo $row_personnel['gender']?></td>
                                        <td><?php echo $row_personnel['academic_rank'];?></td>
                                        <td>
                                            <a href="#" onclick="account_view(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Details</a>
                                            <a href="#" onclick="account_edit(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            <a href="#" onclick="account_delete(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
                                        </td>
                                       
                                    </tr>
                                <?php }?>
                                -->
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#personnel-->

                    <div class="tab-pane" id="classes">
                        
                        <div class="container">
                            <h1>Classes </h1>
                            <table id="table_personnel" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">ID No.</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Gender</th>
                                        <th width="30%">Rank</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                               
                                <?php
                                    
                                    //$query_personnel = mysqli_query($temp_db_con, "SELECT * FROM personnel_t") or die("Error at cms_panel.php : line 141 :: ".mysql_error());

                                ?>



                                <tbody>
                                <!---
                                <?php while($row_personnel=mysqli_fetch_array($query_personnel)){ ?>
                                    <tr>
                                        <td><?php echo $row_personnel['personnel_id']?></td>
                                        <td><?php echo $row_personnel['f_name']?></td>
                                        <td><?php echo $row_personnel['gender']?></td>
                                        <td><?php echo $row_personnel['academic_rank'];?></td>
                                        <td>
                                            <a href="#" onclick="account_view(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Details</a>
                                            <a href="#" onclick="account_edit(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            <a href="#" onclick="account_delete(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
                                        </td>
                                       
                                    </tr>
                                <?php }?>
                                -->
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#classes-->

                    <div class="tab-pane" id="blocks">
                        
                        <div class="container">
                            <h1>Block </h1>
                            <table id="table_block" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">Block Name</th>
                                        <th width="20%">Course</th>
                                        <th width="10%">Year Level</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>



                                <tbody>
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#blocks-->

                    <div class="tab-pane" id="subjects">
                        
                        <div class="container">
                            <h1>Subjects </h1>
                            <table id="table_subject" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">Subject Code</th>
                                        <th width="50%">Title</th>
                                        <th width="10%">Lec. Units</th>
                                        <th width="10%">Lab. Units</th>
                                        <th width="10%">Credit Units</th>
                                    </tr>
                                </thead>
                               
                                <?php
                                    
                                    //$query_personnel = mysqli_query($temp_db_con, "SELECT * FROM personnel_t") or die("Error at cms_panel.php : line 141 :: ".mysql_error());

                                ?>



                                <tbody>
                                <!---
                                <?php while($row_personnel=mysqli_fetch_array($query_personnel)){ ?>
                                    <tr>
                                        <td><?php echo $row_personnel['personnel_id']?></td>
                                        <td><?php echo $row_personnel['f_name']?></td>
                                        <td><?php echo $row_personnel['gender']?></td>
                                        <td><?php echo $row_personnel['academic_rank'];?></td>
                                        <td>
                                            <a href="#" onclick="account_view(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Details</a>
                                            <a href="#" onclick="account_edit(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            <a href="#" onclick="account_delete(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
                                        </td>
                                       
                                    </tr>
                                <?php }?>
                                -->
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#subjects-->


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
        <div id="right_panel" class="cms-panel" style="width:20%; height:500px;">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_1">1. Official List of Students =</a>
                        </h4>
                    </div>
                    <div id="panel_1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form id="student_list" role="form" action="excel_upload/upload_student_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="student_list_file" name="student_list_file" />
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_student_list" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_3">2. List of Students - Class -</a>
                        </h4>
                    </div>
                    <div id="panel_3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="student_list_class" role="form" action="excel_upload/upload_student_list_class.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="student_list_class_file" name="student_list_class_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_student_list_class" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_4">3. List of Personnels</a>
                        </h4>
                    </div>
                    <div id="panel_4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="personnel_list" role="form" action="excel_upload/upload_personnel_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="personnel_list_file" name="personnel_list_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_personnel_list" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_5">4. Faculty Profile =</a>
                        </h4>
                    </div>
                    <div id="panel_5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="faculty_profile" role="form" action="excel_upload/upload_faculty_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="faculty_profile_file" name="faculty_profile_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_faculty_profile" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--=================================================================================-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_6">5. Faculty Load</a>
                        </h4>
                    </div>
                    <div id="panel_6" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="faculty_load" role="form" action="excel_upload/upload_faculty_load.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="faculty_load_file" name="faculty_load_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_faculty_load" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_7">6. Grades</a>
                        </h4>
                    </div>
                    <div id="panel_7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="faculty_list" role="form" action="excel_upload/upload_faculty_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="faculty_list_file" name="faculty_list_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_faculty_list" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_8">7. Assessed Fees</a>
                        </h4>
                    </div>
                    <div id="panel_8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="faculty_list" role="form" action="excel_upload/upload_faculty_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="faculty_list_file" name="faculty_list_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_faculty_list" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--/#right_panel-->
    </section>

    



    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_student').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": true,
                "bFilter": false,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_student_list.php"
            });
            $('#table_personnel').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": true,
                "bFilter": false,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_faculty_list.php"
            });
            $('#table_block').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": true,
                "bFilter": false,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_block_list.php"
            });
            $('#table_subject').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": true,
                "bFilter": false,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_subject_list.php"
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