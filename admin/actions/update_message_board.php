<?php
include "../../db/db.php";
session_start();
if(isset($_POST['update'])){
	$title = $_POST['title'];
	$message = $_POST['message'];

	$query_message = mysqli_query($db_con, "UPDATE message_board_t SET title='$title', message='$message' WHERE id='1'") or die(trigger_error(mysqli_error($db_con)));
	$_SESSION['kiosk']['error'] = "Welcome message changed.";
}
header("location: ../index.php");
?>