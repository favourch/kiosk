<?php

include "../../db/db.php";

$query_student = mysql_query("SELECT * FROM student_t WHERE student_id IN (SELECT student_id FROM student_members_t WHERE account_no IS NULL)") or die(mysql_error());


while($row_student = mysql_fetch_assoc($query_student)){
	$student_id = $row_student['student_id'];

	$student_name = $row_student['f_name']." ".$row_student['m_name']." ".$row_student['l_name'] ;
	echo "<option value='".$student_id."'>";
	echo $student_id." - ".$student_name;
	echo "</option>";
}

?>