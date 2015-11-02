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

$file = "grades_file";
if ( isset($_POST["submit_grades"]) ) {

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
		$course_code = "";
		$block = "";
		$class_id = "";
		$read_students = 0;
		$student_count = 0;

		for(;$i<=$arrayCount;$i++){
			$cell_1		= trim($allDataInSheet[$i]["A"]);
			$cell_2 	= trim($allDataInSheet[$i]["B"]);
			$cell_3 	= trim($allDataInSheet[$i]["C"]);
			$cell_4 	= trim($allDataInSheet[$i]["D"]);
			$cell_5 	= trim($allDataInSheet[$i]["E"]);

		//	echo "$course_code ===== $block ===== $read_students<br>";


			if($cell_1=="#"){
				echo ($student_count>0)? $student_count:"";
				$student_count=0;
				echo "<br>command exec $cell_2<br>";
				$read_students=0;
				if(is_numeric(stripos($cell_2,"course code"))){
					$course_code = trim($cell_3." ".$cell_4);
					$block = "";
					$read_students=0;
				}
				else if(is_numeric(stripos($cell_2,"section"))){
					$block_name = trim($cell_3." ".$cell_4);
					$block = verify_student_block($db_con, $block_name, $sem_id);
				}
				else if(is_numeric(stripos($cell_2,"student id"))){
					if($course_code!="" && $block!=""){
						$read_students=1;
						//echo "reading student";
					}
					//echo "reading student";
				}
				else{

				}

			}
			if(is_numeric($cell_1) && $read_students==1){
				$m_grade = $cell_3;
				$tf_grade = $cell_4;
				$f_grade = $cell_5;


				if(strtolower($m_grade)=='inc')
					$m_grade=0.0;
				if(strtolower($tf_grade)=='inc')
					$tf_grade=0.0;
				if(strtolower($f_grade)=='inc')
					$f_grade=0.0;


				//echo "inserting student in class<br>";
				$reg_no = verify_student_reg($db_con, $cell_2, $sem_id);
				if($reg_no!=""){
					$student_count++;
					$query_class = mysqli_query($db_con, "SELECT class_id FROM class_t, subject_t
																		 WHERE class_t.sem_id='$sem_id'
																		   AND class_t.block_id='$block'
																		   AND class_t.subject_id = subject_t.subject_id
																		   AND subject_t.subject_code = '$course_code'

														 ") or die(trigger_error(mysqli_error($db_con)));
					while($row_class=mysqli_fetch_array($query_class)){
						$class_id = $row_class['class_id'];
						$load_id = insert_load($db_con, $reg_no, $class_id);
					//	echo "inserted load   $load_id<br>";
						$grade_id =  insert_grade($db_con, $load_id, $m_grade, $tf_grade, $f_grade);

					}
					//echo mysqli_num_rows($query_class)."  <br>";
				}
			}

			//$student_id =get_student_id($db_con, $student_id, $student_name, $gender, $age, $status); 
			// $student_id =insert_student($db_con, $student_id, $f_name, $m_name, $l_name, $gender, $birthdate, $address,  $status);
			// echo $reg_no."<br>";
		 //    $reg_no = insert_reg($db_con, $student_id, $reg_no, $reg_date, $year_level, $program, $sem_id);
		 //    echo $sem_id."<br>";
		 //    $load_id = insert_load($db_con, $reg_no, $class_id);

			


 

		}
		echo "Finnished Uploading File.";
		$_SESSION['kiosk']['error']=1;
		header("location: ".$referer);
	} else {
		echo "No file selected <br />";
	}
}


function verify_student_reg($db_con, $student_id, $sem_id){
	$query_reg = mysqli_query($db_con,"SELECT reg_no FROM student_registration_t WHERE student_id='$student_id' AND sem_id='$sem_id'") or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_reg)>0){
		$row_reg = mysqli_fetch_array($query_reg);
		return $row_reg['reg_no'];
	}
	else{
		return "";
	}

}


function verify_student_block($db_con, $block_name, $sem_id){
	$query_block = mysqli_query($db_con,"SELECT block_id FROM student_block_t WHERE block_name='$block_name' AND sem_id='$sem_id'") or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_block)>0){
		$row_block = mysqli_fetch_array($query_block);
		return $row_block['block_id'];
	}
	else{
		return "";
	}

}

?>
