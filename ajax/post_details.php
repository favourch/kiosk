<?php
  	include "../db/db.php";
    $post_id = $_GET['post_id'];
	
  	$query_posts=mysql_query("SELECT * FROM posts_t WHERE post_id='$post_id'");
	$row_posts=mysql_fetch_assoc($query_posts);

	$post_id=$row_posts['post_id'];
	$post_title=$row_posts['post_title'];
	$type_of_post=$row_posts['type_of_post'];


	if($type_of_post=="event"){
		 $select_image=mysql_query("SELECT * FROM attachment_t WHERE post_id='$post_id'");
		 while($row_image=mysql_fetch_assoc($select_image)){
		 		$img_id=$row_image['attachment_id'];
		 		$images[]=$img_id;
		 }
		
		 $select_post_events=mysql_query("SELECT * FROM post_events_t WHERE event_id='$post_id'");
		 $row_post_events=mysql_fetch_assoc($select_post_events);
				$event_venue=$row_post_events['venue'];
				$start_time=$row_post_events['start_time'];
				$end_time=$row_post_events['end_time'];
				$date_start=$row_post_events['date_start'];
				$date_end=$row_post_events['date_end'];
				$theme=$row_post_events['theme'];
				$fee=$row_post_events['reg_fee'];
			
				
				$start_date=date("F j, Y", strtotime($date_start));
				if($date_end!=""){
					$end_date=date("F j, Y", strtotime($date_end));
					$date=$start_date.' - '.$end_date;
				} else {
					//$end_date=date("F j, Y", strtotime($date_end));
					$date=$start_date;

				}		
				
				$time_start=date("g:i A", strtotime($start_time));

				if($end_time!=""){
					$time_end=date("g:i A", strtotime($end_time));
					$time=$time_start.' - '.$time_end;
				} else {
					//$end_date=date("F j, Y", strtotime($date_end));
					$time=$time_start;

				}

				if($fee==0){
					//echo "dito";
					$fee='FREE';
				}

		
		 $return_array = array( 
		 	"type"			=>"$type_of_post",
			"event_id"		=>"$post_id",
			"event_title"   =>"$post_title",
			"event_venue"   =>"$event_venue",
			"event_time"	=>"$time",
			"event_date"	=>"$date",
			"event_theme"	=>"$theme",
			"fee"			=>"$fee",
		);
	
		echo json_encode($return_array);
		
	} // if events
	else if ($type_of_post=="message"){
		$select_post=mysql_query("SELECT * FROM post_messages_t WHERE message_id='$post_id'");
		$row_post=mysql_fetch_assoc($select_post);
				  
				   $message_content=$row_post['message_content'];
				 
			 
		
		 $return_array = array( 
		 	"type"			=>"$type_of_post",
			"msg_id"		=>"$post_id",
			"msg_title"   	=>"$post_title",
			"msg_content"   =>"$message_content",
			
			);
	
			echo json_encode($return_array);
		
	} // if msg
	else if ($type_of_post=="announcement") {
			
			
			
	} // if ann
	else if ($type_of_post=="holiday") {
			$select_post=mysql_query("SELECT * FROM post_holidays_t WHERE holiday_id='$post_id'");
			$row_post=mysql_fetch_assoc($select_post);
					
					$holidate=date("F j, Y", strtotime($row_post['date_of_holiday']));
				
				
					
		$return_array = array( 
		 	"type"			=>"$type_of_post",
			"hol_id"		=>"$post_id",
			"holidate"   	=>"$holidate",
			"occasion"   	=>"$post_title",
			
			);
	
			echo json_encode($return_array);
			
		}
   
?>