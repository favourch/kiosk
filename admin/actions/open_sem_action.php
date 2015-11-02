<?php 

include '../../db/db.php';

if(isset($_GET['action'])=="set_active"){

	$sem_id=$_GET['sem_id'];

	$updates=mysql_query("UPDATE semester_t SET sem_status='0' WHERE sem_status='1'");
	$update_sem=mysql_query("UPDATE semester_t SET sem_status='1' WHERE sem_id='$sem_id'");
	echo "success";

	header("location: ../open_sem.php");
} 

if(isset($_GET['sem_no'])){
	$sem_no=$_GET['sem_no'];
	echo $sem_no;
	$year_start=$_GET['year_start'];
	$year_end=$_GET['year_end'];

	$query_year = mysql_query("SELECT ay_id FROM academic_year_t WHERE year_start='$year_start' AND year_end='$year_end' ") or die(trigger_error(mysql_error()));
	if(mysql_num_rows($query_year)>0){
		$row_year = mysql_fetch_assoc($query_year);
		$ay_id = $row_year['ay_id'];
	}
	else{
		mysql_query("INSERT INTO academic_year_t VALUES('','$year_start','$year_end')")or die(trigger_error(mysql_error()));
		$ay_id = mysql_insert_id();
	}

	mysql_query("UPDATE semester_t SET sem_status='0' WHERE sem_status='1'") or die(trigger_error(mysql_error()));
	mysql_query("INSERT INTO semester_t VALUES('', '$sem_no', '$ay_id', '1')") or die(trigger_error(mysql_error()));





// if($sem_no=='2'){
// 	$query_select=mysql_query("SELECT * FROM academic_year_t WHERE year_start<>'$year_start'");
// } else if($sem_no=='3') {
// 	$query_select=mysql_query("SELECT * FROM academic_year_t WHERE year_start<>'$year_start'");
// } else if($sem_no=='1'){
// 	$query_select=mysql_query("SELECT * FROM academic_year_t WHERE year_start='$year_start'");
// }
// 	if(mysql_num_rows($query_select)>0){
		
// 		$query_insert=mysql_query("INSERT INTO academic_year_t VALUES('', '$year_start', '$year_end')");
		
// 		$select=mysql_query("SELECT MAX(ay_id) as id FROM academic_year_t");
// 		$select_id=mysql_fetch_assoc($select);
// 		$id=$select_id['id'];
		
		
// 		$update=mysql_query("UPDATE semester_t SET sem_status='0' WHERE sem_status='1'");
// 		$query_insert_sem=mysql_query("INSERT INTO semester_t VALUES('', '$sem_no', '$id', '1')");
		
// 		} else {
			
// 		$select=mysql_query("SELECT MAX(ay_id) as id FROM academic_year_t");
// 		$select_id=mysql_fetch_assoc($select);
// 		$id=$select_id['id'];
		
// 		$query_count=mysql_query("SELECT * FROM semester_t");
// 		$count=mysql_num_rows($query_count);
		
// 			if($count!=1){
// 				$select_prev=mysql_query("SELECT MAX(sem_id) as sem_id FROM semester_t");
// 				$row_prev=mysql_fetch_assoc($select_prev);
// 				$prev_id=$row_prev['sem_id'];
// 				//echo $sem_no;
				
// 				$update=mysql_query("UPDATE semester_t SET sem_status='0' WHERE sem_id='$prev_id'") or die (mysql_error());
// 				$query_insert_sem=mysql_query("INSERT INTO semester_t VALUES('', '$sem_no', '$id', '1')") or die(mysql_error());
// 			} else {
				
// 				$update=mysql_query("UPDATE semester_t SET sem_status='0'");
// 				$query_insert_sem=mysql_query("INSERT INTO semester_t VALUES('', '$sem_no', '$id', '1')");
				
// 			}
			
		
// 		}
	
	
}
	header('Location: ../open_sem.php');

?>