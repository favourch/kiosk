<?php
# These are series of function used to manage content in the kiosk
# all database queries in the following functions uses mysqli_query().
# thus, these functions requires a db connection passed through the arguments

# insert_block
# insert_subject
# insert_
#
#
# 


//===============================================================================================

function insert_schedule_entries($db_con, $class_id, $day, $time, $room){
	//$schedule_details = array( "class_id"=>$class_id, "day"=>$day, "time"=>$time, "room"=>$room);
	$count=0;
	$room = str_replace("-", " ", $room);
	$days = explode("/", $day);
	$times = explode("/", $time);
	$rooms = explode("/", $room);
	$building = explode(" ", $rooms[0])[0];
	//echo $day." ".$time." ".$room." ";
	$count = count($days);
	if($count < count($times)){
		$count = count($times);
	}
	elseif($count < count($rooms)){
		$count = count($rooms);
	}

	for($i=0;$i<$count;$i++){
		$day_i  = ($i<count($days))? $i:count($days)-1;
		$time_i = ($i<count($times))? $i:count($times)-1;
		$room_i = ($i<count($rooms))? $i:count($rooms)-1;


		$day_str = $days[$day_i];
		$time    = $times[$time_i];
		$room    = $rooms[$room_i];

		if(is_numeric($room)){
			$room = $building." ".$room;
		}
		//echo $room." --------";
		$building_code = strtolower($building);
		$building_code = insert_building($db_con, $building_code, '');
		if($building_code==NULL){
			//notify : alert user that entry has building code not existing in the database
			continue;
		}

		$room_code = insert_room($db_con, $room, $building_code, NULL);
		//echo $room_code."- ";

		//echo $day_str." ".$time." ".$room."   =   ";
		$time_set = get_time_set($time); // returns array containing start time and end time of given time range

		$time_start = date("H:i:s",strtotime($time_set['time-start']));
		$time_end = date("H:i:s",strtotime($time_set['time-end']));
		
		$pos_m = stripos($day_str, "M");
		$pos_t =stripos($day_str, "T");
		$pos_w =stripos($day_str, "W");
		$pos_th =stripos($day_str, "Th");
		$pos_f =stripos($day_str, "F");
		$pos_sat =stripos($day_str, "Sat");

		//echo " [ ".$pos_m ." ] ";
		//echo " [ ".$pos_t ." ] ";
		//echo " [ ".$pos_w ." ] ";
		//echo " [ ".$pos_th." ] ";
		//echo " [ ".$pos_f ." ] ";

		if(is_numeric($pos_sat)){
			$day = "saturday";
			$day = 6;
		    insert_schedule($db_con,$class_id, $day, $time_start, $time_end, $room_code);
		}
		else{
			if(is_numeric($pos_m) ){
				$day = "monday";
				$day = 1;
			    insert_schedule($db_con,$class_id, $day, $time_start, $time_end, $room_code);
			    //echo "<br>monday<br>";
			}
			if (is_numeric($pos_t)) {
				$check = true;
				if($pos_t<strlen($day_str)-1){
					//echo "<br><br>".strcasecmp(substr($day_str, $pos_t+1, 1),"h");
					if(strcasecmp(substr($day_str, $pos_t+1, 1),"h")==0){
						$check=false;
					}
				}
				if($check){
					$day = "tuesday";
					$day = 2;

				    insert_schedule($db_con, $class_id, $day, $time_start, $time_end, $room_code);
				    //echo "<br>tuesday<br>";
				}
			}
			if (is_numeric($pos_w)) {
				$day = "wednesday";
				$day = 3;

			    insert_schedule($db_con, $class_id, $day, $time_start, $time_end, $room_code);
			    //echo "<br>wednesday<br>";

			}
			if (is_numeric($pos_th)) {
				$day = "thursday";
				$day = 4;
			    insert_schedule($db_con, $class_id, $day, $time_start, $time_end, $room_code);
			    //echo "<br>thursday<br>";

			}
			if (is_numeric($pos_f)) {
				$day = "friday";
				$day = 5;
			    insert_schedule($db_con, $class_id, $day, $time_start, $time_end, $room_code);
			    //echo "<br>friday<br>";
				
			}
		}

	}
	
}

