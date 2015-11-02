<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/


	mysql_connect("localhost","root","");
	mysql_select_db("kiosk - testing");
	$temp_db_con = mysqli_connect("localhost", "root", "", "kiosk - testing");

		    
/************************ YOUR DATABASE CONNECTION END HERE  ****************************/
if ( isset($_POST["submit_faculty_profile"]) ) {

    if ( isset($_FILES["faculty_profile_file"])) {
        //if there was an error uploading the file
        if ($_FILES["faculty_profile_file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["faculty_profile_file"]["error"] . "<br />";
		}
		else {
			if (file_exists($_FILES["faculty_profile_file"]["name"])) {
				//unlink($_FILES["file"]["name"]);
				$name = $_FILES["faculty_profile_file"]["name"];
			}
			$name = $_FILES["faculty_profile_file"]["name"];
			//echo $name;
			$storagename = "excel/".$name;
			move_uploaded_file($_FILES["faculty_profile_file"]["tmp_name"],  $storagename);
			$uploadedStatus = 1;
	   }


		set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
		include 'PHPExcel/IOFactory.php';

		// This is the file path to be uploaded.
		$inputFileName = 'excel/'.$name ; //student_list.xlsx

		try {
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}


		$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

		//$query = "insert into student_t  values";
		$query = "";
		$query_update = "";


		$course = null;
		$entered = false;
		$gender = "male";
		$course = "BSIT";
		for($i=2;$i<=$arrayCount;$i++){
			$id = trim($allDataInSheet[$i]["A"]);
			$name = trim($allDataInSheet[$i]["B"]);
			$gender = trim($allDataInSheet[$i]["C"]);
			$b_day = trim($allDataInSheet[$i]["E"]);
			$age = trim($allDataInSheet[$i]["F"]);
			$academic_rank = trim($allDataInSheet[$i]["G"]);
			$status = trim($allDataInSheet[$i]["L"]);
			$isEntry = false;

			//flags if new entry is existing in the database
			$existing_personnel_id = NULL;

			$temp = explode( ".", $id);
			$temp = explode( " ", $temp[0]);
			$check = $temp[0];

			if(is_numeric($check)){
				$isEntry = true;
			}
			else{
				continue;
			}
			$b_day_arr = explode("-", $b_day);
			$b_day = "19".$b_day_arr[2]."-".$b_day_arr[0]."-".$b_day_arr[1];

			#check for existing entry with id no.
			$query_check = mysql_query("SELECT personnel_id FROM personnel_t WHERE personnel_id='{$id}'") or die(mysql_error());
		    if(mysql_num_rows($query_check)>0){
		    	$isEntry=false;
		    }


		    # check for existing entry with name
		    $query_check_name = mysql_query("SELECT * FROM `personnel_t` WHERE CONCAT(f_name,' ',m_name,' ', l_name)='{$name}'") or die(mysql_error());
		    if(mysql_num_rows($query_check_name)>0){
		    	$row_personnel = mysql_fetch_assoc($query_check_name);
		    	$existing_personnel_id = $row_personnel['personnel_id'];
		    }

			if($isEntry=="true"){ //$id!=null && !stristr($id, "bachelor") 

				if($existing_personnel_id==NULL){
					if($entered!=false){
						$query = $query.",";	
					}
					else{
						$entered = true;
					}  
					$query =  $query.'("-'.$id .'",
									   "'.$name.'", 
									   "'.''.'", 
									   "'.''.'", 
									   "'.$gender.'",
									   "'.$academic_rank.'", 
									   "'.$status.'", 
									   NULL,  
									   "'.$b_day.'")<br>';
				}
				else{
					
					$query_update = $query_update.'UPDATE personnel_t SET gender="'.$gender.'",
																		  academic_rank="'.$academic_rank.'",
																		  status="'.$status.'",
																		  b_day="'.$b_day.'"
																	WHERE personnel_id="'.$existing_personnel_id.'";';
				}
			}
			






		}
		/*
		if($query!=""){
			mysql_query('insert into personnel_t VALUES '.$query) or die(mysql_error());
			echo "Successfuly uploaded file.";
		}*/
		if($query_update!=""){
			mysqli_multi_query($temp_db_con,$query_update) or die("Error at upload_faculty_list.php : line 140 :: ".mysqli_error($temp_db_con));
			echo "Successfuly Updtaed rows in database.";
		}
		
		//echo mysql_real_escape_string($query);
		//echo mysql_real_escape_string($query_update);

		//$link = "<script>window.open('../confirm_faculty_list.php','Confirm Student', 'width=900,height=500,left=100,top=80,location=no')</script>";
		
		//echo $link;

	} else {
		echo "No file selected <br />";
	}
}
?>