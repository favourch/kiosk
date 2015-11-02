<?php 
include "../db/db.php";

$post_id=$_GET['post_id'];
//echo $post_id;
$query_post=mysql_query("SELECT * FROM posts_t WHERE post_id='$post_id'") or die(mysql_error());
$row_post=mysql_fetch_assoc($query_post);

$post_title=ucfirst($row_post['post_title']);
$type_of_post=$row_post['type_of_post'];

if($type_of_post=='event'){
	$query_event=mysql_query("SELECT * FROM post_events_t WHERE event_id='$post_id'");
	$row_events=mysql_fetch_assoc($query_event);

	$event_venue=ucfirst($row_events['venue']);
	$date_start=$row_events['date_start'];
	$date_end=$row_events['date_end'];
	$start_time=$row_events['start_time'];
	$end_time=$row_events['end_time'];
	$theme=ucfirst($row_events['theme']);
	$fee=$row_events['reg_fee'];
	//echo $fee;
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


	 $event_array = array( 
		 	"type"			=>"$type_of_post",
			"event_id"		=>"$post_id",
			"event_title"   =>"$post_title",
			"event_venue"   =>"$event_venue",
			"time"			=>"$time",
			"date"			=>"$date",
			"event_theme"	=>"$theme",
			"fee"			=>"$fee",
		);
	
		echo json_encode($event_array);

} else if($type_of_post=='holiday'){
	//echo "amo ini";
	$query_holiday=mysql_query("SELECT * FROM post_holidays_t WHERE holiday_id='$post_id'");
	$row_holiday=mysql_fetch_assoc($query_holiday);

	$holidate=$row_holiday['date_of_holiday'];
	
	$date_of_holiday=date("F j, Y", strtotime($holidate));
	
	 $holiday_array = array( 
		 	"type"			=>"$type_of_post",
			"holiday_id"	=>"$post_id",
			"occasion"   	=>"$post_title",
			"holidate"   	=>"$date_of_holiday",
			
		);
	
		echo json_encode($holiday_array);



}


?>