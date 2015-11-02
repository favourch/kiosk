<?php

$db_con = mysqli_connect("localhost","root", "", "kiosk");

$data = $_GET['subjectID'];
$subjectID = $_GET['subjectID'];
$subject_code = $_GET['subject_code'];
$subject_title = $_GET['subject_title'];
$lec_units = $_GET['lec_units'];
$lab_units = $_GET['lab_units'];
$units = $_GET['units'];


mysqli_query($db_con, "UPDATE subject_t SET 
							subject_code='{$subject_code}',
							subject_title='{$subject_title}',
							lec_units='{$lec_units}',
							lab_units='{$lab_units}',
							units='{$units}'
					   WHERE subject_id='{$subjectID}'") or die(mysqli_error($db_con));

echo "sucessfully updated subject data";


?>