function insert_schedule($db_con, $class_id, $day, $time_start, $time_end, $room_code){
	
	$time_start = date("H:i:s",strtotime($time_start));
	$time_end = date("H:i:s",strtotime($time_end));

	$room_code = ($room_code==NULL)? "NULL":"'$room_code'";

	$query_schedule_check = mysqli_query($db_con, 'SELECT schedule_id FROM class_schedule_t WHERE
								    class_id="'.$class_id.'" 
								AND day="'.$day.'" 
								AND time_start="'.$time_start.'" 
								AND time_end="'.$time_end.'"')or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_schedule_check)>0){
		$row_schedule = mysqli_fetch_array($query_schedule_check);
		$schedule_id = $row_schedule['schedule_id'];
		//echo "schedule update $schedule_id<br>";

		mysqli_query($db_con, "UPDATE class_schedule_t SET
								   class_id ='$class_id', 
								   day = '$day', 
								   time_start = '$time_start', 
								   time_end ='$time_end', 
								   room_code = ".$room_code."
								   	WHERE schedule_id='$schedule_id'")or die(trigger_error(mysqli_error($db_con)));
	}
	else{
		//echo "schedule insert <br>";

		mysqli_query($db_con, "INSERT INTO class_schedule_t VALUES(
								   '',
								   '$class_id', 
								   '$day', 
								   '$time_start', 
								   '$time_end', 
								   ".$room_code.")")or die(trigger_error(mysqli_error($db_con)));
		
	}	
}
function insert_room($db_con, $room_name, $building_code, $floor_no){
	if($room_name==""){
		return NULL;
	}
	$room_code = str_replace(" ", "_",$room_name);


	$query = "SELECT room_code FROM room_t WHERE room_code LIKE '%".$room_code."%' OR room_name LIKE '%".$room_name."%'";
	$query_room = mysqli_query($db_con, $query)or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_room)>0){
		$row_room = mysqli_fetch_array($query_room);
		$room_code = $row_room['room_code'];
	}
	else{
		mysqli_query($db_con, "INSERT INTO room_t VALUES('$room_code',
													'$room_name',
													'$building_code',
													'$floor_no'
												);")or die(trigger_error(mysqli_error($db_con)));
		//$room_code = mysqli_insert_id($db_con);
	}
	return $room_code;
}
function insert_building($db_con, $building_code, $building_name){
	$query = "SELECT building_code FROM building_t WHERE building_code LIKE '%".$building_code."%'";
	$query_building = mysqli_query($db_con, $query)or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_building)>0){
		$row_building = mysqli_fetch_array($query_building);
		$building_code = $row_building['building_code'];
	}
	else{
		$building_code = NULL;
	}
	return $building_code;
}

function get_time_set($time){
	$arr = explode("-", $time);
	$time_start = trim($arr[0]);
	$time_end= trim($arr[1]);

	if(strtotime($time_start) < strtotime("7:00 am")  && strtotime($time_end) <= strtotime("8:30")){
		$time_start.=" pm";
		$time_end.=" pm";
	}
	else{
		$time_start.=" am";
		if(strtotime($time_end) >= strtotime("12:00")){
			$time_end.=" pm";

		}
		else{
			$time_end.=" am";
		}

	}

	$time_set['time-start'] = $time_start;
	$time_set['time-end']   = $time_end;

	return $time_set;

}

function get_year_level($section){
	$section = trim($section);
	if(is_numeric($section)){
		$year_level = $section;
	}
	else{
		if(is_numeric(substr($section, 0, 1))){
			$year_level = substr($section, 0, 1);
		}
		elseif (is_numeric(substr($section, -1, 1))) {
			$year_level = substr($section, -1, 1);
			
		}
	}
	//echo $section;
	return $year_level;
}

##############################################################################################################################
###################       ALLIASES OF THE FUNCTIONS ABOVE         ########################
##############################################################################################################################


