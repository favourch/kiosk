<?php
    include "../db/db.php";
    include "../actions/scheduling_functions.php";

    date_default_timezone_set("Asia/Manila"); 

    $room_code = $_GET['room_code'];
    $time = strtotime(date("H:m:s"));
    //echo date("H:m:s");
    //$time = strtotime("9:00:00");
    $day = date("l");
    $day_id = 0;

    switch($day){
        case "monday":
        case "Monday":
            $day_id = 1;
            break;
        case "tuesday":
        case "Tuesday":
            $day_id = 2;
            break;
        case "wednesday":
        case "Wednesday":
            $day_id = 3;
            break;
        case "thursday":
        case "Thursday":
            $day_id = 4;
            break;
        case "friday":
        case "Friday":
            $day_id = 5;
            break;
        case "saturday":
        case "Saturday":
            $day_id = 6;
            break;
        case "sunday":
        case "Sunday":
            $day_id = 7;
            break;
    }

    $query_room_schedule = mysql_query("SELECT * FROM class_schedule_t  WHERE room_code='$room_code' AND day='$day_id'") or die(mysql_error());
    while($row_room_schedule = mysql_fetch_assoc($query_room_schedule)){
    	$time_start =  $row_room_schedule['time_start'];
    	$time_end   =  $row_room_schedule['time_end'];

        $time_start = strtotime($time_start);
        $time_end = strtotime($time_end);

    	//echo $time_start." - ".$time_end."\n";
        //echo conflict_check($time_start, $time_end, $time, $time)."<br>";
    	//echo $time[0]."\n";
    	if(conflict_check($time_start, $time_end, $time, $time)=="conflict"){
    		
    		echo $row_room_schedule['schedule_id'];

    		return;
    	}



    }
    //echo $time_start;
/*  
localtime(true); returns associative array with these indexes
"tm_sec" - seconds, 0 to 59
"tm_min" - minutes, 0 to 59
"tm_hour" - hours, 0 to 23
"tm_mday" - day of the month, 1 to 31
"tm_mon" - month of the year, 0 (Jan) to 11 (Dec)
"tm_year" - years since 1900
"tm_wday" - day of the week, 0 (Sun) to 6 (Sat)
"tm_yday" - day of the year, 0 to 365
"tm_isdst" - is daylight savings time in effect? Positive if yes, 0 if not, negative if unknown.
*/


?>