<?php
$arr["data"]= array(  );
$sem_id = "";
if(isset($_GET['sem_id'])){
    $sem_id = $_GET['sem_id'];
    $query_str = "SELECT * FROM personnel_t WHERE personnel_id IN (SELECT faculty_id FROM class_t WHERE sem_id='$sem_id')";
}
else{
    $query_str = "SELECT * FROM personnel_t WHERE personnel_id IN (SELECT faculty_id FROM class_t)";
}
$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
$query_personnel = mysqli_query($temp_db_con, $query_str) or die("Error at cms_panel.php : line 141 :: ".mysql_error());
while($row_personnel = mysqli_fetch_array($query_personnel)){
    $arr["data"][] = array(
            $row_personnel["personnel_id"],
            $row_personnel["f_name"]." ".substr($row_personnel["m_name"],0,1).". ".$row_personnel["l_name"],
            $row_personnel["gender"],
            $row_personnel["academic_rank"],
            '<td>
                <a href="#" onclick="load_view_personnel(\''.$row_personnel['personnel_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-list"></span> View</a>
            </td>',
            '<td>
                <a href="#" onclick="delete_personnel(\''.$row_personnel['personnel_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
            </td>'

                // <a href="#" onclick="edit_personnel(\''.$row_personnel['personnel_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            

        );
}

echo json_encode($arr);
?>
