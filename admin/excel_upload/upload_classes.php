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

$file = "classes_file";
if ( isset($_POST["submit_classes"]) ) {

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

		
		$i=2;
		if(!verify_classes_file($allDataInSheet, $arrayCount)){
			echo "Incorrect File Format...";
			$_SESSION['kiosk']['error']="Incorrect file template.";
			header("location: ".$referer);
			die ; 
		}

		for(;$i<=$arrayCount;$i++){
			$faculty_id 		= trim($allDataInSheet[$i]["A"]);
			$subject_code 	= trim($allDataInSheet[$i]["B"]);
			$subject_code	.= " ".trim($allDataInSheet[$i]["C"]);
			$subject_title 	= trim($allDataInSheet[$i]["D"]);
			$lec_units		= trim($allDataInSheet[$i]["E"]);
			$lab_units 		= trim($allDataInSheet[$i]["F"]);
			$credit_units 	= trim($allDataInSheet[$i]["G"]);
			$course 		= trim($allDataInSheet[$i]["H"]);
			$block 			= trim($allDataInSheet[$i]["I"]);
			$time 			= trim($allDataInSheet[$i]["J"]);
			$day 			= trim($allDataInSheet[$i]["K"]);
			$room 			= trim($allDataInSheet[$i]["L"]);

			if($faculty_id=="ID"){
				continue;
			}
			$isEntry = false;

			$block = preg_replace("/\([^)]+\)/","",$block);
			//$subject_title = preg_replace("/\([^)]+\)/","",$subject_title);
	
			preg_match('#\((.*?)\)#', $subject_title, $match);
			if(count($match)>0){
				$str = trim($match[1]);
				if(is_numeric(stripos($str, "lec")) || is_numeric(stripos($str,"lab"))){
					$subject_title = preg_replace("/\([^)]+\)/","",$subject_title);
				}
			}
			//echo $subject_title."<br>";

			$faculty_id = verify_faculty_id($temp_db_con, $faculty_id);

			//$block_id     = get_block_id($temp_db_con, $course, get_year_level($block),$course." ".$block, $sem_id);
			$course_code  = insert_course($temp_db_con, $course,'');
			$block_id     = insert_block($temp_db_con, $course_code, get_year_level($block),$course." ".$block, $sem_id);
			//$faculty_id   = get_faculty_id($temp_db_con, $faculty);
			//$year_level   = get_year_level($block);

			$block_name   = $block;
			$subject_id = insert_subject($temp_db_con, $subject_code, $subject_title, $credit_units, $lec_units, $lab_units);
			//$room_code = insert_room($temp_db_con, $room, NULL, NULL);
			//$subject_title = preg_replace("/\([^)]+\)/","",$subject_title);
			//echo $subject_title."<br> "; 

			#check for existing entry with id no.
			if(true || $faculty_id!=""){
				//echo $sem_id."<br>";
				$class_id = insert_class($temp_db_con, $subject_id, $faculty_id, $block_id, $sem_id);
				//echo "class_id =      $class_id     ";
				$schedule_id = insert_schedule_entries($temp_db_con, $class_id, $day, $time, $room);
			}
			


		}
		echo "Finnished Uploading File.";
		$_SESSION['kiosk']['error']=1;
		header("location: ".$referer);

	} else {
		echo "No file selected <br />";
	}
}


//custome functions
function verify_classes_file($allDataInSheet, $len){
	echo "verifying personnel file...<br>";
	$valid = 0;
	$check = [
	"A" => "ID",	
	"B" => "Course Title",
	"D" => "Descriptive Title",
	"E" => "Lec Hrs",
	"F" => "Lab Hrs",
	"G" => "Credit Units",
	"H" => "Course",
	"I" => "Yr and Sec",
	"J" => "Time",
	"K" => "Day" ,
	"L" => "Room"

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
