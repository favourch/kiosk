<?php
	include "../../db/db.php";

	$class_id = $_GET['class_id'];

	$query_class = mysqli_query($db_con, "SELECT * FROM class_t WHERE class_id='{$class_id}'") or die("Error at details_class.php : line 6 :: ".mysqli_error($db_con));
	$row_class = mysqli_fetch_array($query_class);
	$subject_id = $row_class['subject_id'];
	$block_id = $row_class['block_id'];
	$faculty_id = $row_class['faculty_id'];

	$query_subject = mysqli_query($db_con, "SELECT subject_code, subject_title FROM subject_t WHERE subject_id='{$subject_id}'") or die(trigger_error(mysqli_error($db_con)));
	$row_subject = mysqli_fetch_array($query_subject);
	$subject_code = $row_subject["subject_code"];
	$subject_title = $row_subject["subject_title"];

	$query_block = mysqli_query($db_con, "SELECT block_name FROM student_block_t WHERE block_id='{$block_id}'") or die(trigger_error(mysqli_error($db_con)));
	$row_block = mysqli_fetch_array($query_block);
	$block_name = $row_block["block_name"];

	$query_faculty = mysqli_query($db_con, "SELECT f_name, m_name, l_name FROM personnel_t WHERE personnel_id='{$faculty_id}'") or die(trigger_error(mysqli_error($db_con)));
	$row_faculty = mysqli_fetch_array($query_faculty);
	$faculty = $row_faculty["f_name"]." ".$row_faculty["l_name"];

	$arr = array(
		'subject_code' => "$subject_code",
		'subject_title' => "$subject_title",
		'block_name' => "$block_name",
		'faculty' => "$faculty",

	);

	echo json_encode($arr);

?>