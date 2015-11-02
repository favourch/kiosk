<!DOCTYPE html>



<?php
session_start();
if(!isset($_SESSION['kiosk']['student_id'])){
    header("location: student-verification.php");
}

include "db/db.php";
include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
//include "actions/sched_functions.php";
include "actions/subject_functions.php";
//include "actions/load_schedule.php"; //to pre-load schedule on the time table.
include "actions/scheduling_functions.php";




$block_id = 1;
$query_block = mysql_query("SELECT * FROM student_block_t WHERE block_id='{$block_id}'") or die(mysql_error());
$row_block = mysql_fetch_assoc($query_block);
$year_level = "4th Year";
$course = "Bachelor of Science in Information Technology";
$block_letter = "C";

$student_id = $_SESSION['kiosk']['student_id'];


$query_reg = mysql_query("SELECT reg_no FROM student_registration_t WHERE student_id='{$student_id}'") or die("query reg line 32: ".mysql_error());
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
            border: 1px #D5D5D5 solid;
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
            font-size: 18px;    
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
        
    </style>
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3><i class="icon-user" ></i> Student Information System <?php // echo $student_id." ".$reg_no;?></h3>
            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:10px; height:90%">
        <div id="panel" >
                <!-- Nav tabs -->
                <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
                  <li class="active"><a href="#profile" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Student Profile</a></li>
                  <li><a href="#schedule" role="tab" data-toggle="tab"><i class="icon icon-time"></i> Class Schedule</a></li>
                  <li><a href="#load" role="tab" data-toggle="tab"><i class="icon icon-book"></i> Student Load</a></li>
                  <li><a href="#grades" role="tab" data-toggle="tab"><i class="icon icon-pencil"></i> Grades</a></li>
                  <li><a href="#payments" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Paymets</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">
                  <div class="tab-pane active" id="profile">
                    <?php

                    $query_student = mysql_query("SELECT * FROM student_t WHERE student_id='{$student_id}'") or die(mysql_error());
                    $row_student = mysql_fetch_assoc($query_student);
                    $f_name = $row_student['f_name'];
                    $m_name = $row_student['m_name'];
                    $l_name = $row_student['l_name'];
                    $status = $row_student['status'];
                    $address = $row_student['address'];
                    $gender=$row_student['gender'];



                    $sem_id = semester();
                    $query_reg = mysql_query("SELECT * FROM student_registration_t WHERE student_id='{$student_id}' AND sem_id='{$sem_id}'") or die(mysql_error());
                    $row_reg = mysql_fetch_assoc($query_reg);

                    //$reg_no = $row_reg['reg_no'];
                    $coures_code = $row_reg['course_code'];
                    $year_level = $row_reg['year_level'];

                    $date_of_reg=$row_reg['reg_date'];
                    $reg_of_date=strtotime($date_of_reg);
                    $year_of_reg=date("Y", $reg_of_date);
                    $next_yr=$year_of_reg+1;




                    $query_course = mysql_query("SELECT * FROM course_t WHERE course_code='{$course_code}'") or die(mysql_error());
                    $row_course = mysql_fetch_assoc($query_course);

                    $course_title = $row_course['course_title'];




                    ?>
                    <div class="container">
                        <h1>Student Profile</h1>

                        <div class="profile_holder">
                        <div class="container">
                          <div class="col-md-8">
                              <table style="width:100%">
                                <colgroup>
                                    <col width="100px"/>
                                    <col width="300px"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Fullname:</th>
                                  <th class="t-value"><?php echo strtoupper($l_name).", ".strtoupper($f_name)." ".ucfirst($m_name);?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Gender:</th>
                                  <th class="t-value"><?php echo $gender;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">College</th>
                                  <th class="t-value"><?php echo "College of Science";?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Program</th>
                                  <th class="t-value"><?php echo $course_title;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Major</th>
                                  <th class="t-value"></th>
                                </tr>
                              </table>
                          </div>
                          <div class="col-md-4">
                              <table>
                                <colgroup>
                                    <col width="200"/>
                                    <col width="300"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Student No:</th>
                                  <th class="t-value"><?php echo $student_id;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label"><!-- Academic Year -->A. Y.:</th>
                                  <th class="t-value"><?php echo $year_of_reg."-".$next_yr;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Year Level:</th>
                                  <th class="t-value"><?php echo print_level($year_level); ?></th>
                                </tr>
                                <tr>
                                  <th class="t-label"><!-- Retention  -->Status:</th>
                                  <th class="t-value"></th>
                                </tr>
                              </table>
                          </div>
                        </div> <!-- /.container -->
                        </div> <!-- /profile_holder -->
                        
                       
                        <!-- <div class="col-lg-6">
                            <table style="width:100%">
                              
                              <tr>
                                <th class="t-label">Student No: </th>
                                <th class="t-value" ><?php echo $student_id;?></th>
                              </tr>
                              <tr>
                                <th class="t-label">Name: </th>
                                <th class="t-value" ><?php echo $f_name." ".$l_name;?></th>
                              </tr>
                              <tr>
                                <th class="t-label">Gender: </th>
                                <th class="t-value" ><?php echo $gender;?></th>
                              </tr>
                              <tr>
                                <th class="t-label">Age: </th>
                                <th class="t-value" ></th>
                              </tr>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table style="width:100%">
                              <tr>
                                <th class="t-label">Major: </th> 
                                <th ></th>
                              </tr>
                              <tr>
                                <th class="t-label">Year Level: </th>
                                <th class="t-value" ><?php echo print_level($year_level); ?></th>
                              </tr>
                              <tr>
                                <th class="t-label">School Year: </th>
                                <th class="t-value" ><?php echo $student_id;?></th>
                              </tr>
                              <tr>
                                <th class="t-label">Curriculum: </th>
                                <th class="t-value" ><?php echo $f_name." ".$l_name;?></th>
                              </tr>
                              <tr>
                                <th class="t-label">Scholarship: </th>
                                <th class="t-value" ></th>
                              </tr>
                            </table>
                        </div>
                         -->
                    </div>
                  </div> <!-- /#profile-->



                  <div class="tab-pane" id="load">
                    <div class="container">
                        <h1>Student Load</h1>

                        <?php
                        $sem_reg_no = 0;
                        $query_reg = mysql_query("SELECT reg_no, sem_id FROM student_registration_t WHERE student_id='{$student_id}'") or die(trigger_error(mysql_error()));
                        while($row_reg = mysql_fetch_assoc($query_reg)){
                            $sem_reg_no = $row_reg['reg_no'];
                            $load_sem_id = $row_reg['sem_id'];

##

                            $query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_id='{$load_sem_id}'") or die(mysql_error());
                            $row_sem = mysql_fetch_assoc($query_sem);

                            $sem_no = $row_sem['sem_no'];
                            $ay_id = $row_sem['ay_no'];

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
                                default:
                                    $sem_no = "Undefined Semester no.";
                                    break;
                            }

                            $query_year = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(mysql_error());
                            $row_year = mysql_fetch_assoc($query_year);

                            $year_start = $row_year['year_start'];
                            $year_end   = $row_year['year_end'];
