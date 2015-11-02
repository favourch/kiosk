<?php 
	include "../../db/db.php";
		
	$type_id=$_GET['type_id'];
		
	if($type_id=='e') {
		$event_title=$_GET['event_title'];
		$event_venue=$_GET['event_venue'];
		$start_time=$_GET['start_time'];
		$end_time=$_GET['end_time'];
		$start_date=$_GET['date_start'];
		$end_date=$_GET['date_end'];
		$fee_option=$_GET['fee_option'];

		if ($event_title==""){
			echo "event title is required";
		} else if ($event_venue==""){
			echo "event venue is required";
						
		} else if($start_time==""){
			echo "event time is required";
			
		} else if ($start_date==""){
			echo "date is required";
	
		} else if ($fee_option==""){
			echo "fee option is required";
	
		} else if(($end_time!="") && ($end_date!="")){
			if((strtotime($start_time))>=(strtotime($end_time))){
				echo "end time is less than start time";
			} else if ((date($start_date))>=(date($end_date))){
				echo "end date is less than start date";
			} else {
				echo "successfully posted";
			}
		} else {
			echo "successfully posted";
		}
		
		
	} else if ($type_id=='m') {
		$msg_content=$_GET['msg_content'];
		
		if ($msg_content==""){
			echo "message content is required";
		} else {
			echo "successfully posted";
		}
		
	}	else if($type_id=='h') {
		
		
			$holiday_date=$_GET['holiday_date'];
			$occasion=$_GET['occasion'];
				
			if ($holiday_date==""){
				echo "date of holiday is required";
			} else if ($occasion=="") {
				echo "occasion is required";
			}else {
				echo "successfully posted";
			}
			
	
	}


?>