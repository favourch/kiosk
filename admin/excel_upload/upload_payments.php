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
/************************ YOUR DATABASE CONNECTION END HERE  ****************************/
$file = "payments_file";
if ( isset($_POST["submit_payments"]) ) {

    if ( isset($_FILES[$file])) {
        //if there was an error uploading the file
        if ($_FILES[$file]["error"] > 0) {
            echo "Return Code: " . $_FILES[$file]["error"] . "<br />";
            die;
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

		if(!verify_payment_file($allDataInSheet, $arrayCount)){
			echo "Incorrect File Format...";
			$_SESSION['kiosk']['error']="Incorrect file template.";
			header("location: ".$referer);
			die ; 
		}
 

		//$sem_id = $_POST['semester'];
		//print_r($_POST);
		for($i=1;$i<=$arrayCount;$i++){
			$entry = trim($allDataInSheet[$i]["A"]);
			$student_id = trim($allDataInSheet[$i]["B"]);
			$trans_date = trim($allDataInSheet[$i]["C"]);
			$trans_code = trim($allDataInSheet[$i]["D"]);
			$ref_no = trim($allDataInSheet[$i]["E"]);
			$particulars = trim($allDataInSheet[$i]["F"]);
			$debit = trim($allDataInSheet[$i]["G"]);
			$credit = trim($allDataInSheet[$i]["H"]);
			$balance = trim($allDataInSheet[$i]["I"]);
			$trans_date =  date("Y-m-d h:i:s", strtotime($trans_date));
			//flags if new entry is existing in the database
			$payment_id = NULL;
			$entered = false;


			if(is_numeric($entry)){
				$query_student = mysqli_query($db_con,"SELECT student_id FROM student_t WHERE student_id='$student_id'") or die(trigger_error(mysqli_erorr($db_con)));
				//echo $entry." ";
				if(mysqli_num_rows($query_student)){
					$payment = insert_payment($db_con, $student_id, $sem_id, $trans_date, $trans_code, $ref_no, $particulars, $debit, $credit, $balance);
					//echo $payment."<br>";
				}
				else{
					//echo "student ID not found <br>";
				}
			}
			
		
		}
		echo "Finnished Uploading File.";
		$_SESSION['kiosk']['error']=1;
		header("location: ".$referer);
	} else {
		echo "No file selected <br />";
	}
}


function check_course($db_con, $course_code){
	$query_course = mysqli_query($db_con,"SELECT * FROM course_t WHERE course_code='$course_code'") or die(trigger_error(mysqli_erorr($db_con)));
	if(mysqli_num_rows($query_course)>0){
		return true;
	}
	else{
		return false;
	}
}



function verify_payment_file($allDataInSheet, $len){
	echo "verifying personnel file...<br>";
	$valid = 0;
	$check = [
	"A" => "#",
	"B" => "STUDENT ID",
	"C" => "TRANS. DATE",
	"D" => "TRANS. CODE",
	"E" => "REFERENCE NO.",
	"F" => "PARTICULARS",
	"G" => "DEBIT",
	"H" => "CREDIT",
	"I" => "BALANCE"


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