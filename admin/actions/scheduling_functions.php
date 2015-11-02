<?php
#


# sched_function.php
# load_schedule.php
#
#
 

#############
## sched_function.php
#############

###function to check database if certain timespan is loaded or not
# function is_loaded( section_id, start_time, end_time, day);

###function to check if section is loaded in particular timespan
# function is_section_loaded( section_id, start_time, end_time, days[]);

###function to check if teacher is loaded at particular timespan
# function is_faculty_loaded( class_id, start_time, end_time, days[]);

###FUNCTION to check if there is a conflict between 2 given timeblock
# function conflict_check( start_time1, end_time1, start_time2, end_time2);

###function to get class_id of a schedule   set = 0 to get from temporary database. 1 for actual
# function get_class_id( scheudule_id, settings);

###function to check if slot is the first instance of a schedule
# function is_first( shcedule_id, time_start);

###function to get the no. of time slots taken by a schedule (time slot = 15 min.)
# function get_slots( schedule_id);

###funciton that converts units to time and then prints the result
# function print_time( units);
# 

#
###function to retrieve loaded schedules for section
# function block_loaded( block_id, start_time, end_time, semester_ID);

###function to retrieve loaded schedules for section
# function teacher_loaded( personel_id, start_time, end_time, semester_ID;

###function to retrieve loaded schedules for student
# function student_loaded( $student_id, $start, $end, $day, $sem_id){//

###function to check if section is loaded in particular time ... with wxception
# function is_section_loaded_e( section_id, start_time, end_time, days[], schedule_id);

###function to check if teacher is loaded at particular time
# function is_faculty_loaded_e( class_id, start_time, end_time, days[], schedule_id);
#
 
	

##################
## load_schedule.php
##################

###function to preload schedule of section
# funciton load_sched( section_id, semester+id);

###function to preload schedule of faculty
# function load_schedule_faculty( faculty_id, semester_id);

