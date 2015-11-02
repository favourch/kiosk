<?php 
//include '../db/db.php';
//session_start();


### unction to get the full name of the owner of the account that is currently logged in the admin side of the kiosk.
#   function getName(){
###function to get sem_no of active sem
#   function semester(){
###function to get active semester
#   function getActiveSem(){
###function to get the full name linked to the account with account_no = '$account_no'
#   function getAccountName($account_no){




//function to get the full name of the owner of the account that is currently logged in the admin side of the kiosk.
function getName(){

	if(isset($_SESSION['kiosk']['user_id'])){
	  $user_id=$_SESSION['kiosk']['user_id'];

	 // echo $user_id;
	$query_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$user_id'");
	$row_acc=mysql_fetch_assoc($query_acc);
	$type=$row_acc['type'];

	if($type=='admin'){
		$name='Admin';
		return $name;
	}
	else if ($type=='personnel'){
		$query_name=mysql_query("SELECT * FROM cunit_officer_t, org_officer_t, dept_officer_t WHERE cunit_officer_t.account_no='$user_id' OR
								org_officer_t.account_no='$user_id' OR dept_officer_t.account_no='$user_id'");
		$row_name=mysql_fetch_assoc($query_name);
		$personnel_id=$row_name['personnel_id'];
		//echo $personnel_id;
			$query_personnel=mysql_query("SELECT * FROM personnel_t WHERE personnel_id='$personnel_id'") or die(mysql_error());
			$row_personnel=mysql_fetch_assoc($query_personnel);
			$fname=$row_personnel['f_name'];
			//echo $fname;
			$lname=$row_personnel['l_name'];
			$name=$fname.' '.$lname;

			return $name;

		}
	}else{

	    header("location: login.php");
	}
	

}
//function to get sem_no of active sem
function semester(){
	$query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_status='1'") or die(mysql_error());
	$row_sem = mysql_fetch_assoc($query_sem);

	return $row_sem['sem_id'];
}

//function to get active semester
function getActiveSem(){
	$error_prefix = "Error at function getActiveSem::misc_functions.php:: ";
	$query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_status=1") or die($error_prefix.mysql_error());
	$return_value = "";
	if(mysql_num_rows($query_sem)>0){
		$row_sem = mysql_fetch_assoc($query_sem);

		$sem_no = $row_sem['sem_no'];
		$ay_no  = $row_sem['ay_no'];

		$query_ay = mysql_query("SELECT * FROM academic_year_t WHERE ay_id={$ay_no}") or die($error_prefix.mysql_error());
		$row_ay = mysql_fetch_assoc($query_ay);
		$year_start = $row_ay['year_start'];
		$year_end = $row_ay['year_end'];


		switch ($sem_no) {
			case 1:
				$return_value = "1st semester";
				break;
			case 2:
				$return_value = "2nd semester";
				break;
			case 3:
				$return_value = "3rd semester";
				break;
			default:
				
				break;
		}
		$return_value .= " ".$year_start." - ".$year_end;
	}
	else{
		$return_value = "No active Sem.";
	}
	return $return_value;
}


//function to get the full name linked to the account with account_no = '$account_no'
function getAccountName($account_no){
	$errorPrefix = "Error at function getAccountName::misc_functionsphp:: ";
	$query_account = mysql_query("SELECT * FROM account_t WHERE account_no = {$account_no}") or die($errorPrefix.mysql_error());
	$row_account = mysql_fetch_assoc($query_account);
	$account_type = $row_account['type'];
	$name = $row_account['username'];;

	if($account_type=="student"){
		$query_student = mysql_query("SELECT * FROM student_members_t, student_t WHERE student_members_t.account_no='{$account_no}' AND student_members_t.student_id=student_t.student_id") or die($errorPrefix.mysql_error());
		$row_student = mysql_fetch_assoc($query_student);
		$name = $row_student['f_name']." ".$row_student['l_name'];
	}
	else if($account_type=="personnel"){
		$query_personnel = mysql_query("SELECT * FROM personnel_members_t, personnel_t WHERE personnel_members_t.account_no='{$account_no}' AND personnel_members_t.personnel_id=personnel_t.personnel_id") or die($errorPrefix.mysql_error());
		$row_personnel = mysql_fetch_assoc($query_personnel);
		$name = $row_personnel['f_name']." ".$row_personnel['l_name'];
	}
	return $name;

}
?>