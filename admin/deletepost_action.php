<?php 
	require_once('../../db/db.php');
	
	
	 if (isset($_GET['event_id'])) {
		 
		 
			 $event_id=$_GET['event_id'];
			 //echo $post_ID;
			 
			 $query_delete=mysql_query("DELETE FROM post_events_t WHERE event_id='$event_id'") or die(mysql_error());
	 }
	 else if($_GET['msg_id']){
		 			 
			 $msg_id=$_GET['msg_id'];
			 //echo $post_ID;
			 
			 $query_delete=mysql_query("DELETE FROM post_messages_t WHERE message_id='$msg_id'") or die(mysql_error());

		 
		}
		else if ($_GET['hol_id']){
			 $hol_id=$_GET['hol_id'];
			 //echo $post_ID;
			 
			 $query_delete=mysql_query("DELETE FROM post_holidays_t WHERE holiday_id='$hol_id'") or die(mysql_error());
			}

	// header ('Location: ../manage_post.php');
?>