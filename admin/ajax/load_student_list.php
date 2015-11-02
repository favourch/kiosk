<?php
$arr["data"]= array(  );


$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
$query_student = mysqli_query($temp_db_con,"SELECT * FROM student_t") or die(mysql_error());
while($row_student = mysqli_fetch_array($query_student)){

    $arr["data"][] = array(
            $row_student["student_id"],
            $row_student["f_name"]." ".substr($row_student['m_name'],0,2).". ".$row_student['l_name'],
            $row_student["gender"],
            $row_student["status"],
            '<td>
                <a href="#" onclick="load_view_student(\''.$row_student['student_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-list"></span> View</a>
            </td>',
            '<td>
                <a href="#" onclick="delete_student(\''.$row_student['student_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
            </td>'

            // <a href="#" onclick="edit_student(\''.$row_student['student_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            

        );
}

echo json_encode($arr);
?>