function insert_subject($db_con, $subject_code, $subject_title, $units, $lec_units=0, $lab_units=0){
	$subject_id = "";
	$lab_units/=3;
	$query = "SELECT subject_id, lec_units, lab_units FROM subject_t WHERE subject_code='".$subject_code."' AND subject_title='".$subject_title."'";
	$query_subject = mysqli_query($db_con, $query)or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_subject)>0){
		$row_subject = mysqli_fetch_array($query_subject);
		$subject_id = $row_subject['subject_id'];
		$lec_units = ($row_subject['lec_units']>$lec_units)? $row_subject['lec_units']:$lec_units;
		$lab_units = ($row_subject['lab_units']>$lab_units)? $row_subject['lab_units']:$lab_units;
		$units = $lec_units+$lab_units;
		mysqli_query($db_con,"UPDATE subject_t SET  subject_code = '$subject_code',
												    subject_title = '$subject_title',
													lec_units =	$lec_units,
													lab_units = $lab_units,
													units = '$units'
											 WHERE subject_id='$subject_id'
											 ")or die(trigger_error(mysql_error()));;
	}
	else{
		mysqli_query($db_con, "INSERT INTO subject_t VALUES('',
													'$subject_code',
													'$subject_title',
													$lec_units,
													$lab_units,
													'$units'
												);") or die(trigger_error(mysqli_error($db_con)));
		$subject_id = mysqli_insert_id($db_con);
	}
	return $subject_id;
}

function insert_course($db_con, $course_code, $course_title){
	
	$query_course = mysqli_query($db_con,"SELECT course_code FROM course_t WHERE course_code='$course_code'
															") or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_course)>0){
		$row_course = mysqli_fetch_array($query_course);
		$course_code = $row_course['course_code'];
	}
	else{
		mysqli_query($db_con, "INSERT INTO course_t VALUES('$course_code',
														 '$course_title'

														)") or die(trigger_error(mysqli_error($db_con)));
		//$course_code = mysqli_insert_id($db_con);
	}
	return $course_code;
}
function insert_block($db_con, $course_code, $year_level, $block_name, $sem_id){
	$block_id = "";
	//$block_name = $course_code." ".$block;
	$query_block = mysqli_query($db_con,"SELECT block_id FROM student_block_t WHERE course_code='$course_code' 
																AND year_level='$year_level'
																AND block_name='$block_name'
																AND sem_id='$sem_id'
															")or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_block)>0){
		$row_block = mysqli_fetch_array($query_block);
		$block_id = $row_block['block_id'];
	}
	else{
		mysqli_query($db_con, "INSERT INTO student_block_t VALUES('',
														 '$block_name',
														 '$course_code',
														 '$year_level',
														 '$sem_id'

														)") or die(trigger_error(mysqli_error($db_con)));
		$block_id = mysqli_insert_id($db_con);
	}
	return $block_id;
}

