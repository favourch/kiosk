<?php
include "../../db/db.php";
include "../actions/misc_functions.php";
$sem_id = semester();

/************************ YOUR DATABASE CONNECTION START HERE   ****************************/


	mysql_connect("localhost","root","");
	mysql_select_db("kiosk - testing");
	$temp_db_con = mysqli_connect("localhost", "root", "", "kiosk - testing");

		    
/************************ YOUR DATABASE CONNECTION END HERE  ****************************/

$file = "student_list_class_file";
if ( isset($_POST["submit_student_list_class"]) ) {

    if ( isset($_FILES[$file])) {
        //if there was an error uploading the file
        if ($_FILES[$file]["error"] > 0) {
            echo "Return Code: " . $_FILES[$file]["error"] . "<br />";
		}
		else {
			if (file_exists($_FILES[$file]["name"])) {
				//unlink($_FILES["file"]["name"]);
				$name = $_FILES[$file]["name"];
			}
			$name = $_FILES[$file]["name"];
			//echo $name;
			$storagename = "excel/".$name;
			move_uploaded_file($_FILES[$file]["tmp_name"],  $storagename);
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

		
		$i=0;

		for($i=2;$i<=$arrayCount;$i++){
			$reg_no 		= trim($allDataInSheet[$i]["A"]);
			$reg_date 		= trim($allDataInSheet[$i]["B"]);
			

			if(strcasecmp($reg_no,"course code:")==0){
				$subject_code = $reg_date;
			}
			elseif (strcasecmp($reg_no,"descriptive title:")==0) {
				$subject_title = $reg_date;
			}
			elseif (strcasecmp($reg_no,"faculty assigned:")==0) {
				$faculty = $reg_date;
			}
			elseif (strcasecmp($reg_no,"course & year:")==0) {
				$course_year = explode("-",$reg_date);
				$course_code = chop($course_year[0]);
				$class_year_level = chop($course_year[1]);
			}
			elseif (strcasecmp($reg_no,"major & section:")==0) {
				$block = $reg_date; //block name
			}
			elseif (strcasecmp($reg_no,"units:")==0) {
				$units = $reg_date;
			}
			elseif (strcasecmp($reg_no,"time:")==0) {
				$time = $reg_date;
			}
			elseif (strcasecmp($reg_no,"days:")==0) {
				$days = $reg_date;
			}
			elseif(strcasecmp($reg_no,"regid")==0){
				break;
			}

		}
		$block_name = $block;

		$block_id = get_block_id($temp_db_con, $course_code, $class_year_level, $block, $sem_id);
		$faculty_id = get_faculty_id($temp_db_con, $faculty);

		$query_class = mysqli_query($temp_db_con, "SELECT class_id FROM class_t WHERE block_id='{$block_id}'
																	AND faculty_id='{$faculty_id}'
																	AND subject_code='{$subject_code}'
																") or die("Error at upload_student_lis_class.php : line 97 :: ".mysqli_error($temp_db_con));
		if(mysqli_num_rows($query_class)>0){
			$row_class = mysqli_fetch_array($query_class);
			$class_id = $row_class['class_id'];
		}	
		else{
			$query_class_add = 'INSERT INTO class_t VALUES("'.''.'",
														"'.$faculty_id.'",
														"'.$sem_id.'",
														"'.$subject_code.'",
														"'.$course_code.'",
														"'.$class_year_level.'",
														"'.$block_name.'",
														"'.$block_id.'")';

			echo ($query_class_add);
			mysqli_query($temp_db_con, $query_class_add) or die("Error at upload_student_lis_class.php : line 118 :: ".mysqli_error($temp_db_con));
			$class_id = mysqli_insert_id($temp_db_con);
		}

		$query_reg_add = "";
		$query_load_add = "";
		$query_reg_update = "";
		$query_load_update = "";


		for(;$i<=$arrayCount;$i++){
			$reg_no 		= trim($allDataInSheet[$i]["A"]);
			$reg_date 		= trim($allDataInSheet[$i]["B"]);
			$student_id 	= trim($allDataInSheet[$i]["C"]);
			$student_name 	= trim($allDataInSheet[$i]["D"]);
			$gender 		= trim($allDataInSheet[$i]["E"]);
			$age 			= trim($allDataInSheet[$i]["F"]);
			$program 		= trim($allDataInSheet[$i]["G"]);
			$year_level 	= trim($allDataInSheet[$i]["H"]);
			$validation_date= trim($allDataInSheet[$i]["I"]);
			$or_no 			= trim($allDataInSheet[$i]["J"]);
			$load_status 	= trim($allDataInSheet[$i]["K"]);

			$isEntry = false;

			//flags if new entry is existing in the database
			$existing_student_no = NULL;
			$existing_course_code = NULL;
			$existing_reg_no = NULL;
			$existing_load_id = NULL;

			if(is_numeric($reg_no)){
				$isEntry = true;
			}
			else{
				continue;
			}
	
			#check for existing entry with id no.
			$query_student = mysql_query("SELECT  student_id FROM student_t WHERE student_id='{$student_id}'") or die("Error at upload_student_lis_class.php : line 106 :: ".mysql_error());
		    if(mysql_num_rows($query_student)>0){
		    	$isEntry=false;
		    	$row_student = mysql_fetch_assoc($query_student);
		    	$existing_student_no = $row_student['student_id'];
		    }

		    $query_reg = mysqli_query($temp_db_con, "SELECT reg_no FROM student_registration_t WHERE reg_no='{$reg_no}'") or die("Error at upload_student_lis_class.php : line 106 :: ".mysqli_error($temp_db_con));
		    if(mysqli_num_rows($query_reg)>0){
		    	$row_reg = mysqli_fetch_array($query_reg);
		    	$existing_reg_no = $row_reg['reg_no'];
		    }
		    

			if($existing_reg_no==NULL){
				if($query_reg_add!=""){
					$query_reg_add .= ",";	
				} 
				$query_reg_add .= '("'.$reg_no.'",
								   "'.$student_id.'", 
								   "'.$reg_date.'", 
								   "'.$sem_id.'", 
								   "'.$course_code.'", 
								   "'.$year_level.'")';
			}
			

			$query_student_load = mysqli_query($temp_db_con, "SELECT load_id FROM student_load_t WHERE reg_no='{$reg_no}' AND class_id='{$class_id}'") or die("Error at upload_student_lis_class.php : line 106 :: ".mysqli_error($temp_db_con));
		    if(mysqli_num_rows($query_student_load)>0){
		    	$row_student_load = mysqli_fetch_array($query_student_load);
		    	$existing_load_id = $row_student_load['load_id'];
		    }


			if($existing_load_id==NULL){
				if($query_load_add!=""){
					$query_load_add .= ",";	
				} 
				$query_load_add .= '("'.''.'",
								   "'.$reg_no.'", 
								   "'.$class_id.'")';
			}




		}
		
		if($query_reg_add!=""){
			mysqli_query($temp_db_con, 'insert into student_registration_t VALUES '.$query_reg_add) or die("Error at upload_student_lis_class.php : line 195 :: ".mysqli_error($temp_db_con));
			echo "Successfuly uploaded regsitration data.";
		}
		
		if($query_load_add!=""){
			mysqli_query($temp_db_con, 'insert into student_load_t VALUES '.$query_load_add) or die("Error at upload_student_lis_class.php : line 200 :: ".mysqli_error($temp_db_con));
			echo "Successfuly uploaded student load data.";
		}
		
		//echo mysql_real_escape_string($query_reg_add);
		//echo mysql_real_escape_string($query_load_add);

		//$link = "<script>window.open('../confirm_faculty_list.php','Confirm Student', 'width=900,height=500,left=100,top=80,location=no')</script>";
		
		//echo $link;

	} else {
		echo "No file selected <br />";
	}
}