###function to check if schedule is existing in original class_schedule_t table
# is_existing_v( schedule_id);
	##########################################################################################
	##   VERY IMPORTANT for CONFLICT CHECKER
	##########################################################################################
	function is_loaded($section_id, $start, $end, $day){
		$sy_id = get_active_sy();
		$query = mysql_query("SELECT * FROM class_schedule_t WHERE day='{$day}' AND class_id IN (SELECT class_id FROM class_t WHERE section_id={$section_id} AND sy_id={$sy_id})  ") or die(mysql_error());;
		while($row = mysql_fetch_assoc($query)){
			$db_start = $row['time_start'];
			$db_end = $row['time_end'];
			
			$t_start = strtotime($start);
			$t_end = strtotime($end);
			$t_db_start = strtotime($db_start);
			$t_db_end = strtotime($db_end);
			
			if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
			    $class_id = $row['class_id'];
			    $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_code=class_t.subject_code");
			    $row_subject = mysql_fetch_assoc($query_subject);
				return $row['schedule_id'];
			}
						

		}
		return "";
	}
	
	
	
	###function to check if section is loaded in particular time
	function is_section_loaded($section_id, $start, $end, $days){
		$t_start = strtotime($start);
		$t_end = strtotime($end);
		$sy_id=get_active_sy();
		foreach($days as $day){
		    $query = mysql_query("SELECT * FROM class_schedule_t WHERE day='{$day}' AND class_id IN (SELECT class_id FROM class_t WHERE section_id='{$section_id}' AND sy_id={$sy_id}) ") or die(mysql_error());

			while($row = mysql_fetch_assoc($query)){
				$db_start = $row['time_start'];
				$db_end = $row['time_end'];
				
				
				$t_db_start = strtotime($db_start);
				$t_db_end = strtotime($db_end);
				
				if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
					$class_id = $row['class_id'];
					$query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_code=class_t.subject_code");
					$row_subject = mysql_fetch_assoc($query_subject);
					return "Section has conflicting schedule.";//$row_subject['subject_title'];
				}
				
			}
			include "time_intervals.php";
				
			if("conflict" == conflict_check($t_start, $t_end, $recess['start_time'], $recess['end_time']) ){
				return "Schedule is conflicting with recess time.";
			}
			if("conflict" == conflict_check($t_start, $t_end, $flag_ceremony['start_time'], $flag_ceremony['end_time']) ){
				return "Schedule is conflicting with Flag ceremony.";
			}
			if("conflict" == conflict_check($t_start, $t_end, $lunch['start_time'], $lunch['end_time']) ){
				return "Schedule is conflicting with Lunch time.";
			}
		}
		return "";
	}
	
	###function to check if teacher is loaded at particular time
	function is_faculty_loaded($class_id, $start, $end, $days){
		$query = mysql_query("SELECT * FROM class_t WHERE class_id={$class_id}");
		$row = mysql_fetch_assoc($query);
		$emp_id = $row['teacher_id'];
		if($emp_id==NULL){
			return "";
		}
		$sy_id=get_active_sy();
		foreach($days as $day){
			$query = mysql_query("SELECT * FROM class_schedule_t WHERE day='{$day}' AND class_id IN (SELECT class_id FROM class_t WHERE teacher_id={$emp_id} AND sy_id={$sy_id}) ") or die(mysql_error());
			while($row = mysql_fetch_assoc($query)){
				$db_start = $row['time_start'];
				$db_end = $row['time_end'];
				
				$t_start = strtotime($start);
				$t_end = strtotime($end);
				$t_db_start = strtotime($db_start);
				$t_db_end = strtotime($db_end);
				
				if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
					$class_id = $row['class_id'];
					$query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_code=class_t.subject_code");
					$row_subject = mysql_fetch_assoc($query_subject);
					$subject = $row_subject['subject_title'];
					$st = date('h:i A', $t_db_start);
					$en = date('h:i A', $t_db_end);
					return "Teacher has conflicting schedule $subject @ $st - $en."; //$row_subject['subject_title'];
				}
			}
			
		}
		return "";
	}
	
	
	###FUNCTION to check if there is a conflict between 2 given timeblock
	function conflict_check($t_start1, $t_end1, $t_start2, $t_end2){
		if($t_start1>=$t_start2 && $t_start1<$t_end2){
		  return "conflict";	
		}
		
		if($t_end1>$t_start2 && $t_end1<=$t_end2){
		  return "conflict";	
		}
		
		if($t_start2>=$t_start1 && $t_start2<$t_end1){
		  return "conflict";	
		}
		
		if($t_end2>$t_start1 && $t_end2<=$t_end1){
		  return "conflict";	
		}
		
		return "good";
		
	}

    ###function to get class_id of a schedule   set = 0 to get from temporary database. 1 for actual
	function get_class_id($schedule_id, $set){
		if($set==0){
		    $query = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id='$schedule_id'") or die(mysql_error());
		}
		else{
			$query = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id='$schedule_id'") or die(mysql_error());
		}
		$row = mysql_fetch_assoc($query);
		return $row['class_id'];
		
	}
    
	###function to check if slot is the first instance of a schedule
    function is_first($schedule_id, $time_start){
		$query = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id='$schedule_id'") or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$db_time_start = $row['time_start'];
		
		$t_start = strtotime($time_start);
		$t_db_start = strtotime($db_time_start);
		return ($t_db_start==$t_start)? true:false;
	}
	
	###function to get the no. of time slots taken by a schedule (time slot = 15 min.)
    function get_slots($schedule_id){
		$query = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id='{$schedule_id}'")or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$start = $row['time_start'];
		$end = $row['time_end'];
		
		$t_start = strtotime($start);
		$t_end = strtotime($end);
		
		$duration = $t_end - $t_start;
		return $duration/1800;  //1800 or 900   60s x 30
		
	}
	
	###funciton that converts units to time and then prints the result
	function print_time($units){
		$time = unit_to_time($units);
		$time = round($time*4)/4;
		$whole1 = (int) $time;
		$frac1 = (($time*100)%100)*.6;
		//printf("Total Tims: %02d:%02d", $whole1, $frac1);
        return sprintf("%02d:%02d", $whole1, $frac1);
	}

