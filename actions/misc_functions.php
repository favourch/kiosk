<?php
//miscelleneous functions

function semester(){
	$query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_status='1'") or die(mysql_error());
	$row_sem = mysql_fetch_assoc($query_sem);

	return $row_sem['sem_id'];
}

function print_level($year_level){
    switch($year_level){
        case '1':
            $r = "1st Year";
            break;
        case '2':
            $r = "2nd Year";
            break;
        case '3':
            $r = "3rd Year";
            break;
        case '4':
            $r = "4th Year";
            break;
        default:
            $r = "Year level not available";
            break;
    }
    return $r;
}

function sem_name($sem_id){
    $sem_name = "";
    $query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_id='{$sem_id}'") or die(mysql_error());
    $row_sem = mysql_fetch_assoc($query_sem);

    $sem_no = $row_sem['sem_no'];
    $ay_id = $row_sem['ay_no'];

    

    $query_year = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(mysql_error());
    $row_year = mysql_fetch_assoc($query_year);

    $year_start = $row_year['year_start'];
    $year_end   = $row_year['year_end'];
    
    $year = "";
    //get name of semester
    switch($sem_no){
        case 1:
        case "1":
            $sem_no = "1st Semester";
            $year = $year_start." - ".$year_end;
            break;
        case 2:
        case "2":

            $sem_no = "2nd Semester";
            $year = $year_start." - ".$year_end;
            break;
        case 3:
        case "3":

            $sem_no = "Summer";
            $year = $year_end;
            break;
        default:
            $sem_no = "Undefined Semester no.";
            break;
    }

    return $sem_no." ".$year;
}



?>