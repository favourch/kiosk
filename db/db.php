<?php
	// $host = "10.10.12.231";
	// $db_user = "kiosk_client";
	// $db_pass = "12345";
	$host = "localhost";
	$db_user = "root";
	$db_pass = "";
	@mysql_connect($host,$db_user,$db_pass) or die(mysql_error());
	mysql_select_db("kiosk");
	$db_con = mysqli_connect($host,$db_user, $db_pass,"kiosk");
	//$db_con = mysqli_connect("localhost", "root", "", "kiosk");
	mysql_select_db("kiosk");
	if($db_con==NULL){
		header("location: /projects/kiosk/kiosk404.php");
	}
?>