############################################################################################
##################### USED IN REPORTS ######################################################
############################################################################################

    ###function to retrieve loaded schedules for section
	function block_loaded( $block_id, $start, $end, $day, $sem_id){//
	    //$sy_id=get_active_sy();
		$query = mysql_query("SELECT * FROM class_schedule_t WHERE day='{$day}' AND class_id IN (SELECT class_id FROM class_t WHERE block_id='{$block_id}' AND sem_id={$sem_id}) ") or die(mysql_error());;
		while($row = mysql_fetch_assoc($query)){
			$db_start = $row['time_start'];
			$db_end = $row['time_end'];
			
			$t_start = strtotime($start);
			$t_end = strtotime($end);
			$t_db_start = strtotime($db_start);
			$t_db_end = strtotime($db_end);
			
			if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
			    $class_id = $row['class_id'];
			    $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_id=class_t.subject_id");
			    $row_subject = mysql_fetch_assoc($query_subject);
				return $row['schedule_id'];
			}
			
		}

		return "";
	}

    ###function to retrieve loaded schedules for section
	function faculty_loaded( $faculty_id, $start, $end, $day, $sem_id){//
	    //$sy_id=get_active_sy();
		$str = "";
		$query = mysql_query("SELECT * FROM class_schedule_t WHERE day='{$day}' AND class_id IN (SELECT class_id FROM class_t WHERE faculty_id='{$faculty_id}' AND sem_id='{$sem_id}') ") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$db_start = $row['time_start'];
			$db_end = $row['time_end'];
			$t_start = strtotime($start);
			$t_end = strtotime($end);
			$t_db_start = strtotime($db_start);
			$t_db_end = strtotime($db_end);
			$class_id = $row['class_id'];

			$str .= $start." ".$end." ".$db_start." ".$db_end." ".conflict_check($t_start, $t_end, $t_db_start, $t_db_end)."<br>";
			if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
			    
			    $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_id=class_t.subject_id") or die(trigger_error(mysql_error()));
			    $row_subject = mysql_fetch_assoc($query_subject);
				return $row['schedule_id'];
			}
			
		}

		return $str;
	}

	###function to retrieve loaded schedules for student registered
	function student_loaded( $reg_no, $start, $end, $day, $sem_id){//
	    //$sy_id=get_active_sy();
		$query = mysql_query("SELECT * 
							  FROM class_schedule_t 
							  WHERE day='{$day}' AND class_id 
							  IN ( SELECT class_id 
							  	   FROM student_load_t 
							  	   WHERE reg_no = $reg_no
							  ) 
							") or die(mysql_error());;




		while($row = mysql_fetch_assoc($query)){
			$db_start = $row['time_start'];
			$db_end = $row['time_end'];
			
			$t_start = strtotime($start);
			$t_end = strtotime($end);
			$t_db_start = strtotime($db_start);
			$t_db_end = strtotime($db_end);
			
			if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
			    $class_id = $row['class_id'];
			    $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_id=class_t.subject_id") or die(trigger_error(mysql_error()));
			    $row_subject = mysql_fetch_assoc($query_subject);
				return $row['schedule_id'];
			}
			
		}

		return "";
	}

########################################################################################################################
################################### THIS BLOCK OF CODE IS USED BY EDITING PROCESSES ####################################
########################################################################################################################

    ###function to check if section is loaded in particular time ... with wxception
	function is_section_loaded_e($section_id, $start, $end, $days, $schedule_id){
		$t_start = strtotime($start);
		$t_end = strtotime($end);
		$sy_id=get_active_sy();
		foreach($days as $day){
			$query = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id <> {$schedule_id} AND day='{$day}' AND  class_id IN (SELECT class_id FROM class_t WHERE section_id={$section_id} AND sy_id={$sy_id}) ") or die(mysql_error());;
			while($row = mysql_fetch_assoc($query)){
				$db_start = $row['time_start'];
				$db_end = $row['time_end'];
				
				
				$t_db_start = strtotime($db_start);
				$t_db_end = strtotime($db_end);
				
				if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
					$class_id = $row['class_id'];
					$query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_id=class_t.subject_id") or die(trigger_error(mysql_error()));
					$row_subject = mysql_fetch_assoc($query_subject);
					return "Section has conflicting schedule.";//$row_subject['subject_title'];
				}
				
			}
			include "time_intervals.php";
				
			if("conflict" == conflict_check($t_start, $t_end, $recess['start_time'], $recess['end_time']) ){
				return "Schedule is conflicting with recess time.";
			}
			if("conflict" == conflict_check($t_start, $t_end, $flag_ceremony['start_time'], $flag_ceremony['end_time']) ){
				return "Schedule is conflicting with Flag ceremony.";
			}
			if("conflict" == conflict_check($t_start, $t_end, $lunch['start_time'], $lunch['end_time']) ){
				return "Schedule is conflicting with Lunch time.";
			}
			
		}
		return "";
	}
	
	###function to check if teacher is loaded at particular time
	function is_faculty_loaded_e($class_id, $start, $end, $days, $schedule_id){
		$query = mysql_query("SELECT * FROM class_t WHERE class_id={$class_id}");
		$row = mysql_fetch_assoc($query);
		$emp_id = $row['teacher_id'];
		if($emp_id==NULL){
			return "";
		}
		$sy_id=get_active_sy();
		foreach($days as $day){
			$query = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id <> {$schedule_id} AND day='{$day}' AND class_id IN (SELECT class_id FROM class_t WHERE teacher_id='{$emp_id}' AND sy_id={$sy_id}) ") or die(mysql_error()."  yeh");;
			while($row = mysql_fetch_assoc($query)){
				$db_start = $row['time_start'];
				$db_end = $row['time_end'];
				
				$t_start = strtotime($start);
				$t_end = strtotime($end);
				$t_db_start = strtotime($db_start);
				$t_db_end = strtotime($db_end);
				
				if("conflict" == conflict_check($t_start, $t_end, $t_db_start, $t_db_end)){
					$class_id = $row['class_id'];
					$query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t WHERE class_t.class_id={$class_id} AND subject_t.subject_code=class_t.subject_code");
					$row_subject = mysql_fetch_assoc($query_subject);
					$subject = $row_subject['subject_title'];
					$st = date('h:i A', $t_db_start);
					$en = date('h:i A', $t_db_end);
					return "Teacher has conflicting schedule $subject @ $st - $en."; //$row_subject['subject_title'];
				}
			}
			
		}
		return "";
	}



