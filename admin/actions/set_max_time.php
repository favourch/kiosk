<?php
include "../../db/db.php";
session_start();
if(isset($_POST['submit'])){
	$hours = $_POST['session_hour'];
	$minutes = $_POST['session_minute'];
	$seconds = $_POST['session_second'];

	$time = ($hours*3600) +($minutes*60)+$seconds;
	echo $hours." ".$minutes." ".$seconds."<br>";
	$query_session = mysqli_query($db_con,"SELECT id FROM session_time_t WHERE id='1'") or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_session)){
		mysqli_query($db_con,"UPDATE session_time_t SET time_limit='$time' WHERE id='1'") or die(trigger_error(mysqli_error($db_con)));

	}
	else{
		mysqli_query($db_con,"INSERT INTO session_time_t VALUES('1', '$time')") or die(trigger_error(mysqli_error($db_con)));
	}
	$url = $_SERVER['HTTP_REFERER'];
	$_SESSION['kiosk']['error'] = "Max time session changed.";
	header("location: $url");
}

?>