<?php 
    
    if(isset($_POST['verify']) and true){ //for PHP style validation
    	include_once "../db/db.php";

    	$msg="";

    	$student_id = $_POST['student_id'];
    	$l_name = $_POST['l_name'];

    	$query_student = mysql_query("SELECT * FROM student_t WHERE student_id='{$student_id}'") or die(mysql_error());
    	if($row_student = mysql_fetch_assoc($query_student)){
            $db_l_name = $row_student['l_name'];
            if($db_l_name==$l_name){
    		  header("location: ../student-home.php");
            }
    	}
    	else{
    		$msg="No Record Found";
    		header("location: ../student-verification?msg=".$msg.".php");
    	}

    	

    	echo $student_id." ".$registration_no;
    }
    else{              //AJAX style validation
    	//echo "false";
    	include_once "../db/db.php";

    	$student_id = $_GET['stud_id'];
    	$l_name = $_GET['l_name'];


        $query_student = mysql_query("SELECT * FROM student_t WHERE student_id='{$student_id}'") or die(mysql_error());
        if($row_student = mysql_fetch_assoc($query_student)){
            $db_l_name = $row_student['l_name'];
            if(strtolower($db_l_name)==strtolower($l_name)){
              echo "success";
            }
            else{
                echo "That's not your last name. ";
            }
        }
        else{
            echo "verification failed.";
        }
    }

?>