<?php
    $schedule_id = $_GET['schedule_id'];

    include "../db/db.php";
    $query_schedule = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id='{$schedule_id}'") or die(mysql_error());

    $row_schedule = mysql_fetch_assoc($query_schedule);


    $class_id = $row_schedule['class_id']; //retrieve other data
    $day = $row_schedule['day'];
    $start = date('g:i A', strtotime($row_schedule['time_start']));
    $end = date('g:i A', strtotime($row_schedule['time_end']));
    $room_code = $row_schedule['room_code'];
    $room_code = strtoupper(str_replace("_"," ", $room_code));
 

    $query_day = mysql_query("SELECT day_name FROM days_t WHERE day_id='{$day}'") or die(mysql_error());
    $row_day = mysql_fetch_assoc($query_day);
    $day_name = $row_day['day_name'];

    $query_class = mysql_query("SELECT * FROM class_t WHERE class_id='{$class_id}'") or die(mysql_error());
    $row_class = mysql_fetch_assoc($query_class);

    $subject_id = $row_class['subject_id']; 
    //$course_code = $row_class['course_code'];
    $block_id = $row_class['block_id'];
    $faculty_id = $row_class['faculty_id'];

    $query_faculty = mysql_query("SELECT * FROM personnel_t WHERE personnel_id='{$faculty_id}'") or die(mysql_error());
    $row_faculty = mysql_fetch_assoc($query_faculty);
    $faculty_name = $row_faculty['f_name']." ".$row_faculty['l_name'];


    $query_block = mysql_query("SELECT * FROM student_block_t WHERE block_id='{$block_id}'") or die(mysql_error());
    $row_block = mysql_fetch_assoc($query_block);
    $course_code = $row_block['course_code'];
    $block = $row_block['block_name'];


    $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_id='{$subject_id}'") or die(mysql_error());
    $row_subject = mysql_fetch_assoc($query_subject);

    $subject_title = $row_subject['subject_title'];
    $subject_code = $row_subject['subject_code'];
    $lec_units = $row_subject['lec_units'];
    $lab_units = $row_subject['lab_units'];
    $credit_units = $row_subject['units'];
 

    $return_array = array( 
    	"day"			=>"$day_name",
    	"start_time"    =>"$start",
    	"end_time"    	=>"$end",
    	"course_code"	=>"$course_code",
        "block"         =>"$block",
    	"subject_code"	=>"$subject_code",
    	"subject_title"	=>"$subject_title",
        "faculty_name"  =>"$faculty_name",
    	"lec_units"		=>"$lec_units",
    	"lab_units"		=>"$lab_units",
    	"credit_units"	=>"$credit_units",
    	"room"			=>"$room_code"
    );

    echo json_encode($return_array);
?>