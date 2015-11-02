<?php

if (isset($_POST['submit'])) {
	
    $j = 0; //Variable for indexing uploaded image 
    $type_id=$_POST['type_id'];
	
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
		$image_name=$_FILES["file"]["name"][$i];
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 10000000000000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
					//echo $image_name;
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], '../../e-bulletin/images/imgs_post/'.$image_name)) {//if file moved to uploads folder
			if($type_id=='event') {
				$query_insertimage=mysql_query("INSERT INTO attachment_t VALUES('', '$post_id', '$image_name')") or die (mysql_error());
			} else if ($type_id=='message') {
				$query_insertimage=mysql_query("INSERT INTO attachment_t VALUES('', '$post_id', '$image_name')");
	
			} else if ($type_id=='holiday') {
				$query_insertimage=mysql_query("INSERT INTO attachment_t VALUES('', '$post_id', '$image_name')");
	
			}
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}
header("location: {$_SERVER['HTTP_REFERER']}");
?>