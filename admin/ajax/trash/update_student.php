<?php

$db_con = mysqli_connect("localhost","root", "", "kiosk");

$data = $_GET['studentID'];
$studentID = $_GET['studentID'];
$f_name = $_GET['f_name'];
$m_name = $_GET['m_name'];
$l_name = $_GET['l_name'];
$gender = $_GET['gender'];
$status = $_GET['status'];


mysqli_query($db_con, "UPDATE student_t SET 
							f_name='{$f_name}',
							m_name='{$m_name}',
							l_name='{$l_name}',
							gender='{$gender}',
							status='{$status}'
					   WHERE student_id='{$studentID}'") or die(mysqli_error($db_con));

echo "sucessfully updated student data";


?>