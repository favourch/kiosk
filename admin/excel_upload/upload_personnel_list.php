<?php
include "../actions/cms_functions.php";
include "../../db/db.php";
$referer = $_SERVER['HTTP_REFERER'];
session_start();
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/


	mysql_connect("localhost","root","");
	mysql_select_db("kiosk - testing");



/************************ YOUR DATABASE CONNECTION END HERE  ****************************/
if ( isset($_POST["submit_personnel_list"]) ) {
    if ( isset($_FILES["personnel_list_file"])) {
        //if there was an error uploading the file
        if ($_FILES["personnel_list_file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["personnel_list_file"]["error"] . "<br />";
		}
		else {
			if (file_exists($_FILES["personnel_list_file"]["name"])) {
				//unlink($_FILES["file"]["name"]);
				$name = $_FILES["personnel_list_file"]["name"];
			}
			$name = $_FILES["personnel_list_file"]["name"];
			//echo $name;
			$storagename = "excel/".$name;
			move_uploaded_file($_FILES["personnel_list_file"]["tmp_name"],  $storagename);
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

		if(!verify_personnel_file($allDataInSheet, $arrayCount)){
			echo "Incorrect File Format...";
			$_SESSION['kiosk']['error']="Incorrect file template.";
			header("location: ".$referer);
			die ; 
		}
		
		for($i=2;$i<=$arrayCount;$i++){
			$number = trim($allDataInSheet[$i]["A"]);
		
			$temp = explode( " ", $number);
			if(is_numeric($number)){
				$l_name = trim($allDataInSheet[$i]["B"]);
				$f_name = trim($allDataInSheet[$i]["C"]);
				$m_name = trim($allDataInSheet[$i]["D"]);
				$personnel_id = trim($allDataInSheet[$i]["E"]);
				$gender = trim($allDataInSheet[$i]["F"]);
				$academic_rank = trim($allDataInSheet[$i]["G"]);
				$b_day = trim($allDataInSheet[$i]["I"]);
				$status = trim($allDataInSheet[$i]["K"]);

				$b_day_arr = explode("-", $b_day);
				if(count($b_day_arr)>1){
					$b_day = "19".$b_day_arr[2]."-".$b_day_arr[0]."-".$b_day_arr[1];
				}
				else{
					$b_day = "";
				}
				$personnel_id = insert_personnel($db_con, $personnel_id, $f_name, $m_name, $l_name, $gender, $academic_rank, $status, $b_day);
				//echo $personnel_id."<br>";
			}
		} 
		echo "Finnished Uploading File.";
		$_SESSION['kiosk']['error']=1;
		header("location: ".$referer);

	} else {
		echo "No file selected <br />";
	}
}




function verify_personnel_file($allDataInSheet, $len){
	echo "verifying personnel file...<br>";
	$valid = 0;
	$check = [
		"A" => "#",
		"B" => "Surname",
		"C" => "First Name" ,
		"D" => "M.I",
		"E" => "Empl. No",
		"F" => "Gender",
		"G" => "Academic Rank",
		"H" => "Civil Status",
		"I" => "B-Day",
		"J" => "Age",
		"K" => "status"

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