function insert_student($db_con, $student_id, $f_name, $m_name, $l_name, $gender, $birthdate, $address,  $status){

	$query = "SELECT student_id FROM student_t WHERE student_id='".$student_id."'";
	$query_student = mysqli_query($db_con, $query) or die("Error at get_student_id() :: ".mysql_error());
	if(mysqli_num_rows($query_student)>0){
		$row_student = mysqli_fetch_array($query_student);
		$student_id = $row_student['student_id'];
		//UPDATE student entry
		mysqli_query($db_con, 'UPDATE student_t SET 
													f_name =	 "'.$f_name.'",
													m_name =	 "'.$m_name.'",
													l_name = 	 "'.$l_name.'",
													gender =	 "'.$gender.'",
													status =	 "'.$status.'"
											  WHERE student_id = "'.$student_id.'"
							  ') or die(trigger_error(mysql_error()));
	}
	else{
		mysqli_query($db_con, 'INSERT INTO student_t VALUES("'.$student_id.'",
															"'.$f_name.'",
															"'.$m_name.'",
															"'.$l_name.'",
															"'.$gender.'",
															NULL,
															NULL,
															"'.$status.'"

														);') or die(trigger_error(mysql_error()));
		//$student_id = mysqli_insert_id($db_con);

	}
	return $student_id;
}

function insert_personnel($db_con, $personnel_id, $f_name, $m_name, $l_name, $gender, $academic_rank, $status, $b_day){
	//$personnel_id = "";
	//$query = "SELECT personnel_id FROM personnel_t WHERE  CONCAT(f_name,' ',m_name, ' ',l_name) LIKE '%".$personnel."%' OR CONCAT(l_name,', ',f_name,' ',m_name) LIKE '%".$personnel."%'";
	$query = "SELECT personnel_id FROM personnel_t WHERE personnel_id='".$personnel_id."'";
	$query_personnel = mysqli_query($db_con, $query) or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_personnel)>0){
		$row_personnel = mysqli_fetch_array($query_personnel);
		$personnel_id = $row_personnel['personnel_id'];
		//code to update faculty name and rank only
		mysqli_query($db_con, "UPDATE personnel_t SET f_name = '$f_name',
													  m_name = '$m_name',
													  l_name = '$l_name',
													  gender = '$gender',
													  academic_rank = '$academic_rank',
													  status = '$status'

												WHERE personnel_id = '$personnel_id'
							  ") or die(trigger_error(mysqli_error($db_con)));

	}
	else{
		mysqli_query($db_con, 'INSERT INTO personnel_t VALUES("'.$personnel_id.'",
															"'.$f_name.'",
															"'.$m_name.'",
															"'.$l_name.'",
															"'.$gender.'",
															"'.$academic_rank.'",
															"'.$status.'",
															NULL,
															"'.$b_day.'"

														)') or die(trigger_error(mysqli_error($db_con)));

		$personnel_id = mysqli_insert_id($db_con);
	}

	return $personnel_id;
}
function insert_reg($db_con, $student_id, $reg_no, $reg_date, $year_level, $course_code, $sem_id){
	$reg_no = $reg_no;
	$query = "SELECT reg_no FROM student_registration_t WHERE reg_no='".$reg_no."'";
	$query_reg = mysqli_query($db_con, $query) or die(trigger_error(mysqli_error($db_con)));
    if(mysqli_num_rows($query_reg)>0){
    	$row_reg = mysqli_fetch_array($query_reg);
    	$reg_no = $row_reg['reg_no'];
    	//code to update year level, course and student id only
    	mysqli_query($db_con,'UPDATE student_registration_t SET student_id = "'.$student_id.'", 
														    	reg_date = "'.$reg_date.'", 
														   		sem_id = "'.$sem_id.'", 
														   		course_code ="'.$course_code.'", 
														   		year_level = "'.$year_level.'"
														  WHERE reg_no = "'.$reg_no.'"
							 ')or die(trigger_error(mysqli_error($db_con)));
    }
    else{
		mysqli_query($db_con,'INSERT INTO student_registration_t VALUES ("'.$reg_no.'",
														   "'.$student_id.'", 
														   "'.$reg_date.'", 
														   "'.$sem_id.'", 
														   "'.$course_code.'", 
														   "'.$year_level.'"
													   )')or die(trigger_error(mysqli_error($db_con)));
		//$reg_no = mysqli_insert_id($db_con);
    
	}
	return $reg_no;
	
}
function insert_load($db_con, $reg_no, $class_id){
	$load_id = "";
	$query = "SELECT load_id FROM student_load_t WHERE reg_no='".$reg_no."' AND class_id='".$class_id."'";
	$query_student_load = mysqli_query($db_con, $query) or die(trigger_error(mysqli_error($db_con)));
    if(mysqli_num_rows($query_student_load)>0){
    	$row_student_load = mysqli_fetch_array($query_student_load);
    	$load_id = $row_student_load['load_id'];

    }
    else{
		mysqli_query($db_con,'INSERT INTO student_load_t VALUES("'.''.'",
														   "'.$reg_no.'", 
														   "'.$class_id.'"
													   )')or die(trigger_error(mysqli_error($db_con)));
		$load_id = mysqli_insert_id($db_con);
	}
	return $load_id;
}
function insert_class($db_con, $subject_id, $faculty_id, $block_id, $sem_id ){
	$class_id = "";
	$faculty_id = ($faculty_id==NULL)? "NULL":"'$faculty_id'";
	$query = "SELECT class_id FROM class_t WHERE subject_id='".$subject_id."'  AND block_id='".$block_id."'  AND sem_id='".$sem_id."'";
	$query_class = mysqli_query($db_con, $query)or die(trigger_error(mysqli_error($db_con)));

	if(mysqli_num_rows($query_class)>0){
		$num = mysqli_num_rows($query_class);
		//echo "updating class : sem id = $sem_id       $num    ";
		$row_class = mysqli_fetch_array($query_class);
		$class_id = $row_class['class_id'];
		//no update
		mysqli_query($db_con, "UPDATE class_t SET
											faculty_id =$faculty_id,
											sem_id = '$sem_id',
											subject_id = '$subject_id',
											block_id = '$block_id'
											WHERE   class_id='$class_id'
											;") or die(trigger_error(mysqli_error($db_con)));
	}
	else{
		//echo $subject_id;
		//echo "inserting class : sem id = $sem_id";
		mysqli_query($db_con, "INSERT INTO class_t VALUES('',
													$faculty_id,
													'$sem_id',
													'$subject_id',
													NULL,
													NULL,
													NULL,
													'$block_id'
												);") or die(trigger_error(mysqli_error($db_con)));
		$class_id = mysqli_insert_id($db_con);
	}
	return $class_id;
}

function insert_grade($db_con, $load_id, $m_grade, $tf_grade, $f_grade){
	//echo "inserting grade with load id : ".$load_id."<br>";
	$query = "SELECT load_id FROM student_grade_t WHERE load_id='".$load_id."'";
	$query_student_grade = mysqli_query($db_con, $query) or die(trigger_error(mysqli_error($db_con)));
    if(mysqli_num_rows($query_student_grade)>0){
    	$row_student_grade = mysqli_fetch_array($query_student_grade);
    	$load_id = $row_student_grade['load_id'];
    	mysqli_query($db_con, 'UPDATE student_grade_t SET 
    												final_grade = '.$f_grade.',
    												tentative_final_grade = '.$tf_grade.',
    												midterm_grade = '.$m_grade.'
    												WHERE load_id='.$load_id.'
    												')or die(trigger_error(mysqli_error($db_con)));
    	return "updated";
    }
    else{
		mysqli_query($db_con,'INSERT INTO student_grade_t VALUES("'.''.'",
														   "'.$load_id.'", 
														   "'.$f_grade.'",
														   "'.$tf_grade.'",
														   "'.$m_grade.'"
													   )') or die(trigger_error(mysqli_error($db_con)));
		return "inserted";
	}
}


function insert_payment($db_con, $student_id, $sem_id, $trans_date, $trans_code, $ref_no, $particulars, $debit, $credit, $balance){
	echo "inserting payment with trns_id : ".$trans_code.$ref_no."<br>";
	$query = "SELECT trans_id FROM accounting_journal_t WHERE trans_code='".$trans_code."' AND ref_no='".$ref_no."' ";
	$query_payment = mysqli_query($db_con, $query) or die(trigger_error(mysqli_error($db_con)));
    if(mysqli_num_rows($query_payment)>0){
    	$row_payment = mysqli_fetch_array($query_payment);
    	$trans_id = $row_payment['trans_id'];
    	mysqli_query($db_con, 'UPDATE accounting_journal_t SET 
    												student_id = "'.$student_id.'",
    												sem_id = "'.$sem_id.'",
    												trans_date = "'.$trans_date.'",
    												trans_code = "'.$trans_code.'",
    												ref_no = "'.$ref_no.'",
    												particulars = "'.$particulars.'",
    												debit = "'.$debit.'",
    												credit = "'.$credit.'",
    												bal = "'.$balance.'"
    												WHERE trans_id="'.$trans_id.'"
    												') or die(trigger_error(mysqli_error($db_con)));
    	return "updated";
    }
    else{
		mysqli_query($db_con,'INSERT INTO accounting_journal_t VALUES("'.''.'",
																    "'.$student_id.'",
				    												"'.$sem_id.'",
				    												"'.$trans_date.'",
				    												"'.$trans_code.'",
				    												"'.$ref_no.'",
				    												"'.$particulars.'",
				    												"'.$debit.'",
				    												"'.$credit.'",
				    												"'.$balance.'"
															   )') or die(trigger_error(mysqli_error($db_con)));
		return "inserted";
	}
}






















function verify_faculty_id($db_con,$faculty_id){
	$query_faculty = mysqli_query($db_con, "SELECT personnel_id FROM personnel_t WHERE personnel_id='$faculty_id'" ) or die(trigger_error(mysqli_error($db_con)));
	if(mysqli_num_rows($query_faculty)>0){
		return $faculty_id;
	}
	else{
		return NULL;
	}
}






































function get_block_id($db_con, $course_code, $class_year_level, $block, $sem_id){
	$block_id = "";
	$block_name = $course_code." ".$block;
	$query_block = mysqli_query($db_con,"SELECT block_id FROM student_block_t WHERE course_code='$course_code' 
																AND year_level='$class_year_level'
																AND block_name='$block_name'
															") or die("Error at upload_student_lis_class.php : line 192 :: ".mysqli_error($db_con));
	if(mysqli_num_rows($query_block)>0){
		$row_block = mysqli_fetch_array($query_block);
		$block_id = $row_block['block_id'];
	}
	else{
		mysqli_query($db_con, "INSERT INTO student_block_t VALUES('',
														 '$block_name',
														 '$course_code',
														 '$class_year_level',
														 '$sem_id'

														)") or die("Error at upload_student_lis_class.php : line 202 :: ".mysqli_error($db_con));
		$block_id = mysqli_insert_id($db_con);
	}
	return $block_id;
}
function get_faculty_id($db_con, $faculty){
	$faculty_id = "";

	//$query = "SELECT personnel_id FROM personnel_t WHERE  CONCAT(f_name,' ',m_name, ' ',l_name) LIKE '%".$faculty."%' OR CONCAT(l_name,', ',f_name,' ',m_name) LIKE '%".$faculty."%'";
	$query = "SELECT personnel_id FROM personnel_t WHERE  CONCAT(f_name,' ',m_name, ' ',l_name) LIKE '%".$faculty."%' 
													   OR CONCAT(l_name,', ',f_name,' ',m_name) LIKE '%".$faculty."%'
													   OR CONCAT(l_name,', ',f_name) LIKE '%".$faculty."%'
													   ";



	$query_faculty = mysqli_query($db_con, $query) or die("Error at upload_student_lis_class.php : line 216 :: ".mysqli_error($db_con));
	if(mysqli_num_rows($query_faculty)>0){
		$row_faculty = mysqli_fetch_array($query_faculty);
		$faculty_id = $row_faculty['personnel_id'];
	}
	return $faculty_id;
}
function get_subject_id($db_con, $subject_code, $subject_title, $units, $lec_units=0, $lab_units=0){
	$subject_id = "";
	$query = "SELECT subject_id FROM subject_t WHERE subject_code='".$subject_code."' AND subject_title='".$subject_title."'";
	$query_subject = mysqli_query($db_con, $query) or die("Error at get_subject_id() :: ".mysql_error());
	if(mysqli_num_rows($query_subject)>0){
		$row_subject = mysqli_fetch_array($query_subject);
		$subject_id = $row_subject['subject_id'];
	}
	else{
		mysqli_query($db_con, "INSERT INTO subject_t VALUES('',
													'$subject_code',
													'$subject_title',
													NULL,
													NULL,
													'$units'
												);") or die("Error at get_subject_id() :: ".mysql_error());
		$subject_id = mysqli_insert_id($db_con);
	}
	return $subject_code;
}
function get_class_id($db_con, $subject_id, $faculty_id, $block_id, $sem_id ){
	$class_id = "";
	$query = "SELECT class_id FROM class_t WHERE subject_id='".$subject_id."' AND faculty_id='".$faculty_id."' AND block_id='".$block_id."'";
	$query_class = mysqli_query($db_con, $query) or die("Error at get_class_id() :: ".mysql_error());
	if(mysqli_num_rows($query_class)>0){
		$row_class = mysqli_fetch_array($query_class);
		$class_id = $row_class['class_id'];
	}
	else{
		mysqli_query($db_con, "INSERT INTO class_t VALUES('',
													'$faculty_id',
													'$sem_id',
													'$subject_id',
													NULL,
													NULL,
													NULL,
													$block_id
												);") or die("Error at get_class_id() :: ".mysql_error());
		$class_id = mysqli_insert_id($db_con);
	}
	return $class_id;
}
function get_student_id($db_con, $student_id, $student_name, $gender, $age, $load_status){
	//$student_id = "";

	$name_arr = explode(",", $student_name);
	$f_name = "";
	$m_name = "";
	$l_name = $name_arr[0];
	$name_arr = explode(" ", $name_arr[1]);
	foreach ($name_arr as $name) {
		if(ctype_upper($name)){
			$f_name .= $name." ";
		}
		else{
			$m_name .= $name." ";
		}
	}
	$gender = ($gender=="M")? "Male":"Female";
	$load_status = "regular";

	$query = "SELECT student_id FROM student_t WHERE student_id='".$student_id."'";
	$query_student = mysqli_query($db_con, $query) or die("Error at get_student_id() :: ".mysql_error());
	if(mysqli_num_rows($query_student)>0){
		$row_student = mysqli_fetch_array($query_student);
		$student_id = $row_student['student_id'];
	}
	else{
		mysqli_query($db_con, 'INSERT INTO student_t VALUES("'.$student_id.'",
															"'.$f_name.'",
															"'.$m_name.'",
															"'.$l_name.'",
															"'.$gender.'",
															NULL,
															NULL,
															"'.$load_status.'"

														);') or die("Error at get_student_id() :: ".mysql_error());
		//$student_id = mysqli_insert_id($db_con);

	}
	return $student_id;
}
function get_reg_no($db_con, $student_id, $reg_no, $reg_date, $year_level, $course_code, $sem_id){
	$reg_no = $reg_no;
	$query = "SELECT reg_no FROM student_registration_t WHERE reg_no='".$reg_no."'";
	$query_reg = mysqli_query($db_con, $query) or die("Error at upload_student_lis_class.php : line 106 :: ".mysqli_error($db_con));
    if(mysqli_num_rows($query_reg)>0){
    	$row_reg = mysqli_fetch_array($query_reg);
    	$_reg_no = $row_reg['reg_no'];
    }
    else{
		mysqli_query($db_con,'INSERT INTO student_registration_t VALUES ("'.$reg_no.'",
														   "'.$student_id.'", 
														   "'.$reg_date.'", 
														   "'.$sem_id.'", 
														   "'.$course_code.'", 
														   "'.$year_level.'"
													   )')or die("Error at get_reg_no() :: ".mysql_error());
		$reg_no = mysqli_insert_id($db_con);
    
	}
	return $reg_no;
}
function get_load_id($db_con, $reg_no, $class_id){
	$load_id = "";
	$query = "SELECT load_id FROM student_load_t WHERE reg_no='".$reg_no."' AND class_id='".$class_id."'";
	$query_student_load = mysqli_query($db_con, $query) or die("Error at get_load_id :: ".mysqli_error($db_con));
    if(mysqli_num_rows($query_student_load)>0){
    	$row_student_load = mysqli_fetch_array($query_student_load);
    	$load_id = $row_student_load['load_id'];
    }
    else{
		mysqli_query($db_con,'INSERT INTO student_load_t VALUES("'.''.'",
														   "'.$reg_no.'", 
														   "'.$class_id.'"
													   )') or die("Error at get_load_id :: ".mysqli_error($db_con));
	}
}
function get_personnel_id($db_con, $personnel_id, $personnel_name, $gender, $academic_rank, $status, $b_day){
	//$personnel_id = "";

	//$query = "SELECT personnel_id FROM personnel_t WHERE  CONCAT(f_name,' ',m_name, ' ',l_name) LIKE '%".$personnel."%' OR CONCAT(l_name,', ',f_name,' ',m_name) LIKE '%".$personnel."%'";
	$query = "SELECT personnel_id FROM personnel_t WHERE personnel_id='".$personnel_id."'";
	$query_personnel = mysqli_query($db_con, $query) or die("Error at upload_personnel_list.php : line 216 :: ".mysqli_error($db_con));
	if(mysqli_num_rows($query_personnel)>0){
		$row_personnel = mysqli_fetch_array($query_personnel);
		$personnel_id = $row_personnel['personnel_id'];
		//code to update faculty name and rank only
	}
	else{
		mysqli_query($db_con, 'INSERT INTO personnel_t VALUES("'.$personnel_id.'",
															"'.$personnel_name['f_name'].'",
															"'.$personnel_name['m_name'].'",
															"'.$personnel_name['l_name'].'",
															"'.$gender.'",
															"'.$academic_rank.'",
															"'.$status.'",
															NULL,
															"'.$b_day.'"

														)') or die("Error at cms_functions.php : line 200 :: ".mysqli_error($db_con));
		$personnel_id = mysqli_insert_id($db_con);
	}

	return $personnel_id;
}







?>