##
                        ?>
                            <h4><?php echo $sem_no." A.Y.".$year_start." - ".$year_end;?></h4>


                            <table class="table table-bordered">
    		                  <thead>
    		                    <th>Code</th>
    		                    <th>Subject Title</th>
    		                    <th>Lec Hrs</th>
    		                    <th>Lab Hrs</th>
    		                    <th>Credit Units</th>
    		                    <th>Course</th>
    		                    <th>Year & Block</th>
    		                    <th>Schedule</th>
    		                  </thead>

    		                  <tbody>
    		                    <?php 
    		                    $total_units = 0;
    		                    $subject_count = 0;
    		                    $query_class = mysql_query("SELECT * 
    		                    							FROM class_t 
    		                    							WHERE class_id 
    		                    							IN ( SELECT class_id 
    		                    								 FROM student_load_t 
    		                    								 WHERE reg_no='{$sem_reg_no}'
    		                    								)
    		                    						  ") or die(mysql_error());

    		                    if(mysql_num_rows($query_class)>0){
    		                        
    		                        while($row_class = mysql_fetch_assoc($query_class)){
    		                        	$subject_count++;
    		                            $subject_id = $row_class['subject_id'];
    		                            $course_code = $row_class['course_code'];
    		                            $year_level = $row_class['year_level'];
    		                            $block = $row_class['block_name'];


    		                            $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_id='{$subject_id}'") or die(mysql_error());
    		                            $row_subject = mysql_fetch_assoc($query_subject);
                                        $subject_code = $row_subject['subject_code'];
    		                            $subject_title = $row_subject['subject_title'];
    		                            $lec_units = $row_subject['lec_units'];
    		                            $lab_units = $row_subject['lab_units'];
    		                            $credit_units = $row_subject['units'];
    		                            $total_units+=$credit_units;
    		                            ?>
    		                            <tr>
    		                              <th><?php echo $subject_code;?></th>
    		                              <th><?php echo $subject_title?></th>
    		                              <th><?php echo $lec_units;?></th>
    		                              <th><?php echo $lab_units;?></th>
    		                              <th><?php echo $credit_units;?></th>
    		                              <th><?php echo $course_code;?></th>
    		                              <th><?php echo $year_level;?></th>
    		                              <th><?php echo $block;?></th>

    		                            </tr>
    		                            <?php


    		                        }

    		                    }
    		                    else{
    		                      ?>
    		                      <tr><th colspan="8">Student has no Load for this semester.<?php echo $reg_no?></th></tr>
    		                      <?php
    		                    }
    		                    ?>

    		                    <tr >
    		                      <th colspan="2"><?php echo $subject_count." subject"; echo ($subject_count>1)? "s":""; ?></th>
    		                      <th colspan="2">Total Load:</th>
    		                      <th><?php echo $total_units;?></th>
    		                      <th colspan="4"><?php echo $reg_no;?></th>
    		                    </tr>

    		                    <?php ?>
    		                  </tbody>

    		                </table>

                        <?php
                        }   
                        ?>


                    </div>
                  </div> <!-- /#load-->



                  <div class="tab-pane" id="schedule">
                   
                        <div id="left_pane" class="col-sm-3" style="height:100%;padding:0;">
                          <div style="padding:10px; box-shadow: 0 5px 30px -20px; border-bottom:1px solid #ddd;">
                           <!--  <button class="btn btn-default btn-block" onclick="loadStudentTimetable(<?php echo $reg_no;?>)">View Own Schedule</button> -->
                            <h3>Classes</h3>
                          </div>
                          <div class="btn-group-vertical" style="max-height:80%; overflow-y:auto;padding:20px;width:100%;border-bottom:1px solid #ddd;">
                            <?php 
                            $query_block = mysql_query("SELECT * FROM student_block_t ") or die(mysql_error());
                            while($row_block = mysql_fetch_assoc($query_block)){
                            	$b_block_id = $row_block['block_id'];
                            	$b_course_code = $row_block['course_code'];
                            	$b_year_level = $row_block['year_level'];
                            	$b_block_name = $row_block['block_name'];
                            ?>
                        	<button class="btn btn-default btn-block" onclick="loadBlockTimetable(<?php echo $b_block_id;?>)"><?php echo $b_course_code." ".$b_block_name;?></button>
                            <?php } ?>
                          </div><!--.btn-group-->
                            <button id="expand-button" class="hidden" onclick="toggleSize()">Expand</button>
                        
                        </div><!--/#left_pane-->

 <!--     ============================             SCHEDULING TIMETABLE CODES              =================================      -->                       
                        <div id="right_pane" style="">
                            
                            <div id="timetable" class="compact-table">
                            <table  id="shcedule_timetable" width="100%" border="1" bordercolor="#DADADA" class="timetable" style="" cellpadding="0" cellspacing="0" style="line-height:">
                                                <colgroup>
                                                <col width="50"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                            </colgroup>
                                            <thead><tr bgcolor="#006699" style="color:white">
                                                <th width="50" class="timetable_header">TIME</th>
                                                <?php
                                                $day_count = count($day_array);
                                                for($i=0;$i<$day_count;$i++){ ?>
                                                    <th class="timetable_header" style=''><?php echo $day_array[$i]?></th>
                                                <?php
                                                }
                                                ?>
                                            </tr></thead>
                             
                             <!-- insert another table here -->
                                            <colgroup>
                                                <col width="50"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                            </colgroup>
                                            <tbody class="" style="">
                                            
                                          <?php
                                          // $i === time interval
                                          // $j === sections
                                          
                                          for($i=0;$i<count($times)-1;$i++){ ?>
                                              <tr bgcolor='#F2F2F2'>
                                                        <th bgcolor='#EDEEFE' font="Arial"><font face='Arial, Helvetica, sans-serif' size='1'><?php echo date('h:i A',strtotime($times[$i]))?></th>
                                              <?php
                                              
                                              for($j=0;$j<$day_count;$j++){
                                                  $loaded_day_ID =$j+1;
                                                  $start = $times[$i];
                                                  $end = $times[$i+1];
                                                  $schedule_id = student_loaded($reg_no, $start, $end, $loaded_day_ID,1); //1 is current semester
                                                  //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester
                                                  //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester

                                                  $loaded_class_id = get_class_id($schedule_id, 1);//to retrieve from actual table
                                                  
                                                  
                                                  if($loaded_class_id!=""){
                                                      $slots = get_slots($schedule_id);
                                                      if(is_first($schedule_id, $start)){
                                                          ?> <th bgcolor="#dadada" class="loaded" rowspan="<?php echo $slots;?>" onclick="show_ticket(<?php echo $schedule_id;?>)"> <?php
                                                          $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t 
                                                                                                                       WHERE subject_t.subject_code=class_t.subject_code
                                                                                                                       AND class_t.class_id=$loaded_class_id") or die(mysql_error());
                                                          $row_subject = mysql_fetch_assoc($query_subject);
                                                          echo "<small>".$row_subject['subject_title']."</small>";
                                                          ?></th><?php
                                                       }
                                                       ?> 
                                                  <?php
                                                  }
                                                  else {?>
                                                         <th></th>
                                                  <?php
                                                  }
                                              }
                                              echo "</tr>";
                                          }
                                          ?>
                                         
                                          </tbody>
                                      
                            </table>

                            </div> <!-- /.scrolable-->




                        </div><!-- /#right_pane-->


                  </div> <!-- /#schedule-->

                 

                  <div class="tab-pane" id="grades">
                    <div class="container">
                        <h1>Student Grades</h1>
                        <!-- <div class="row">
                          <div class="col-md-5">
                              <table>
                                <colgroup>
                                    <col width="200"/>
                                    <col width="300"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Fullname:</th>
                                  <th class="t-value"><?php echo strtoupper($l_name).", ".strtoupper($f_name)." ".ucfirst($m_name);?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Gender:</th>
                                  <th class="t-value"><?php echo $gender;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">College</th>
                                  <th class="t-value"><?php echo "College of Science";?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Program</th>
                                  <th class="t-value"><?php echo $course_title;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Major</th>
                                  <th class="t-value"></th>
                                </tr>
                              </table>
                          </div>
                          <div class="col-md-5">
                              <table>
                                <colgroup>
                                    <col width="200"/>
                                    <col width="300"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Student No:</th>
                                  <th class="t-value"><?php echo $student_id;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Academic Year:</th>
                                  <th class="t-value"><?php echo $year_of_reg."-".$next_yr;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Year Level:</th>
                                  <th class="t-value"><?php echo print_level($year_level); ?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Retention Status:</th>
                                  <th class="t-value"></th>
                                </tr>
                              </table>
                          </div>
                        </div>
                         -->
                       
                        
                        <div class="row">
                          <div class="container-fluid">
                            <?php
                            $query_reg = mysql_query("SELECT reg_no, sem_id FROM student_registration_t WHERE student_id='{$student_id}'") or die(trigger_error(mysql_error()));
                            while($row_reg = mysql_fetch_assoc($query_reg)){
                                $sem_reg_no = $row_reg['reg_no'];
                                $load_sem_id = $row_reg['sem_id'];

    ##

                                $query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_id='{$load_sem_id}'") or die(mysql_error());
                                $row_sem = mysql_fetch_assoc($query_sem);

                                $sem_no = $row_sem['sem_no'];
                                $ay_id = $row_sem['ay_no'];

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
                                    default:
                                        $sem_no = "Undefined Semester no.";
                                        break;
                                }

                                $query_year = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(mysql_error());
                                $row_year = mysql_fetch_assoc($query_year);

                                $year_start = $row_year['year_start'];
                                $year_end   = $row_year['year_end'];
    ##
                            ?>
                                <h4><?php echo $sem_no." A.Y.".$year_start." - ".$year_end;?></h4>

                                <table style="width:100%;" class="table table-bordered ">
                                  <thead>
                                    <tr>
                                      <th>Code</th>
                                      <th>Subject Title</th>
                                      <th>Unit Credit</th>
                                      <th>Midterm Grade</th>
                                      <th>Tentative Final</th>
                                      <th>Final Grade</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $query_load=mysql_query("SELECT * FROM student_load_t, class_t, subject_t WHERE student_load_t.reg_no = '$sem_reg_no' AND 
                                                class_t.class_id=student_load_t.class_id AND subject_t.subject_id=class_t.subject_id") or die(mysql_error());
                                    while($row_load=mysql_fetch_assoc($query_load)){
                                      $class_id=$row_load['class_id'];
                                      $subject_code=$row_load['subject_code'];
                                      $subj_title=$row_load['subject_title'];
                                      $units=$row_load['units'];
                                      $load_id = $row_load['load_id'];
                                      
                                      $query_grade=mysql_query("SELECT * FROM student_grade_t WHERE load_id='{$load_id}'") or die(mysql_error());
                                      $row_grade=mysql_fetch_assoc($query_grade);
                                      $midterm_grade=$row_grade['midterm_grade'];
                                      $tentative_fgrade=$row_grade['tentative_final_grade'];
                                      $final_grade=$row_grade['final_grade']; ?>
                                                      
                                                      
                                        <tr>
                                          <th><?php echo $subject_code; ?></th>
                                          <th><?php echo $subj_title ?></th>
                                          <th style="text-align:center"><?php printf("%.1f", $units) ?></th>
                                          <th style="text-align:center"><?php printf("%.1f", $midterm_grade); ?></th>
                                          <th style="text-align:center"><?php printf("%.1f", $tentative_fgrade) ?></th>
                                          <th style="text-align:center"><?php printf("%.1f", $final_grade) ?></th>
                                        </tr>
                                        
                                    <?php } ?>

                                  </tbody>
                                </table>

                            <?php
                            }
                            ?>
                          </div>
                        </div>
                    </div>
                  </div> <!-- /#grades-->
                  <div class="tab-pane" id="payments">
                    <div class="container">
                        <h1>Payments</h1>
                        <table style="width:50%;" class="table">
                              <thead>
                                <tr>
                                  <th>item no.</th>
                                  <th>Payment Title</th>
                                  <th>Amount</th>

                                </tr>
                              </thead>
                              <tbody>
                              <?php for($i=0;$i<10;$i++){   ?>
                                <tr>
                                  <th><?php echo $i;?></th>
                                  <th><?php echo "Paument "+$i;?></th>
                                  <th><?php printf("P%6.2f", 100);?></th>
                                </tr>
                              <?php } ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th colspan="2" style="text-align: right;padding-right: 20px;"><b>TOTAL</b></th>
                                  <th>P 1000.00</th>
                                </tr>
                              </tfoot>
                            </table>
                    </div>
                  </div> <!-- /#payments-->
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
        function goBack(){

            window.history.go(-2);
        }
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
                    var block = details['course_code']+" "+details['block'];
                    var subject_title = details['subject_title'];
                    var subject_code = details['subject_code'];
                    var day = details['day'];
                    var time = details['start_time']+" - "+details['end_time'];
                    var room = details['room'];

                    $("#ticket-block").text(block);
                    $("#ticket-subject_title").text(subject_title);
                    $("#ticket-subject_code").text(subject_code);
                    $("#ticket-day").text(day);
                    $("#ticket-time").text(time);
                    $("#ticket-room").text(room);
                }
            });

            $("#ticket_modal").modal("toggle");
        }
    </script>

</body>
</html>