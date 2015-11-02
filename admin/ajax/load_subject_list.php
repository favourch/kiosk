<?php
$arr["data"]= array(  );


$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
$query_subject = mysqli_query($temp_db_con,"SELECT * FROM subject_t") or die("Error at load_subject_list.php : line 23 :: ".mysql_error());
while($row_subject = mysqli_fetch_array($query_subject)){
    $arr["data"][] = array(
            $row_subject["subject_code"],
            $row_subject["subject_title"],
            $row_subject["lec_units"],
            $row_subject["lab_units"],
            $row_subject["units"],
            '<td>
                <a href="#" onclick="delete_subject(\''.$row_subject['subject_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
            </td>'

            //<a href="#" onclick="edit_subject(\''.$row_subject['subject_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            

        );
}

echo json_encode($arr);
?>