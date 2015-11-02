<!DOCTYPE html>



<?php
include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
//include "actions/sched_functions.php";
include "actions/subject_functions.php";
//include "actions/load_schedule.php"; //to pre-load schedule on the time table.
include "actions/scheduling_functions.php";
include "actions/misc_functions.php";
include "db/db.php";

$block_id = 1;
$faculty_id=$_GET['p_id'];
$sem_id = semester();


if(isset($faculty_id)){
    $query_faculty = mysql_query(" SELECT * FROM personnel_t WHERE personnel_id='{$faculty_id}' ") or die(mysql_error());
    $row_faculty = mysql_fetch_assoc($query_faculty);

    $faculty_name       = $row_faculty['f_name']." ".$row_faculty['m_name']." ".$row_faculty['l_name'];
    $faculty_position   = "Professor II";
    $faculty_department = "CS/IT Department";

}


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
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php";?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-calendar" ></i> Faculty Schedule</h3>
            </div>
        </div>
    </section><!--/#services-->

    <div id="viewport" class="hidden" style="margin:20px; background-color:#FFF; height:460px; border:1px solid #DADADA; padding: 10px;">
        <h1>This is it</h1>
        <i class="icon-linux "></i>
    </div><!--/#main-->

    <section class="" style="padding-bottom:0; padding-top:20px; height:90%">
    
      
        <div id="panel" class="panel panel-default " style="">
          <div class="panel-heading">
            <a href="faculty-search.php" class="btn btn-default"> <span class="glyphicon glyphicon-chevron-left"></span> Look For Other Faculty</a>
            <div class="btn-group pull-right">
              <a href="#" class="btn btn-default active">Load</a>
              <a href="faculty-schedule.php" class="btn btn-default">Schedule</a>
            </div>
          </div>
          <div class="panel-body" style="padding:0;">
            <div id="left_pane" class="col-sm-3" style="">
                <img class="picture" src="images/f3.png" style=""/>
                <div id="details" class="container">
                    <h3><?php echo $faculty_name; ?></h3>
                    <h5><?php echo $faculty_position; ?></h5>
                    <h5><?php echo $faculty_department; ?></h5>
                    <button id="expand-button" onclick="toggleSize()">Expand</button>
                </div>
            </div><!--/#left_pane-->
            <div id="right_pane" style="">
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
                    $query_class = mysql_query("SELECT * FROM class_t WHERE faculty_id='{$faculty_id}'") or die(mysql_error());
                    
                    if(mysql_num_rows($query_class)>0){
                        $total_units = 0;
                        while($row_class = mysql_fetch_assoc($query_class)){
                            $subject_id = $row_class['subject_id'];
                            $course_code = $row_class['course_code'];
                            $year_level = $row_class['year_level'];
                            $block = $row_class['block_name'];


                            $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_id='{$subject_id}'") or die(mysql_error());
                            $row_subject = mysql_fetch_assoc($query_subject);
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
                      <tr><th colspan="8">Faculty has no Load for this semester.</th></tr>
                      <?php
                    }
                    ?>

                    <tr >
                      <th colspan="4">Total Teaching Load:</th>
                      <th><?php echo $total_units;?></th>
                      <th colspan="4"></th>
                    </tr>

                    <?php ?>
                  </tbody>

                </table>



            </div><!-- /#right_pane-->
          </div><!--/.panel-body-->
        </div><!-- /#panel -->

      
      
    </section>
    

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
    </script>

</body>
</html>