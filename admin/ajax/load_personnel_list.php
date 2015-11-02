<?php
$arr["data"]= array(  );


$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
$query_personnel = mysqli_query($temp_db_con, "SELECT * FROM personnel_t") or die("Error at cms_panel.php : line 141 :: ".mysql_error());
while($row_personnel = mysqli_fetch_array($query_personnel)){
    $image = $row_personnel["image"];
    $image = ($image!="")? $image:"f3.png";
    $arr["data"][] = array(
            $row_personnel["personnel_id"],
            $row_personnel["f_name"]." ".substr($row_personnel["m_name"],0,1).". ".$row_personnel["l_name"],
            $row_personnel["gender"],
            
            //$row_personnel["academic_rank"],
        
            '<td>
                <a href="#" onclick="upload_image(\''.$row_personnel['personnel_id'].'\')" class="">
                    <img style="width:50px; height: 50px;" src="images/personnel_image/'.$image.'" />
                </a>
            </td>',
      
            '<td>
                <a href="#" onclick="delete_personnel(\''.$row_personnel['personnel_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
            </td>'

                // <a href="#" onclick="edit_personnel(\''.$row_personnel['personnel_id'].'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            

        );
}

echo json_encode($arr);
?>
