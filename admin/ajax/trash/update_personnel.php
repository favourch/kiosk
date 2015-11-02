<?php

$db_con = mysqli_connect("localhost","root", "", "kiosk");

$personnelID = $_GET['personnelID'];
$f_name = $_GET['f_name'];
$m_name = $_GET['m_name'];
$l_name = $_GET['l_name'];
$gender = $_GET['gender'];
$status = $_GET['status'];


mysqli_query($db_con, "UPDATE personnel_t SET 
							f_name='{$f_name}',
							m_name='{$m_name}',
							l_name='{$l_name}',
							gender='{$gender}',
							status='{$status}'
					   WHERE personnel_id='{$personnelID}'") or die(mysqli_error($db_con));

echo "sucessfully updated personnel data";


?>