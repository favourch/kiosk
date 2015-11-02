<?php
include "../../db/db.php";
include "../actions/misc_functions.php";
$sem_id = semester();
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/


	mysql_connect("localhost","root","");
	mysql_select_db("kiosk - testing");



/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


if ( isset($_POST["submit_student_list"]) ) {
    if ( isset($_FILES["student_list_file"])) {
        //if there was an error uploading the file
        if ($_FILES["student_list_file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["student_list_file"]["error"] . "<br />";

		}
		else {
			if (file_exists($_FILES["student_list_file"]["name"])) {
				//unlink($_FILES["file"]["name"]);
				$name = $_FILES["student_list_file"]["name"];
			}
			$name = $_FILES["student_list_file"]["name"];
			echo $name;
			$storagename = "excel/".$name;
			move_uploaded_file($_FILES["student_list_file"]["tmp_name"],  $storagename);
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

		$query = "";
		$query_reg = "";
		//$query = "";

		$course = null;
		$entered = false;
		$reg_entered = false;
		$gender = "male";
		$course = "BSIT";
		for($i=2;$i<=$arrayCount;$i++){
			$id = trim($allDataInSheet[$i]["A"]);
			$num = trim($allDataInSheet[$i]["B"]);
			$name = htmlentities(trim($allDataInSheet[$i]["C"]));
			$address = htmlentities(trim($allDataInSheet[$i]["D"]));
			$age = trim($allDataInSheet[$i]["E"]);
			$unit = trim($allDataInSheet[$i]["F"]);
			$yr_level = trim($allDataInSheet[$i]["G"]);
			$isEntry = false;



			//$name = mysql_real_escape_string($name);
			//$address = mysql_real_escape_string($address);

			if(stristr($id, "bachelor")){
				$query_course = mysql_query("SELECT course_code FROM course_t WHERE course_title LIKE '%{$id}%'") or die(mysql_error());
				$row_course =mysql_fetch_assoc($query_course);
				$course = $row_course['course_code'];
			}

			if(stristr($id, "male")){
				if(stristr($id, "female")){
					$gender="female";
				}
				else{
					$gender = "male";
				}
			}

			$temp = explode( ".", $id);
			$temp = explode( " ", $temp[0]);
			$check = strtolower($temp[0]);

			if(is_numeric($check)){//strspn($check, "1234567890"
				$isEntry = true;
			}
			
			$reg_no = $sem_id."00".$num;
			
			//check for existing value of student registration in database
			$query_check = mysql_query("SELECT reg_no FROM student_registration_t WHERE reg_no='{$reg_no}'") or die(mysql_error());
		    if(mysql_num_rows($query_check)>0){
		    	//$isEntry=false;
		    	continue;
		    }

			if($isEntry==true){ //$id!=null && !stristr($id, "bachelor") 

				if($reg_entered!=false){
					$query_reg = $query_reg.",";	
				}
				else{
					$reg_entered = true;
				}
				
				$query_reg = $query_reg.'("'.$reg_no.'",
										  "'.$num.'",
										  NULL,
										  "'.$sem_id.'",
										  "'.$course.'",
										  "'.$yr_level.'")';
			}


			//check for existing value of student in database
			$query_check = mysql_query("SELECT student_id FROM student_t WHERE student_id='{$num}'") or die(mysql_error());
		    if(mysql_num_rows($query_check)>0){
		    	//$isEntry=false;
		    	continue;
		    }
			if($isEntry==true){ //$id!=null && !stristr($id, "bachelor") 
				if($entered!=false){
					$query = $query.",";	
				}
				else{
					$entered = true;
				}
				$query =  $query.'("'.$num .'",
								   "'.$name.'", 
								   "'.''.'", 
								   "'.''.'", 
								   "'.$gender.'", 
								   NULL, 
								   "'.$address.'",
								   NULL)';
			}



		}//for loop
		if($query!=""){
			mysql_query("insert into student_t  values ".$query) or die(mysql_error());
		}
		if($query_reg!=""){
			mysql_query("insert into student_registration_t  values ".$query_reg) or die(mysql_error());
		}
		$link = "<script>window.open('../confirm_student_list.php','Confirm Student', 'width=900,height=500,left=100,top=80,location=no')</script>";
		
		echo $link;
		//header("location: ../cms.php");
	} else {
		echo "No file selected <br />";
	}
}
?>