//custome functions

function get_block_id($temp_db_con, $course_code, $class_year_level, $block, $sem_id){
	$block_id = "";
	$query_block = mysqli_query($temp_db_con,"SELECT block_id FROM student_block_t WHERE course_code='$course_code' 
																AND year_level='$class_year_level'
																AND block_name='$block'
															") or die("Error at upload_student_lis_class.php : line 192 :: ".mysqli_error($temp_db_con));
	if(mysqli_num_rows($query_block)>0){
		$row_block = mysqli_fetch_array($query_block);
		$block_id = $row_block['block_id'];
	}
	else{
		mysqli_query($temp_db_con, "INSERT INTO student_block_t VALUES('',
														 '$block',
														 '$course_code',
														 '$class_year_level',
														 '$sem_id'

														)") or die("Error at upload_student_lis_class.php : line 202 :: ".mysqli_error($temp_db_con));
		$block_id = mysqli_insert_id($temp_db_con);
	}
	return $block_id;
}
function get_faculty_id($temp_db_con, $faculty){
	$faculty_id = $faculty;

	$query = "SELECT personnel_id FROM personnel_t WHERE  CONCAT(f_name,' ',m_name, ' ',l_name) LIKE '%".$faculty."%' OR CONCAT(l_name,', ',f_name,' ',m_name) LIKE '%".$faculty."%'";
	echo $query."<br>";
	$query_faculty = mysqli_query($temp_db_con, $query) or die("Error at upload_student_lis_class.php : line 216 :: ".mysqli_error($temp_db_con));
	if(mysqli_num_rows($query_faculty)>0){
		$row_faculty = mysqli_fetch_array($query_faculty);
		$faculty_id = $row_faculty['personnel_id'];
	}
	return $faculty_id;
}
?>
