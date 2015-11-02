<?php
	include "../../db/db.php";

	$subject_id = $_GET['subject_id'];

	$query_subject = mysqli_query($db_con, "SELECT * FROM subject_t WHERE subject_id='{$subject_id}'") or die("Error at details_subject.php : line 6 :: ".mysqli_error($db_con));
	$row_subject = mysqli_fetch_array($query_subject);


	echo json_encode($row_subject);

?>