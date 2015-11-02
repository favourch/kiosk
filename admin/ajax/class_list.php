<?php
	include "../../db/db.php";

	$class_id = $_GET['class_id'];

	$query_class = mysqli_query($db_con, "SELECT * FROM student_load_t, student_registration_t , student_t
												  WHERE student_load_t.class_id='$class_id' 
												    AND student_load_t.reg_no = student_registration_t.reg_no
												    AND student_t.student_id = student_registration_t.student_id
											   ORDER BY student_t.l_name ASC
							             ") or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_class)>0){

		while($row_class = mysqli_fetch_array($query_class)){
			$student_id = $row_class['student_id'];
			$course_code = $row_class['course_code'];
			$year_level = $row_class['year_level'];

			$query_student = mysqli_query($db_con,"SELECT * FROM student_t WHERE student_id='$student_id'") or die(trigger_error(mysqli_error($db_con)));
			$row_student = mysqli_fetch_array($query_student);
			$student_name = $row_student['l_name'].", ".$row_student['f_name']." ".$row_student['m_name'];
			$student_name = strtolower(htmlentities($student_name));
			$gender = $row_student['gender'];
		?>
			<tr>
				<th><?php echo $student_id; ?></th>
				<th><?php echo ucwords($student_name); ?></th>
				<th><?php echo $gender; ?></th>
				<th><?php echo $course_code." ".$year_level; ?></th>
			</tr>

		<?php
		}
	}
	else{

	}
	$no_of_students = mysqli_num_rows($query_class);
	?>

	<tr>
		<th colspan="4" style="font-weight:bold"><?php echo $no_of_students." student"; echo ($no_of_students>1)? "s":""; ?></th>
	</tr>

	<?php

?>