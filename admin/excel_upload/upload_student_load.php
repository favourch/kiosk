<?php
include "../../db/db.php";
include "../actions/misc_functions.php";
include "../actions/cms_functions.php";

$sem_id = semester();
$referer = $_SERVER['HTTP_REFERER'];
session_start();

/************************ YOUR DATABASE CONNECTION START HERE   ****************************/


	mysql_connect("localhost","root","");
	mysql_select_db("kiosk - testing");
	$temp_db_con = mysqli_connect("localhost", "root", "", "kiosk");

		    
/************************ YOUR DATABASE CONNECTION END HERE  ****************************/

$file = "student_load_file";
if ( isset($_POST["submit_student_load"]) ) {

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

		
		$i=1;

		//$class_id = insert_class($temp_db_con, $subject_id, $faculty_id, $block_id, $sem_id);
		$class_id = $_POST['class_id'];
		echo $class_id."<br>";
		
		if(!verify_student_load_file($allDataInSheet, $arrayCount)){
			echo "Incorrect File Format...";
			$_SESSION['kiosk']['error']="Incorrect file template.";
			header("location: ".$referer);
			die ; 
		}

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
			$status 	    = trim($allDataInSheet[$i]["K"]);

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
			#retrieve names
			$name_arr = explode(",", $student_name);
			$f_name = "";
			$m_name = "";
			$l_name = $name_arr[0];
			$name_arr = explode(" ", $name_arr[1]);
			foreach ($name_arr as $name) {
				if(ctype_upper($name)){
					$f_name .= $name." ";
				}
				else{
					$m_name .= $name." ";
				}
			}
			#identify gender
			$gender = ($gender=="M")? "Male":"Female";
			#initialize status
			$status = "regular";
			$birthdate = NULL;
			$address = NULL;

			//$student_id =get_student_id($temp_db_con, $student_id, $student_name, $gender, $age, $status); 
			$student_id =insert_student($temp_db_con, $student_id, $f_name, $m_name, $l_name, $gender, $birthdate, $address,  $status);
			echo $reg_no."<br>";
		    $reg_no = insert_reg($temp_db_con, $student_id, $reg_no, $reg_date, $year_level, $program, $sem_id);
		    echo $sem_id."<br>";
		    $load_id = insert_load($temp_db_con, $reg_no, $class_id);

			


 

		}
		echo "Finnished Uploading File.";
		$_SESSION['kiosk']['error']=1;
		header("location: ".$referer);
	} else {
		echo "No file selected <br />";
	}
}




function verify_student_load_file($allDataInSheet, $len){
	echo "verifying student load file...<br>";
	$valid = 0;
	$check = [
	"A" => "RegID",
	"B" => "Reg.Date",
	"C" => "Student No.",
	"D" => "Student's Full Name",
	"E" => "Gender",
	"F" => "Age",
	"G" => "Program",
	"H" => "YearLevel",
	"I" => "ValidationDate",
	"J" => "ORNo",
	"K" => "Load Status"	
	// "L" => "Load Changes"	
	// "M" => "Color"

	];
	for($i=1;$i<=$len;$i++){
		$entry = trim($allDataInSheet[$i]["A"]);
		if($entry==$check['A']){
			$valid = 1;
			foreach ($check as $index => $value) {
				$src = trim($allDataInSheet[$i][$index]);
				if($src!=$check[$index]){
					$valid = 0;
					break;
				}
			}
			
			break;
		}
	}
	return $valid;
}

?>
