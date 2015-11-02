<?php
include '../../db/db.php';
session_start();
include 'misc_functions.php';
$type=getABC();

if (isset($_POST['submit'])) {
	$type=$_POST['type_id'];
	$post_id=$_POST['post_id'];
	$post_time =gmdate(" H:i:s",time()+28800);
	$post_date = date('Y-m-d');

	
	
	if($type=='event'){
		$event_title=$_POST['event_title'];
		$event_venue=$_POST['event_venue'];
		$event_time=$_POST['event_time'];
		$start_date=$_POST['start_date'];
		$end_date=$_POST['end_date'];
		$event_theme=$_POST['event_theme'];
		$event_regfee=$_POST['event_regfee'];
		
		$query_update_post=mysql_query("UPDATE posts_t SET post_title='$event_title' WHERE post_id='$post_id'");
		$query_addpost=mysql_query("UPDATE post_events_t SET venue='$event_venue', start_time='$event_time',
									date_start='$start_date', date_end='$end_date', theme='$event_theme', reg_fee='$event_regfee' WHERE event_id='$post_id'") or die(mysql_error());
		
		include "addimage_action.php";
		
	} else if($type=='message'){
		$msg_title=$_POST['post_title'];
		$post_desc=$_POST['post'];
	
		$query_update_post=mysql_query("UPDATE posts_t SET post_title='$msg_title' WHERE post_id='$post_id'");

		$query_addpost=mysql_query("UPDATE post_messages_t SET message_content='$post_desc' WHERE message_id='$post_id'") or die(mysql_error());
		include "addimage_action.php";	
			
			
	} else if ($type=='announcement') {
		$ann_title=$_POST['post_title'];
		$ann_desc=$_POST['ann_desc'];
	
		$query_update_post=mysql_query("UPDATE posts_t SET post_title='$ann_title' WHERE post_id='$post_id'");

		$query_addpost=mysql_query("UPDATE post_announcements_t SET announcement_desc='$ann_desc' WHERE announcement_id='$post_id'") or die(mysql_error());
		include "addfile_action.php";	
			
	} else if ($type=='holiday'){
		$hol_date=$_POST['holidate'];
		$occasion=$_POST['occasion'];
		
		$query_update_post=mysql_query("UPDATE posts_t SET post_title='$occasion' WHERE post_id='$post_id'");
		$query_addpost=mysql_query("UPDATE post_holidays_t SET date_of_holiday='$hol_date' WHERE holiday_id='$post_id'") or die(mysql_error());
		
		include "addimage_action.php";	
		
			
			
	}
	
	
}


 	/*(if($type=='personnel') {
		echo $type;
	 	header ('Location: ../faculty_managepost.php');
	 } else if($type=='admin'){
		header ('Location: ../admin_managepost.php');
		 
	 } */
	
	header("location: {$_SERVER['HTTP_REFERER']}");
?>