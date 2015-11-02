<?php
include "../../db/db.php";
include "../actions/misc_functions.php";
include "../actions/cms_functions.php";


$sem_id = semester();

/************************ YOUR DATABASE CONNECTION START HERE   ****************************/


	mysql_connect("localhost","root","");
	mysql_select_db("kiosk - testing");
	$temp_db_con = mysqli_connect("localhost", "root", "", "kiosk");
/************************ YOUR DATABASE CONNECTION END HERE  ****************************/
$file = "payments_file";
if ( isset($_POST["submit_payments"]) ) {

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

		//$query = "insert into student_t  values";
		$query = "";
		$query_update = "";


		$course_code = "";

		for($i=1;$i<=$arrayCount;$i++){
			$col1 = trim($allDataInSheet[$i]["A"]);
			$col2 = trim($allDataInSheet[$i]["B"]);
			if(strcasecmp($col1,"course code")==0){
				$course_code = $col2;
				if(!check_course($temp_db_con,$course_code)){
					die(trigger_error("course_code does not exist in the database."));
				}
			}
			if(strcasecmp($col1,"account code")==0){
				$i++;
				break;
			}
		}


		for(;$i<=$arrayCount;$i++){
			$account_code = trim($allDataInSheet[$i]["A"]);
			$account_title = trim($allDataInSheet[$i]["B"]);
			$amount1 = trim($allDataInSheet[$i]["C"]);
			$amount2 = trim($allDataInSheet[$i]["E"]);
			$amount3 = trim($allDataInSheet[$i]["E"]);
			$amount4 = trim($allDataInSheet[$i]["F"]);

			//flags if new entry is existing in the database
			$payment_id = NULL;
			$entered = false;

			
			$query_payment = mysqli_query($temp_db_con, "SELECT * FROM payments_t WHERE course_code='$course_code'
																					AND sem_id='$sem_id'
																					AND account_code='$account_code'
																				") or die(trigger_error(mysqli_error($temp_db_con)));
		    if(mysqli_num_rows($query_payment)>0){
		    	$row_payment = mysqli_fetch_array($query_payment);
		    	$payment_id = $row_payment['payment_id'];
		    }

			if($account_code!=""){ //$id!=null && !stristr($id, "bachelor") 

				if($payment_id==NULL){
					if($entered!=false){
						$query = $query.",";	
					}
					else{
						$entered = true;
					}  
					$query =  "INSERT INTO payments_t VALUES('',
															 '$course_code',
															 '$sem_id',
															 '$account_code',
															 '$account_title',
															 '$amount1',
															 '$amount2',
															 '$amount3',
															 '$amount4'
															)";
					mysqli_query($temp_db_con, $query) or die(trigger_error(mysqli_error($temp_db_con))." $query");
					//echo $query."<br>";
					echo "new entry for payment inserted:<br>";
				}
				else{
					
					$query_update = "UPDATE payments_t SET 
														course_code = '$course_code',
														sem_id = '$sem_id',
														account_code ='$account_code',
														account_title = '$account_title',
														amount_1 = '$amount1',
														amount_2 = '$amount2',
														amount_3 = '$amount3',
														amount_4 = '$amount4'
													 WHERE
													 	payment_id = '$payment_id'
														";
					mysqli_query($temp_db_con, $query_update) or die(trigger_error(mysqli_error($temp_db_con)));
					echo "updated an entry for payments_t:<br>";
					//echo $query_update."<br>";
				}
			}
			






		}
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

?>