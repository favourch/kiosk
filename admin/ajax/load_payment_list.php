<?php
include_once "../../db/db.php";
$arr["data"]= array(  );


$query_student = mysqli_query($db_con,"SELECT * FROM student_t") or die("Error at load_student_list.php : line 23 :: ".mysql_error());
while($row_student = mysqli_fetch_array($query_student)){

    $arr["data"][] = array(
            $row_student["student_id"],
            $row_student["f_name"]." ".substr($row_student['m_name'],0,2).". ".$row_student['l_name'],
            $row_student["gender"],
            $row_student["status"],
            '<td>
                <a href="#" onclick="view_payment(\''.$row_student['student_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-list"></span> View</a>
            </td>'
            // <a href="#" onclick="edit_student(\''.$row_student['student_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            

        );
}

echo json_encode($arr);
?>