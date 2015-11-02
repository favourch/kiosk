<?php

$db_con = mysqli_connect("localhost","root", "", "kiosk");

$data = $_GET['blockID'];
$blockID = $_GET['blockID'];
$block_name = $_GET['block_name'];
$course_code = $_GET['course_code'];
$year_level = $_GET['year_level'];
$sem_id = $_GET['sem_id'];


mysqli_query($db_con, "UPDATE student_block_t SET 
							block_name='{$block_name}',
							course_code='{$course_code}',
							year_level='{$year_level}',
							sem_id='{$sem_id}'
					   WHERE block_id='{$blockID}'") or die(mysqli_error($db_con));

echo "sucessfully updated block data";


?>