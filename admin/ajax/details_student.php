<?php
	include "../../db/db.php";

	$student_id = $_GET['student_id'];

	$query_student = mysqli_query($db_con, "SELECT * FROM student_t WHERE student_id='{$student_id}'") or die("Error at student_details.php : line 6 :: ".mysqli_error($db_con));
	$row_student = mysqli_fetch_array($query_student);


	echo json_encode($row_student);

?>