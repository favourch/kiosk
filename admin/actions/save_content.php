<?php
	include "cms_functions.php";
	$count = 0;

	$src_db_con = mysqli_connect("localhost", "root", "", "kiosk - testing");
	$dest_db_con = mysqli_connect("localhost", "root", "", "kiosk - temp");

	#Copy subject data
	$query_subj_src = mysqli_query($src_db_con,"SELECT * FROM subject_t") or die("Error in save_content.php : line 5 :: ".mysql_error($src_db_con));
	while($row_subj_src = mysqli_fetch_array($query_subj_src)){
		$subject_code = $row_subj_src['subject_code'];
		$subject_title = $row_subj_src['subject_title'];
		$lec_units = $row_subj_src['lec_units'];
		$lab_units = $row_subj_src['lab_units'];
		$units = $row_subj_src['units'];
		insert_subject($dest_db_con, $subject_code, $subject_title, $units, $lec_units, $lab_units);
		$count++;
	}
	echo "Copy subject success :: $count entries<br>";
	$count = 0;
	#Copy Course data
	$query_course_src = mysqli_query($src_db_con,"SELECT * FROM course_t") or die("Error in save_content.php : line 5 :: ".mysql_error($src_db_con));
	while($row_course_src = mysqli_fetch_array($query_course_src)){
		$course_code = $row_course_src['course_code'];
		$course_title = $row_course_src['course_title'];
		insert_course($dest_db_con, $course_code, $course_title);
		$count++;
	}
	echo "Copy course success :: $count entries<br>";
	$count = 0;
	#Copy block data
	$query_block_src = mysqli_query($src_db_con,"SELECT * FROM student_block_t") or die("Error in save_content.php : line 5 :: ".mysql_error($src_db_con));
	while($row_block_src = mysqli_fetch_array($query_block_src)){
		$block_id = $row_block_src['block_id'];
		$block_name = $row_block_src['block_name'];
		$course_code = $row_block_src['course_code'];
		$year_level = $row_block_src['year_level'];
		$sem_id = $row_block_src['sem_id'];
		insert_block($dest_db_con, $course_code, $year_level, $block_name, $sem_id);
		$count++;
	}
	echo "Copy block success :: $count entries<br>";
	$count = 0;
	#Copy Student data
	$query_student_src = mysqli_query($src_db_con,"SELECT * FROM student_t") or die("Error in save_content.php : line 5 :: ".mysql_error($src_db_con));
	while($row_student_src = mysqli_fetch_array($query_student_src)){
		$student_id = $row_student_src['student_id'];
		$f_name = $row_student_src['f_name'];
		$m_name = $row_student_src['m_name'];
		$l_name = $row_student_src['l_name'];
		$gender = $row_student_src['gender'];
		$birthdate = $row_student_src['birthdate'];
		$address = $row_student_src['address'];
		$status = $row_student_src['status'];
		insert_student($dest_db_con, $student_id, $f_name, $m_name, $l_name, $gender, $birthdate, $address,  $status);
		$count++;
	}
	echo "Copy student success :: $count entries<br>";
	$count = 0;
	#Copy Personnel data
	$query_personnel_src = mysqli_query($src_db_con,"SELECT * FROM personnel_t") or die("Error in save_content.php : line 5 :: ".mysql_error($src_db_con));
	while($row_personnel_src = mysqli_fetch_array($query_personnel_src)){
		$personnel_id = $row_personnel_src['personnel_id'];
		$f_name = $row_personnel_src['f_name'];
		$m_name = $row_personnel_src['m_name'];
		$l_name = $row_personnel_src['l_name'];
		$gender = $row_personnel_src['gender'];
		$b_day = $row_personnel_src['b_day'];
		$academic_rank = $row_personnel_src['academic_rank'];
		$status = $row_personnel_src['status'];
		insert_personnel($dest_db_con, $personnel_id, $f_name, $m_name, $l_name, $gender, $academic_rank, $status, $b_day);
		$count++;
	}
	echo "Copy personnel success :: $count entries<br>";
	$count = 0;
	#Copy Student Registration data
	$query_reg_src = mysqli_query($src_db_con,"SELECT * FROM student_registration_t") or die("Error in save_content.php : line 68 :: ".mysql_error($src_db_con));
	while($row_reg_src = mysqli_fetch_array($query_reg_src)){
		$reg_no = $row_reg_src['reg_no'];
		$student_id = $row_reg_src['student_id'];
		$reg_date = $row_reg_src['reg_date'];
		$sem_id = $row_reg_src['sem_id'];
		$course_code = $row_reg_src['course_code'];
		$year_level = $row_reg_src['year_level'];
		insert_reg($dest_db_con, $student_id, $reg_no, $reg_date, $year_level, $course_code, $sem_id);
		$count++;
	}
	echo "Copy student registration success :: $count entries<br>";

	$count = 0;
	#Copy class data
	$query_class_src = mysqli_query($src_db_con,"SELECT * FROM class_t") or die("Error in save_content.php : line 82 :: ".mysql_error($src_db_con));
	while($row_class_src = mysqli_fetch_array($query_class_src)){
		$subject_id = $row_class_src['subject_id'];
		$faculty_id = $row_class_src['faculty_id'];
		$block_id = $row_class_src['block_id'];
		$sem_id = $row_class_src['sem_id'];

		insert_class($dest_db_con, $subject_id, $faculty_id, $block_id, $sem_id );
		$count++;
	}
	echo "Copy class success :: $count entries<br>";

	$count = 0;
	#Copy class schedule data
	$query_class_src = mysqli_query($src_db_con,"SELECT * FROM class_schedule_t") or die("Error in save_content.php : line 82 :: ".mysql_error($src_db_con));
	while($row_class_src = mysqli_fetch_array($query_class_src)){
		$class_id   = $row_class_src['class_id'];
		$day 		= $row_class_src['day'];
		$time_start = $row_class_src['time_start'];
		$time_end   = $row_class_src['time_start'];
		$room_code  = $row_class_src['room_code'];
		$room_code = NULL;

		insert_schedule($dest_db_con, $class_id, $day, $time_start, $time_end, $room_code);
		$count++;
	}
	echo "Copy class schedule success :: $count entries<br>";

	$count = 0;
	#Copy Student Load data
	$query_load_src = mysqli_query($src_db_con,"SELECT * FROM student_load_t") or die("Error in save_content.php : line 82 :: ".mysql_error($src_db_con));
	while($row_load_src = mysqli_fetch_array($query_load_src)){
		$class_id   = $row_load_src['class_id'];
		$day        = $row_load_src['day'];
		$time_start = $row_load_src['time_start'];
		$time_end   = $row_load_src['time_end'];
		$room       = $row_load_src['room'];


		insert_schedule($dest_db_con, $class_id, $day, $time_start, $time_end, $room);
		$count++;
	}
	echo "Copy student load success :: $count entries<br>";
	echo "Hasayo";
?>