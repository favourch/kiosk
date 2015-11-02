<?php
	include "../../db/db.php";

	$block_id = $_GET['block_id'];

	$query_block = mysqli_query($db_con, "SELECT * FROM student_block_t WHERE block_id='{$block_id}'") or die("Error at details_block.php : line 6 :: ".mysqli_error($db_con));
	$row_block = mysqli_fetch_array($query_block);


	echo json_encode($row_block);

?>