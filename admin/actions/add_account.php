<?php


if(isset($_POST['add_button'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	include "../../db/db.php";

	$privilege=(isset($_POST['checkbox']))? $_POST['checkbox']:NULL;
	//echo $privilege;
	for($i=0; $i<sizeof($privilege); $i++){
		echo $privilege[$i]."<br>";

	}
	if($privilege!=NULL){
		echo $priv_1 = is_numeric((array_search("System Administrator",$privilege)))? 1:0;
		echo $priv_2 = is_numeric((array_search("E - Bulletin Management",$privilege)))? 1:0;

		echo $priv_3 = is_numeric((array_search("Personnel Data",$privilege)))? 1:0;
		echo $priv_4 = is_numeric((array_search("Enrollment Data",$privilege)))? 1:0;
		echo $priv_5 = is_numeric((array_search("Payment Data",$privilege)))? 1:0;

		echo $priv_6 = is_numeric((array_search("Office Information",$privilege)))? 1:0;
		echo $priv_7 = is_numeric((array_search("Member Assignment",$privilege)))? 1:0;
	}

	mysql_query("INSERT INTO account_t 
					  VALUES ('', 
					  	     '{$username}', 
					  	     '{$password}', 
					  	     '{$type}', 
					  	     '1',
					  	     '$priv_1',
					  	     '$priv_2',
					  	     '$priv_3',
					  	     '$priv_4',
					  	     '$priv_5',
					  	     '$priv_6',
					  	     '$priv_7'
					  	     )") or die(trigger_error(mysql_error()));

	echo "Succesfully Added Account";
	$account_no=mysql_insert_id();
	if($type!='admin'){
		if($type=="personnel"){
			$personnel_id = $_POST['member_id'];
			mysql_query("UPDATE personnel_members_t SET account_no = {$account_no} WHERE personnel_id='$personnel_id'") or die("Error at add_account.php: line 19 :: ".mysql_error());

			echo "</br>succesfully updated personnel member data</br>";
			echo "UPDATE cunit_officer_t SET account_no = {$account_no} WHERE personnel_id=$personnel_id";
		}
		elseif ($type =="student") {
			$student_id = $_POST['member_id'];
			mysql_query("UPDATE student_members_t SET account_no = '{$account_no}' WHERE student_id='$student_id'") or die("Error at add_account.php: line 24 :: ".mysql_error());
			echo "succesfully updated student member data";
		}
	}
		header("location: {$_SERVER['HTTP_REFERER']}");
	
}

/* if(true){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	include "../../db/db.php";



	mysql_query("INSERT INTO account_t VALUES('', '{$username}', '{$password}', '{$type}', '1')") or die(mysql_error());
	echo "Succesfully Added Account";

	$account_no = mysql_insert_id();
	if($type!='admin'){
		if($type=="personnel"){
			$personnel_id = $_POST['member_id'];
			mysql_query("UPDATE personnel_members_t SET account_no = {$account_no} WHERE personnel_id='$personnel_id'") or die("Error at add_account.php: line 19 :: ".mysql_error());

			echo "</br>succesfully updated personnel member data</br>";
			echo "UPDATE cunit_officer_t SET account_no = {$account_no} WHERE personnel_id=$personnel_id";
		}
		elseif ($type =="student") {
			$student_id = $_POST['member_id'];
			mysql_query("UPDATE student_members_t SET account_no = '{$account_no}' WHERE student_id='$student_id'") or die("Error at add_account.php: line 24 :: ".mysql_error());
			echo "succesfully updated student member data";
		}
		//header("location: {$_SERVER['HTTP_REFERER']}");
	}

}
 
*/
?>