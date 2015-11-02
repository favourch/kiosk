<!DOCTYPE html>



<?php
session_start();
if(!isset($_SESSION['kiosk']['student_id'])){
    header("location: student-verification.php");
}

include "db/db.php";

include "actions/misc_functions.php";



$block_id = 1;
$query_block = mysql_query("SELECT * FROM student_block_t WHERE block_id='{$block_id}'") or die(trigger_error(mysql_error()));
$row_block = mysql_fetch_assoc($query_block);
$year_level = "4th Year";
$course = "Bachelor of Science in Information Technology";
$block_letter = "C";
$sem = semester();
$student_id = $_SESSION['kiosk']['student_id'];


$query_reg = mysql_query("SELECT reg_no FROM student_registration_t WHERE student_id='{$student_id}' AND sem_id='{$sem}'") or die("query reg line 32: ".trigger_error(mysql_error()));
$row_reg = mysql_fetch_assoc($query_reg);
$reg_no = $row_reg['reg_no'];

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ours.css" rel="stylesheet">
    <link href="css/schedules.css" rel="stylesheet">
    <link href="css/timetables.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
        .profile_holder{
            /*margin: 50px 150px;*/
            background-color: #fff;
            padding: 60px;
            border-radius: 5px;
            font-size: 18px;    
            border: 1px #D5D5D5 solid;
        }
        .profile-status{
            width: 75%;
            margin: 20px auto;
            padding: 10px 50px;
            background-color: #14A043;
            border: 1px solid #008899;
            border-radius: 5px;
            color: #fff;
            font-size: 36px;
            font-weight: normal;
            text-align: center;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{

            font-weight: normal;
        }
        .table{
            background-color:#fff;
            margin-bottom: 50px;
        }
        .table-bordered>thead>tr>th, .table-bordered>thead>tr>td{
            border-bottom: 0px;
            background-color: #FFDB7E;
            background-color: #DCE9F5;
            font-weight: bold;

        }
        .tab-pane{
            height:100%;
        }
        table th{
            line-height: 20px;
            /*line-height: 36px;*/
            font-size: 14px;    
        }
        .t-label{
        	font-weight: normal;
        	vertical-align: top;
            line-height: 36px;

        }
        .t-value{
        	padding-left: 10px;
        	vertical-align: top;
            line-height: 36px;

        }
        .profile_holder table th{
            font-size: 18px;    
        
        }
    </style>
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3><i class="icon-user" ></i> Student Information System <?php // echo $student_id." ".$reg_no;?></h3>
                <h5>Semester : <?php echo sem_name(semester());?></h5>

            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:10px; height:90%">
        <div id="panel" >
                <!-- Nav tabs -->
                <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
                  <li id="profile_tab" ><a href="#profile" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Student Profile</a></li>
                  <li id="schedule_tab"><a href="#schedule" role="tab" data-toggle="tab"><i class="icon icon-time"></i> Class Schedule</a></li>
                  <li id="load_tab"><a href="#load" role="tab" data-toggle="tab"><i class="icon icon-book"></i> Student Load</a></li>
                  <li id="grades_tab"><a href="#grades" role="tab" data-toggle="tab"><i class="icon icon-pencil"></i> Grades</a></li>
                  <li id="payments_tab"><a href="#payments" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Payments</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">

<!-- ==================================================================================================================================================== -->
<!-- ==================================================================================================================================================== -->

                  <div class="tab-pane " id="profile">
                  </div> <!-- /#profile-->
<!-- ==================================================================================================================================================== -->
<!-- ==================================================================================================================================================== -->


                  <div class="tab-pane " id="load">
                  </div> <!-- /#load-->
<!-- ==================================================================================================================================================== -->
<!-- ==================================================================================================================================================== -->
                 

                  <div class="tab-pane " id="grades">
                  </div> <!-- /#grades-->

<!-- ==================================================================================================================================================== -->
<!-- ==================================================================================================================================================== -->


                  <div class="tab-pane " id="schedule">

                  </div> <!-- /#schedule-->

<!-- ==================================================================================================================================================== -->
<!-- ==================================================================================================================================================== -->

                  <div class="tab-pane" id="payments">
                  </div> <!-- /#payments-->

<!-- ==================================================================================================================================================== -->
                </div>
        </div><!-- /#panel -->
    </section>



<!-- MODAL CODES -->
<div id="ticket_modal" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width:700px;height:500px;margin-top:100px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="padding:0;margin:0;" >Schedule Ticket</h3>
            
                
                <div class="modal-body">
                    <!--
                      <h4><?php echo $faculty_name; ?></h4>
                      <h6><?php echo $faculty_position; ?></h6>
                      <h6><?php echo $faculty_department; ?></h6>
                    -->
                      <hr>
                      <table id="schedule_details">
                        <tr>
                          <th width="150px">Course Block</th>
                          <th id="ticket-block">BSIT 3c</th>
                        </tr>
                        <tr>
                          <th>Course Title</th>
                          <th id="ticket-subject_title">Introduction to Computer Science</th>
                        </tr>
                        <tr>
                          <th>Course Code</th>
                          <th id="ticket-subject_code">CS 11</th>
                        </tr>
                        <th>Faculty</th>
                          <th id="ticket-faculty">CSB2 201</th>
                        </tr>
                        <tr>
                          <th>Day</th>
                          <th id="ticket-day">Monday</th>
                        </tr>
                        <tr>
                          <th>Time</th>
                          <th id="ticket-time">7:00AM - 8:00AM</th>
                        </tr>
                        <tr>
                          <th>ROOM</th>
                          <th id="ticket-room">CSB2 201</th>
                        </tr>
                        <tr>
                        
                      </table>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                </div>
            </div>
                

        </div>
    </div>
</div>
    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
       
        function toggleSize(){
            var timetable = $("#timetable");
            timetable.toggleClass("compact-table");
        }
        function loadBlockTimetable( block_id ){
        	console.log("loadBlockTimetable function working.");
        	$.ajax({
                url: "ajax/timetable_block.php",
                type: "GET",
                data: {block_id:block_id},
                async : true,
                success: function(data){
                    //alert(data);
                    $("#shcedule_timetable").empty();
                    $("#shcedule_timetable").html(data);
                }
            });
        }
        function loadStudentTimetable( student_id ){
        	console.log("loadStudentTimetable function working.");
        	$.ajax({
                url: "ajax/timetable_student.php",
                type: "GET",
                data: {student_id:student_id},
                async : true,
                success: function(data){
                    //alert(data);
                    $("#shcedule_timetable").empty();
                    $("#shcedule_timetable").html(data);
                }
            });
        }
        function show_ticket(schedule_id){
            $.ajax({
                url: "ajax/schedule_details.php",
                type: "GET",
                data: {schedule_id:schedule_id},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    var block = details['block']; //details['course_code']+" "+
                    var subject_title = details['subject_title'];
                    var subject_code = details['subject_code'];
                    var day = details['day'];
                    var time = details['start_time']+" - "+details['end_time'];
                    var room = details['room'];
                    var faculty = details['faculty_name'];

                    $("#ticket-block").text(block);
                    $("#ticket-subject_title").text(subject_title);
                    $("#ticket-subject_code").text(subject_code);
                    $("#ticket-day").text(day);
                    $("#ticket-time").text(time);
                    $("#ticket-room").text(room);
                    $("#ticket-faculty").text(faculty);
                }
            });

            $("#ticket_modal").modal("toggle");
        }
        $(document).ready(function(){
            var url = window.location;
            var array = String(url).split("#");
            var target="profile";
            //alert(target[1]);
            if(array.length>1){
                target = array[1];
            }
            $.ajax({
                url: "ajax/sis_profile.php",
                type: "GET",
                data: {student_id:"<?php echo $student_id; ?>"},
                async : false,
                success: function(data){
                    //alert(data);
                    $("#profile").html(data);
                }
                   
            });
            $.ajax({
                url: "ajax/sis_schedule.php",
                type: "GET",
                data: {student_id:"<?php echo $student_id; ?>"},
                async : false,
                success: function(data){
                    //alert(data);
                    $("#schedule").html(data);
                }
                   
            });
            $.ajax({
                url: "ajax/sis_load.php",
                type: "GET",
                data: {student_id:"<?php echo $student_id; ?>"},
                async : false,
                success: function(data){
                    //alert(data);
                    $("#load").html(data);
                }
                   
            });
            $.ajax({
                url: "ajax/sis_grades.php",
                type: "GET",
                data: {student_id:"<?php echo $student_id; ?>"},
                async : false,
                success: function(data){
                    //alert(data);
                    $("#grades").html(data);
                }
                   
            });
            $.ajax({
                url: "ajax/sis_payments.php",
                type: "GET",
                data: {student_id:"<?php echo $student_id; ?>"},
                async : false,
                success: function(data){
                    //alert(data);
                    $("#payments").html(data);
                }
                   
            });
            var url = window.location;
            var array = String(url).split("#");
            var target="profile";
            //alert(target[1]);
            if(array.length>1){
                target = array[1];

            }
            switch(target){
                case "profile":
                case "load":
                case "schedule":
                case "grades":
                case "payments":
                    break;
                default:
                    target = "profile";
                    break
            }
            $("#"+target).addClass("active");
            $("#"+target+"_tab").addClass("active");

        });
    </script>

</body>
</html>