<?php
include '../../db/db.php';

session_start();
if(isset($_SESSION['kiosk']['user_id'])){
  $user_id=$_SESSION['kiosk']['user_id'];

}
else{

    header("location: login.php");
}
//echo $user_id;

	
	date_default_timezone_set("Asia/Manila");
	$type_id=$_POST['type_id'];
	$post_time = date('H:i:s');
	$post_date = date('Y-m-d');

	echo $type_id;
	
	if($type_id=='event'){
		
		$event_title=$_POST['event_title'];
		$event_venue=$_POST['event_venue'];
		$start_time=$_POST['start_time'];
		$e_time=$_POST['end_time'];
		$start_date=$_POST['start_date'];
		$end_date=$_POST['end_date'];
		$event_theme=mysql_real_escape_string($_POST['event_theme']);
		$event_fee=$_POST['event_fee'];
		$fee_option=$_POST['fee_option'];
		$identity=$_POST['as'];
		if($e_time==""){
			$end_time=NULL;
		} else {
			$end_time=$e_time;
		}

		if($event_fee==""){
			$fee=$fee_option;
		} else {
			$fee=$event_fee;
		}
			$query_add=mysql_query("INSERT INTO posts_t VALUES('', '$user_id', '$event_title', '$post_time', '$post_date', '$identity', 'event', 'active')");
			$query=mysql_query("SELECT MAX(post_id) as post_id FROM posts_t");
			$row_query=mysql_fetch_assoc($query);
			$last_id=$row_query['post_id'];
		if($end_date==""){
				
				//echo $last_id;
				$query_addpost=mysql_query("INSERT INTO post_events_t VALUES ('$last_id', '$event_venue', '$start_time', '$end_time', '$start_date', null, '$event_theme', '$fee')") or die(mysql_error());
			
		} else {
				$query_addpost=mysql_query("INSERT INTO post_events_t VALUES ('$last_id', '$event_venue', '$start_time', '$end_time', '$start_date', '$end_date', '$event_theme', '$fee')") or die(mysql_error());
				
		}
				$select_post=mysql_query("SELECT * FROM post_events_t");
				$count=mysql_num_rows($select_post);
				$last= $count-1;
				echo $last.''.$count;
				$select_last=mysql_query("SELECT * FROM post_events_t LIMIT $last, $count");
				$row_select_last=mysql_fetch_assoc($select_last);
				$post_id = $row_select_last['event_id'];
				include "addimage_action.php";
		
	} else if($type_id=='message'){
		$post_title=$_POST['post_title'];
		$post_desc=mysql_real_escape_string($_POST['post']);
		$identity=$_POST['as'];
	
		$query_add=mysql_query("INSERT INTO posts_t VALUES('', '$user_id', '$post_title', '$post_time', '$post_date', '$identity', 'message', 'active')");
		$query=mysql_query("SELECT MAX(post_id) as post_id FROM posts_t");
		$row_query=mysql_fetch_assoc($query);
		$last_id=$row_query['post_id'];
		echo $last_id;

		$query_addpost=mysql_query("INSERT INTO post_messages_t VALUES ('$last_id', '$post_desc')") or die(mysql_error());
		$select_post=mysql_query("SELECT * FROM post_messages_t");
		$count=mysql_num_rows($select_post);
		$last= $count-1;
		echo $last.''.$count;
		$select_last=mysql_query("SELECT * FROM post_messages_t LIMIT $last, $count");
		$row_select_last=mysql_fetch_assoc($select_last);
		$post_id = $row_select_last['message_id'];
		include "addimage_action.php";	
			
			
	} else if ($type_id=='announcement') {
		//echo "here";
		$post_title=$_POST['post_title'];
		$post_desc=mysql_real_escape_string($_POST['post']);
		$identity=$_POST['as'];	

		$query_add=mysql_query("INSERT INTO posts_t VALUES('', '$user_id', '$post_title', '$post_time', '$post_date', '$identity', 'announcement', 'active')");
		$query=mysql_query("SELECT MAX(post_id) as post_id FROM posts_t");
		$row_query=mysql_fetch_assoc($query);
		$last_id=$row_query['post_id'];
		echo $last_id;

		$query_addpost=mysql_query("INSERT INTO post_announcements_t VALUES ('$last_id', '$post_desc')") or die(mysql_error());
		$select_post=mysql_query("SELECT * FROM post_announcements_t");
		$count=mysql_num_rows($select_post);
		$last= $count-1;
		echo $last.''.$count;
		$select_last=mysql_query("SELECT * FROM post_announcements_t LIMIT $last, $count");
		$row_select_last=mysql_fetch_assoc($select_last);
		$post_id = $row_select_last['announcement_id'];
		include "addfile_action.php";	
		  
	
			
	} else if ($type_id=='holiday'){
		$hol_date=$_POST['hol_date'];
		$occasion=$_POST['holiday'];
		$identity=$_POST['as'];

		$query_add=mysql_query("INSERT INTO posts_t VALUES('', '$user_id', '$occasion', '$post_time', '$post_date', '$identity', 'holiday', 'active')");
		$query=mysql_query("SELECT MAX(post_id) as post_id FROM posts_t");
		$row_query=mysql_fetch_assoc($query);
		$last_id=$row_query['post_id'];
		echo $last_id;
			
		$query_addpost=mysql_query("INSERT INTO post_holidays_t VALUES ('$last_id', '$hol_date')") or die(mysql_error());
		$select_post=mysql_query("SELECT * FROM  post_holidays_t");
		$count=mysql_num_rows($select_post);
		$last= $count-1;
		echo $last.''.$count;
		$select_last=mysql_query("SELECT * FROM  post_holidays_t LIMIT $last, $count");
		$row_select_last=mysql_fetch_assoc($select_last);
		$post_id = $row_select_last['holiday_id'];
		include "addimage_action.php";	
		
			
			
	}
	
	

	header("location: {$_SERVER['HTTP_REFERER']}");
 	//header ('Location: ../admin/addpost_options.php');
?>