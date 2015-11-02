<?php
$arr["data"]= array(  );


$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
$query_block = mysqli_query($temp_db_con,"SELECT * FROM student_block_t") or die("Error at load_student_list.php : line 23 :: ".mysql_error());
while($row_block = mysqli_fetch_array($query_block)){
    $arr["data"][] = array(
            $row_block["block_name"],
            $row_block["course_code"],
            $row_block["year_level"],
            '<td>
                
                <a href="#" onclick="edit_block(\''.$row_block['block_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
            </td>'

            // <a href="#" onclick="edit_block(\''.$row_block['block_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>

        );
}

echo json_encode($arr);
?>