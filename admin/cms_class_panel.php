<!DOCTYPE html>

<?php
session_start();
$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
mysqli_autocommit($temp_db_con,FALSE);
//mysqli_begin_transaction($temp_db_con);
//mysqli_query($temp_db_con,"SET autocommit = 0");

mysqli_query($temp_db_con,"BEGIN");

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
    <link href="dataTables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="dataTables/css/jquery.dataTables_themeroller.css" rel="stylesheet">
    
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
        .panel-default > .panel-heading{
            background-color: #837E90;
        }
        a:hover, a:focus {
            color: #FFEF50;

        }
        table tbody th{
            font-weight: normal;
            font-size: 12px;
        }
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="cms-class" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="height:44px;">
         <div class="panel-menu-item" style="">
                  <a href="#" class="menu-toggle" style="color:white;">
                  <span class="glyphicon glyphicon-list-alt" > </span> Content Management
                  </a>
                  <p class="sem-header">Active semester : <?php echo sem_name(semester()); ?></p>

             
              <div id="banner_buttons" style = "float:right;">
                  <!-- 
                  <a href="actions/content_save.php" class="btn btn-banner"><span class="glyphicon glyphicon-check"></span> Save</a>
                  <a href="actions/content_reset.php" class="btn btn-banner"><span class="glyphicon glyphicon-refresh"></span> Reset</a>
                   -->
                   <!-- <a href="cms.php" class="btn btn-banner"><span class="glyphicon glyphicon-back"></span> Exit</a> -->
              </div>
              <!--<p class="pull-right"><?php echo getActiveSem(); ?></p>-->
        </div>
    </section><!--/#services-->

    <section style="padding:20px 0;">
      <div id="panel" style="width:75%;">
        <div id="left_panel" class="cms-panel" style="margin:0; width:74%;">
            <!-- Nav tabs -->
                <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
                  <li class="active"><a href="#classes" role="tab" data-toggle="tab"><i class="icon icon-book"></i> Classes</a></li>
                  <li><a href="#students" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Students</a></li>
                  <li><a href="#faculty" role="tab" data-toggle="tab"><i class="icon icon-time"></i> Faculty</a></li>
                  <li><a href="#blocks" role="tab" data-toggle="tab"><i class="icon icon-pencil"></i> Blocks</a></li>
                  <li><a href="#subjects" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Subjects</a></li>
                  <!-- <li><a href="#grades" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Grades</a></li>  -->
                </ul>
                <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">
                    <div class="tab-pane active" id="classes">
                        
                        <div class="container">
                            <h1>Classes </h1>
                            <table id="table_class" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="15%">Block</th>
                                        <th width="10%">Subject</th>
                                        <th width="25%">Subject Title</th>
                                        <th width="25%">Faculty</th>
                                        
                                        <th width="10%"># Stud.</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>



                                <tbody>
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#classes-->

                    <div class="tab-pane" id="students">
                        
                        <div class="container">
                            <h1>Student </h1>
                            <table id="table_student" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">Student No.</th>
                                        <th width="30%">Name</th>
                                        <th width="10%">Gender</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Load</th>
                                        <!-- <th width="20%">Action</th> -->
                                    </tr>
                                </thead>


                                <tbody>
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#students-->
                    

                    <div class="tab-pane" id="faculty">
                        
                        <div class="container">
                            <h1>Faculty  </h1>
                            <table id="table_faculty" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="10%">ID No.</th>
                                        <th width="40%">Name</th>
                                        <th width="5%">Gender</th>
                                        <th width="25%">Rank</th>
                                        <th width="10%">Load</th>
                                        <!-- <th width="10%">Action</th> -->
                                    </tr>
                                </thead>
                               

                                <tbody>
                                </tbody>
                            </table>

                           
                            
                        </div>
                    </div> <!-- /#personnel-->

                    <div class="tab-pane" id="blocks">
                        
                        <div class="container">
                            <h1>Block </h1>
                            <table id="table_block" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">Block Name</th>
                                        <th width="20%">Course</th>
                                        <th width="10%">Year Level</th>
                                        <!-- <th width="20%">Action</th> -->
                                    </tr>
                                </thead>



                                <tbody>
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#blocks-->

                    <div class="tab-pane" id="subjects">
                        
                        <div class="container">
                            <h1>Subjects </h1><!-- <a class="btn btn-primary">Insert single entry</a> -->
                            <table id="table_subject" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="10%">Subject Code</th>
                                        <th width="40%">Title</th>
                                        <th width="10%">Lec. Units</th>
                                        <th width="10%">Lab. Units</th>
                                        <th width="10%">Credit Units</th>
                                        <!-- <th width="20%">Credit Units</th> -->
                                    </tr>
                                </thead>
        

                                <tbody>
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
        <div id="right_panel" class="cms-panel" style="width:25%; height:500px;">
            <div style="border-bottom: 5px #428BCA solid;
                        box-shadow: 0px 5px 15px -10px;
                        padding: 15px;
                        margin-bottom: 10px;
                        font-size: 16px;
                        font-weight: 500;">
                <span class="icon icon-upload" style="font-size:22px;"></span>
                Excel Uploads
            </div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_1">Official List of Students</a>
                        </h4>
                    </div>
                    <div id="panel_1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form id="student_list" onsubmit="return validate_student_list()" role="form" action="excel_upload/upload_student_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="student_list_file" name="student_list_file">
                              </div>
                              
                                <input type="submit" name="submit_student_list" class="btn btn-success btn-block" value="Upload" />
                                <hr>
                                <h5><strong>File template</strong></h5>
                                <p><i><small>NOTICE: please ensure that the file to be uploaded follows the given template.</small></i></p>

                                <div style="text-align:center">
                                  <a href="excel_upload/download_student_list_template.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-download"></span> Download Template</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_class">Classes</a>
                        </h4>
                    </div>
                    <div id="panel_class" class="panel-collapse collapse ">
                        <div class="panel-body">
                            
                            <form id="classes" onsubmit="return validate_classes()" role="form" action="excel_upload/upload_classes.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="classes_file" name="classes_file">
                              </div>
                              
                                <input type="submit" name="submit_classes" class="btn btn-success btn-block" value="Upload" />
                                <hr>
                                <h5><strong>File template</strong></h5>
                                <p><i><small>NOTICE: please ensure that the file to be uploaded follows the given template.</small></i></p>

                                <div style="text-align:center">
                                  <a href="excel_upload/download_classes_template.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-download"></span> Download Template</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_class_list">CLass List : Students</a>
                        </h4>
                    </div>
                    <div id="panel_class_list" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="class_list" onsubmit="return validate_class_list()" role="form" action="excel_upload/upload_class_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="class_list_file" name="class_list_file">
                              </div>
                              
                                <input type="submit" name="submit_class_list" class="btn btn-success btn-block" value="Upload" />
                                <hr>
                                <h5><strong>File template</strong></h5>

                                <div style="text-align:center">
                                  <a href="excel_upload/download_class_list_template.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-download"></span> Download Template</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_grades">CLass Grades : Students</a>
                        </h4>
                    </div>
                    <div id="panel_grades" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="grades" onsubmit="return validate_grades()" role="form" action="excel_upload/upload_grades.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="grades_file" name="grades_file">
                              </div>
                              
                                <input type="submit" name="submit_grades" class="btn btn-success btn-block" value="Upload" />
                                <hr>
                                <h5><strong>File template</strong></h5>

                                <div style="text-align:center">
                                  <a href="excel_upload/download_grades_template.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-download"></span> Download Template</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                

               
                <!--=================================================================================-->
                
                
            </div>
        </div><!--/#right_panel-->
      </div><!-- /#panel -->
    </section>

    <!-- MODAL for Editing student -->
    <div id="edit_modal" class="modal fade " >
    <div class="modal-dialog" style>
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Edit</h3>
            </div>
                
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">

                <input type="button" value="UPDATE"  name="edit_button" id="edit_button" class="upload btn btn-success"/>
                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>



    <!-- MODAL for student Load -->
    <div id="sload_modal" class="modal fade " >
    <div class="modal-dialog" style="width:80%">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Load</h3>
            </div>
                
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Student ID: </label>
                        <input type="text" id="sload_modal_id" disabled class="form-control" style="display:inline-block;width:15%" />
                        <label>Name: </label>
                        <input type="text" id="sload_modal_name" disabled class="form-control" style="display:inline-block;width:50%"/>
                    </div>
                    <div class="form-group">
                        <label>Semester: </label>
                        <select id="sload_modal_sem" class="form-control" style="display:inline-block;width:60%;">

                        <?php 
                        $query_sem = mysqli_query($temp_db_con, "SELECT * FROM semester_t ORDER BY sem_id DESC") or die(trigger_error(mysqli_error($temp_db_con)));
                        while($row_sem = mysqli_fetch_array($query_sem)){
                            $sem_id = $row_sem['sem_id'];
                            $ay_id = $row_sem['ay_no'];
                            $sem_no = $row_sem['sem_no'];
                            $query_ay = mysqli_query($temp_db_con, "SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(trigger_error(mysqli_error($temp_db_con)));
                            $row_ay = mysqli_fetch_array($query_ay);
                            $year_start = $row_ay['year_start'];
                            $year_end = $row_ay['year_end'];
                            switch($sem_no){
                                case 1: 
                                    $sem_no = "1st Semester";
                                    break;
                                case 2:
                                    $sem_no = "2nd Semester";
                                    break;
                                case 3:
                                    $sem_no = "Summer";
                                    break;
                                default : 
                                    $sem_no = "Undefined Semester";
                                    break;
                            }
                        ?>
                            <option value="<?php echo $sem_id; ?>"><?php echo $sem_no." ".$year_start." - ".$year_end;?></option>
                            
                        <?php } ?>
                        </select>
                    </div>
                </form>
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Subject Title</th>
                            <th>Block</th>
                            <th>Professor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
        
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>


    <div id="pload_modal" class="modal fade " >
    <div class="modal-dialog" style="width:80%">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Load</h3>
            </div>
                
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Personnel ID: </label>
                        <input type="text" id="pload_modal_id" disabled class="form-control" style="display:inline-block;width:15%" />
                        <label>Name: </label>
                        <input type="text" id="pload_modal_name" disabled class="form-control" style="display:inline-block;width:50%"/>
                    </div>
                    <div class="form-group">
                        <label>Semester: </label>
                        <select id="pload_modal_sem" class="form-control" style="display:inline-block;width:60%;">

                        <?php 
                        $query_sem = mysqli_query($temp_db_con, "SELECT * FROM semester_t ORDER BY sem_id DESC") or die(trigger_error(mysqli_error($temp_db_con)));
                        while($row_sem = mysqli_fetch_array($query_sem)){
                            $sem_id = $row_sem['sem_id'];
                            $ay_id = $row_sem['ay_no'];
                            $sem_no = $row_sem['sem_no'];
                            $query_ay = mysqli_query($temp_db_con, "SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(trigger_error(mysqli_error($temp_db_con)));
                            $row_ay = mysqli_fetch_array($query_ay);
                            $year_start = $row_ay['year_start'];
                            $year_end = $row_ay['year_end'];
                            switch($sem_no){
                                case 1: 
                                    $sem_no = "1st Semester";
                                    break;
                                case 2:
                                    $sem_no = "2nd Semester";
                                    break;
                                case 3:
                                    $sem_no = "Summer";
                                    break;
                                default : 
                                    $sem_no = "Undefined Semester";
                                    break;
                            }
                        ?>
                            <option value="<?php echo $sem_id; ?>"><?php echo $sem_no." ".$year_start." - ".$year_end;?></option>
                            
                        <?php } ?>
                        </select>
                    </div>
                </form>
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Subject Ttile</th>
                            <th>Block</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
        
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>

    <div id="class_list_modal" class="modal fade " >
    <div class="modal-dialog" style="width:80%">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>CLass List</h3>
            </div>
 
            <div class="modal-body">
                <table style="width:100%;margin:30px 0;">
                    <colgroup>
                        <col width="10%" >
                        <col width="90%" >
                    </colgroup>
                    <tr class="form-group">
                        <th><label>Subject: </label></th>
                        <th><input type="text" id="class_list_subject" disabled class="form-control" style="display:inline-block;width:50%" /></th>
                    </tr>
                    <tr class="form-group">
                        <th><label>Block: </label></th>
                        <th><input type="text" id="class_list_block" disabled class="form-control" style="display:inline-block;width:50%"/></th>
                    </tr>
                    <tr class="form-group">
                        <th><label>Faculty: </label></th>
                        <th><input type="text" id="class_list_faculty" disabled class="form-control" style="display:inline-block;width:50%"/></th>
                    </tr>
                </table>
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Gender</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody id="class_list_table">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
        
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>
                



    <div id="msg_modal" class="modal fade " >
    <div class="modal-dialog" style="margin-top:100px;width:500px;">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="margin:0;">Message</h3>
            </div>
                
            <div class="modal-body" style="text-align:center">
                <h4 id="msg_content">Message goes here...</h4>
                
            </div>
            <div class="modal-footer">
        
                <button type="button" class="btn btn-success" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>

    <div id="warning_modal" class="modal fade " >
    <div class="modal-dialog" style="margin-top:100px;width:500px;">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="margin:0;">Message</h3>
            </div>
                
            <div class="modal-body" style="text-align:center">
                <h4 id="warning_content">Message goes here...</h4>
                
            </div>
            <div class="modal-footer">
        
                <button id="warning_btn" type="button" class="btn btn-danger hidden" data-dismiss="modal"> DELETE</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="dataTables/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_student').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,
                "bFilter": true,
                "bInfo": true,
                "processing": true,
                "ajax": "ajax/load_student_list.php"
            });
            $('#table_faculty').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": true,
                "processing": true,
                "ajax": "ajax/load_faculty_list.php"
            });
            $('#table_block').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": true,
                "processing": true,
                "ajax": "ajax/load_block_list.php"
            });
            $('#table_subject').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": true,
                "processing": true,
                "ajax": "ajax/load_subject_list.php"
            });
            $('#table_class').dataTable({
                "bLengthChange": false,

                'iDisplayLength': 5,
                "scrollY":"250px",
                "scrollX":false,
                "scrollCollapse": true,
                "paging":false,

                "bJQueryUI":false,
                "bFilter": true,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_class_list.php"
            });
        });
        
        $("#sload_modal_sem").change(sload_modal_data);
        $("#pload_modal_sem").change(pload_modal_data);


        function sload_modal_data(){
            //alert("semester load changed");
            var student_id = $("#sload_modal_id").val();
            var sem_id = $("#sload_modal_sem").val();
            var arr = {"sem_id":sem_id, "student_id":student_id};
            console.log("chaning semester to view load: student_id = "+student_id+", sem_id = "+sem_id);
            $.ajax({
                url: "ajax/load_load_list.php",
                type: "GET",
                data: arr,
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);

                    var len = details['data'].length;
                    var list = "";
                    if(len>0){
                        for(var i=0;i<len;i++){
                            list += "<tr>";
                            for(var j=0;j<4;j++){
                                list += "<th>";
                                list += details['data'][i][j];
                                list += "</th>";
                            }
                            list += "</th>";
                            
                        }
                    }
                    else{
                        list="<tr><th colspan='4'>Student has no Load for this Semester.</th></tr>";
                    }
                    $("#sload_modal .table tbody").html(list);

                }
            });
        }
        function pload_modal_data(){
            //alert("semester load changed");
            var personnel_id = $("#pload_modal_id").val();
            var sem_id = $("#pload_modal_sem").val();
            var arr = {"sem_id":sem_id, "personnel_id":personnel_id};
            console.log("chaning semester to view load: personnel_id = "+personnel_id+", sem_id = "+sem_id);
            $.ajax({
                url: "ajax/load_load_list.php",
                type: "GET",
                data: arr,
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);

                    var len = details['data'].length;
                    var list = "";
                    if(len>0){
                        for(var i=0;i<len;i++){
                            list += "<tr>";
                            for(var j=0;j<3;j++){
                                list += "<th>";
                                list += details['data'][i][j];
                                list += "</th>";
                            }
                            list += "</th>";
                            
                        }
                    }
                    else{
                        list="<tr><th colspan='4'>Faculty has no Load for this Semester.</th></tr>";
                    }
                    $("#pload_modal .table tbody").html(list);

                }
            });
        }
        function validate(){
             valid = true;
             var str = $("#classes_file").val();
             if (!str.match("xlsx$")) {
               valid = false;
            }
            
            return valid;
        }

        function view_class_list(class_id){
            //window.open('cms_view_class_list.php?class_id='+class_id,'','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=550,position=center');
            $("#class_list_modal").modal('toggle');
            $.ajax({
                url: "ajax/details_class.php",
                type: "GET",
                data: {class_id:class_id},
                async: false,
                success:function(data){
                    
                    var details = jQuery.parseJSON(data);
                    //alert(details);
                    $('#class_list_subject').val(details['subject_title']);
                    $('#class_list_block').val(details['block_name']);
                    $('#class_list_faculty').val(details['faculty']);
                }
            });
            $.ajax({
                url: "ajax/class_list.php",
                type: "GET",
                data: {class_id:class_id},
                async: false,
                success:function(data){
                    
                    //alert(data);
                    $('#class_list_table').html(data);
                }
            });

        }
        function upload_grades(class_id){
            window.open('cms_view_class_list_grades.php?class_id='+class_id,'','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=550,position=center');
        }
        function validate_classes(){
            valid = true;
            var str = $("#classes_file").val();
            var msg = "";
            if(str==""){
                valid = false;
                msg = "No file chosen.";
            }
            else if (!str.match(".xlsx$")) {
                valid = false;
                msg = "File type invalid.";
            }
            if(valid==false){
                $("#warning_content").text(msg);
                $("#warning_modal").modal("toggle");
            }
            return valid;
        }
        function validate_class_list(){
            valid = true;
            var str = $("#class_list_file").val();
            var msg = "";
            if(str==""){
                valid = false;
                msg = "No file chosen.";
            }
            else if (!str.match(".xlsx$")) {
                valid = false;
                msg = "File type invalid.";
            }
            if(valid==false){
                $("#warning_content").text(msg);
                $("#warning_modal").modal("toggle");
            }
            return valid;
        }
        function validate_student_list(){
            valid = true;
            var str = $("#student_list_file").val();
            var msg = "";
            if(str==""){
                valid = false;
                msg = "No file chosen.";
            }
            else if (!str.match(".xlsx$")) {
                valid = false;
                msg = "File type invalid.";
            }
            if(valid==false){
                $("#warning_content").text(msg);
                $("#warning_modal").modal("toggle");
            }
            return valid;
        }
        function validate_grades(){
            valid = true;
            var str = $("#grades_file").val();
            var msg = "";
            if(str==""){
                valid = false;
                msg = "No file chosen.";
            }
            else if (!str.match(".xlsx$")) {
                valid = false;
                msg = "File type invalid.";
            }
            if(valid==false){
                $("#warning_content").text(msg);
                $("#warning_modal").modal("toggle");
            }
            return valid;
        }
        <?php
        if(isset($_SESSION['kiosk']['error'])){
            $status = $_SESSION['kiosk']['error'];
            if($status==1){
            ?>
                $("#msg_content").text("Successfully uploaded data.");
                $("#msg_modal").modal("toggle");
                
            <?php
            }
            else{
            ?>
                $("#warning_content").text("<?php echo $status; ?>");
                $("#warning_modal").modal("toggle");
            <?php
            }
            unset($_SESSION['kiosk']['error']);
        }


        ?>
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
    <script src="js/cms_panel.js"></script>

</body>
</html>