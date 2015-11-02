<?php
	include "../../db/db.php";

	$personnel_id = $_GET['personnel_id'];

	$query_personnel = mysqli_query($db_con, "SELECT * FROM personnel_t WHERE personnel_id='{$personnel_id}'") or die("Error at personnel_details.php : line 6 :: ".mysqli_error($db_con));
	$row_personnel = mysqli_fetch_array($query_personnel);


	echo json_encode($row_personnel);

?>