<?php
$arr["data"]= array(  );
include "../../db/db.php";
include "../actions/misc_functions.php";
$sem_id = semester();

$query_class = mysqli_query($db_con,"SELECT * FROM class_t WHERE sem_id='$sem_id'") or die("Error at load_class_list.php : line 23 :: ".mysql_error());
while($row_class = mysqli_fetch_array($query_class)){
	$subject_id = $row_class["subject_id"];
	$block_id = $row_class["block_id"];
	$faculty_id = $row_class["faculty_id"];
    $class_id = $row_class['class_id'];

	$query_subject = mysqli_query($db_con, "SELECT subject_code, subject_title FROM subject_t WHERE subject_id='{$subject_id}'") or die(trigger_error(mysqli_error($db_con)));
	$row_subject = mysqli_fetch_array($query_subject);
	$subject_code = $row_subject["subject_code"];
    $subject_title = $row_subject['subject_title'];

	$query_block = mysqli_query($db_con, "SELECT block_name FROM student_block_t WHERE block_id='{$block_id}'") or die(trigger_error(mysqli_error($db_con)));
	$row_block = mysqli_fetch_array($query_block);
	$block_name = $row_block["block_name"];

	$query_faculty = mysqli_query($db_con, "SELECT f_name, m_name, l_name FROM personnel_t WHERE personnel_id='{$faculty_id}'") or die(trigger_error(mysqli_error($db_con)));
	$row_faculty = mysqli_fetch_array($query_faculty);
	$faculty = $row_faculty["f_name"]." ".$row_faculty["l_name"];


    $query_load = mysqli_query($db_con,"SELECT * FROM student_load_t WHERE class_id='$class_id' ") or die(trigger_error(mysqli_error($db_con)));
    $no_of_students = mysqli_num_rows($query_load);
    //$no_of_students = $class_id;

    $arr["data"][] = array(
            $block_name,
            $subject_code,
            $subject_title,
            $faculty,
            $no_of_students,
            '<td>
                <a href="#" onclick="view_class_list(\''.$row_class['class_id'].'\')" class="btn btn-default btn-block btn-xs"><span class="glyphicon glyphicon-list"></span> Class list </a>
            </td>'
            

            //                <a href="#" onclick="edit_class(\''.$row_class['class_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            // '<td>
            //     <a href="#" onclick="upload_grades(\''.$row_class['class_id'].'\')" class="btn btn-default btn-block btn-xs"><span class="glyphicon glyphicon-upload"></span> Grades </a>
            // </td>'

        );
}

echo json_encode($arr);
?>