#######################################################################################################################
################################# PreLoading Schedules from database ##################################################
#######################################################################################################################


 
function load_sched($section_id, $sy_id){
	//$sy_id=get_active_sy();
	
	$query = mysql_query("SELECT * FROM class_schedule_t WHERE class_id IN (SELECT class_id FROM class_t WHERE section_id={$section_id} AND sy_id={$sy_id})") or die("fail");
	
	while($row = mysql_fetch_assoc($query)){
		$schedule_id = $row['schedule_id'];
		$class_id = $row['class_id'];
		$day = $row['day'];
		$time_start = $row['time_start'];
		$time_end = $row['time_end'];
		$room = $row['room'];
		
		if(is_existing_v($schedule_id)){
			mysql_query("UPDATE class_schedule_temp_t SET class_id='{$class_id}',
														  day='{$day}',
														  time_start='{$time_start}',
														  time_end='{$time_end}',
														  room='{$room}'
													  WHERE schedule_id={$schedule_id}") or die("update ".mysql_error());
		}
		else{
			mysql_query("INSERT INTO class_schedule_temp_t VALUES('$schedule_id',
																  '$class_id',
																  '$day',
																  '$time_start',
																  '$time_end',
																  '$room')") or die("insert ".mysql_error());
		}
	}
    return;
}

function load_sched_emp($emp_id, $sy_id){
	//$sy_id=get_active_sy();
	$query = mysql_query("SELECT * FROM class_schedule_t WHERE class_id IN (SELECT class_id FROM class_t WHERE teacher_id={$emp_id} AND sy_id={$sy_id})") or die("fail");
	
	while($row = mysql_fetch_assoc($query)){
		$schedule_id = $row['schedule_id'];
		$class_id = $row['class_id'];
		$day = $row['day'];
		$time_start = $row['time_start'];
		$time_end = $row['time_end'];
		$room = $row['room'];
		
		if(is_existing_v($schedule_id)){
			mysql_query("UPDATE class_schedule_temp_t SET class_id='{$class_id}',
														  day='{$day}',
														  time_start='{$time_start}',
														  time_end='{$time_end}',
														  room='{$room}'
													  WHERE schedule_id={$schedule_id}") or die("update ".mysql_error());
		}
		else{
			mysql_query("INSERT INTO class_schedule_temp_t VALUES('$schedule_id',
																  '$class_id',
																  '$day',
																  '$time_start',
																  '$time_end',
																  '$room')") or die("insert ".mysql_error());
		}
	}
    return;
}

function is_existing_v($schedule_id){
	$query = mysql_query("SELECT * FROM class_schedule_temp_t WHERE schedule_id={$schedule_id}") or die(mysql_error());
	return (mysql_num_rows($query)>0)? true:false; 
}

?>