<?php
include "../../db/db.php";
if (isset($_POST['submit_student_load'])) {
	
    	$p_id=$_POST['personnel_id'];

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
		$image_name=$_FILES["file"]["name"];
        $ext = explode('.', basename($_FILES['file']['name']));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
      
	  if (($_FILES["file"]["size"]< 10000000000000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
					//echo $image_name;
            
            if (move_uploaded_file($_FILES['file']['tmp_name'], '../images/personnel_image/'.$image_name)) {//if file moved to uploads folder
			
				$query_insertimage=mysql_query("UPDATE personnel_t SET image='$image_name' WHERE personnel_id='$p_id'") or die(mysql_error());
	
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
}

header ("Location: {$_SERVER['HTTP_REFERER']}");


?>