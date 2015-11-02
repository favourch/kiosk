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
                  <!-- 
                  <a href="actions/content_save.php" class="btn btn-banner"><span class="glyphicon glyphicon-check"></span> Save</a>
                  <a href="actions/content_reset.php" class="btn btn-banner"><span class="glyphicon glyphicon-refresh"></span> Reset</a>
                   -->
                   <a href="cms.php" class="btn btn-banner"><span class="glyphicon glyphicon-back"></span> Exit</a>
              </div>
              <!--<p class="pull-right"><?php echo getActiveSem(); ?></p>-->
        </div>
    </section><!--/#services-->

    <section style="padding:20px 0;">

        <div id="left_panel" class="cms-panel" style="margin:0 50px; margin-right: 10px; width:70%;">
            <!-- Nav tabs -->
                <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
                  <li class="active"><a href="#students" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Students</a></li>
                  <li><a href="#personnel" role="tab" data-toggle="tab"><i class="icon icon-time"></i> Personnel</a></li>
                  <li><a href="#classes" role="tab" data-toggle="tab"><i class="icon icon-book"></i> Classes</a></li>
                  <li><a href="#blocks" role="tab" data-toggle="tab"><i class="icon icon-pencil"></i> Blocks</a></li>
                  <li><a href="#subjects" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Subjects</a></li>
                  <!-- <li><a href="#grades" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Grades</a></li>  -->
                </ul>
                <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">
                    <div class="tab-pane active" id="students">
                        
                        <div class="container">
                            <h1>Student </h1>
                            <table id="table_student" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">Student No.</th>
                                        <th width="30%">Name</th>
                                        <th width="10%">Gender</th>
                                        <th wieth="10%">Status</th>
                                        <th wieth="10%">Load</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                </tbody>
                            </table>
                                
                           
                            
                        </div>
                    </div> <!-- /#students-->
                    

                    <div class="tab-pane" id="personnel">
                        
                        <div class="container">
                            <h1>Personnel  </h1>
                            <table id="table_personnel" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="10%">ID No.</th>
                                        <th width="40%">Name</th>
                                        <th width="5%">Gender</th>
                                        <th width="25%">Rank</th>
                                        <th width="10%">Load</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                

                                <tbody>
                                </tbody>
                            </table>

                           
                            
                        </div>
                    </div> <!-- /#personnel-->

                    <div class="tab-pane" id="classes">
                        
                        <div class="container">
                            <h1>Classes </h1>
                            <table id="table_class" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="10%">Block</th>
                                        <th width="10%">Subject</th>
                                        <th width="30%">Faculty</th>
                                        <th width="30%">Class Schedule</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>



                                <tbody>
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
                            <h1>Subjects </h1><!-- <a class="btn btn-primary">Insert single entry</a> -->
                            <table id="table_subject" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="10%">Subject Code</th>
                                        <th width="40%">Title</th>
                                        <th width="10%">Lec. Units</th>
                                        <th width="10%">Lab. Units</th>
                                        <th width="10%">Credit Units</th>
                                        <th width="20%">Credit Units</th>
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
        <div id="right_panel" class="cms-panel" style="width:20%; height:500px;">
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
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_3">Student Load</a>
                        </h4>
                    </div>
                    <div id="panel_3" class="panel-collapse in">
                        <div class="panel-body">
                            <form id="student_load" role="form" action="excel_upload/upload_student_load.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="student_load_file" name="student_load_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <a href="excel_upload/download_student_load_template.php" class="btn btn-default"><span class="glyphicon icon-download"></span> Download Template</a>
                                <input type="submit" name="submit_student_load" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_6">Faculty Load</a>
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
                                <a href="excel_upload/download_faculty_load_template.php" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</a>
                                <input type="submit" name="submit_faculty_load" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_4">List of Personnels</a>
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
                                <a href="excel_upload/download_list_personnel_template.php" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</a>
                                <input type="submit" name="submit_personnel_list" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--=================================================================================-->
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel_7">6. Grades</a>
                        </h4>
                    </div>
                    <div id="panel_7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form id="faculty_list" role="form" action="excel_upload/upload_grades.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="grades_file" name="grades_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_grades" class="btn btn-success" value="Upload" />
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
                            <form id="payments" role="form" action="excel_upload/upload_payments.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="payments_file" name="payments_file">
                              </div>
                              
                              <div class="btn-grp pull-right">
                                <button class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Template</button>
                                <input type="submit" name="submit_payments" class="btn btn-success" value="Upload" />
                              </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--/#right_panel-->
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
                        $query_sem = mysqli_query($temp_db_con, "SELECT * FROM semester_t") or die(trigger_error(mysqli_error($temp_db_con)));
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
                            <th>Subject</th>
                            <th>Block</th>
                            <th>Professor</th>
                            <th>Schedule</th>
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
                        $query_sem = mysqli_query($temp_db_con, "SELECT * FROM semester_t") or die(trigger_error(mysqli_error($temp_db_con)));
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
                            <th>Subject</th>
                            <th>Block</th>
                            <th>Professor</th>
                            <th>Schedule</th>
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
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_student_list.php"
            });
            $('#table_personnel').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_faculty_list.php"
            });
            $('#table_block').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": false,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_block_list.php"
            });
            $('#table_subject').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": false,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_subject_list.php"
            });
            $('#table_class').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

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
                    $("#pload_modal .table tbody").html(list);

                }
            });
        }
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