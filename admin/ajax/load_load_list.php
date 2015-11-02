<?php
$arr["data"]= array(  );
$temp_db_con = mysqli_connect("localhost","root", "","kiosk");


if(isset($_GET['sem_id'])){
	$sem_id = $_GET['sem_id'];
}
else{
	return "sem_id not defined";
}


if(isset($_GET['student_id'])){
	$student_id = $_GET['student_id'];
	$query_class = mysqli_query($temp_db_con,
								"SELECT * FROM class_t, student_load_t, student_registration_t
										 WHERE class_t.class_id = student_load_t.class_id
										   AND student_registration_t.reg_no = student_load_t.reg_no
										   AND student_registration_t.student_id = '{$student_id}'
										   AND student_registration_t.sem_id = '{$sem_id}'
									          ") or die(mysqli_error($temp_db_con));
}
elseif(isset($_GET['personnel_id'])){
	$personnel_id = $_GET['personnel_id'];
	$query_class = mysqli_query($temp_db_con,
								"SELECT * FROM class_t
										 WHERE faculty_id = '$personnel_id'
										   AND sem_id = '{$sem_id}'
									          ") or die(mysqli_error($temp_db_con));
}
else{
	$query_class = mysqli_query($temp_db_con,"SELECT * FROM class_t") or die("Error at load_class_list.php : line 23 :: ".mysql_error());
}


while($row_class = mysqli_fetch_array($query_class)){
	$subject_id = $row_class["subject_id"];
	$block_id = $row_class["block_id"];
	$faculty_id = $row_class["faculty_id"];

	$query_subject = mysqli_query($temp_db_con, "SELECT subject_code, subject_title FROM subject_t WHERE subject_id='{$subject_id}'") or die(trigger_error(mysqli_error($temp_db_con)));
	$row_subject = mysqli_fetch_array($query_subject);
	$subject_code = $row_subject["subject_code"];
	$subject_title = $row_subject["subject_title"];

	$query_block = mysqli_query($temp_db_con, "SELECT block_name FROM student_block_t WHERE block_id='{$block_id}'") or die(trigger_error(mysqli_error($temp_db_con)));
	$row_block = mysqli_fetch_array($query_block);
	$block_name = $row_block["block_name"];

	$query_faculty = mysqli_query($temp_db_con, "SELECT f_name, m_name, l_name FROM personnel_t WHERE personnel_id='{$faculty_id}'") or die(trigger_error(mysqli_error($temp_db_con)));
	$row_faculty = mysqli_fetch_array($query_faculty);
	$faculty = $row_faculty["f_name"]." ".$row_faculty["l_name"];

    $arr["data"][] = array(
            $subject_code,
            $subject_title,
            $block_name,
            $faculty,
            '',
            '<td>
                <a href="#" onclick="edit_class(\''.$row_class['class_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
            </td>'

            //                <a href="#" onclick="edit_class(\''.$row_class['class_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>


        );
}

echo json_encode($arr);
?>