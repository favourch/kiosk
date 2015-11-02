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


function footer($account_no, $identity, $date_of_post, $time_of_post){


        $query_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'");
        $row_acc=mysql_fetch_assoc($query_acc);
        $acc_type=$row_acc['type'];


        if ($acc_type=='student') {
            
            $query_student=mysql_query("SELECT * FROM student_t, account_t, student_members_t, member_t, unit_t, position_t
                                        WHERE member_t.position_id=position_t.position_id AND student_members_t.account_no='$account_no' 
                                        AND student_members_t.student_id=student_t.student_id AND student_members_t.member_id=member_t.member_id 
                                        AND member_t.unit_id=unit_t.unit_id") or die(mysql_error());
                                        
            $row_student=mysql_fetch_assoc($query_student);
            $f_name=$row_student['f_name'];
            $l_name=$row_student['l_name'];
            $unit_abbrev=$row_student['unit_abbrev'];
            $unit_name=$row_student['unit_name'];
            $unit_abbrev=$row_student['unit_abbrev'];
            $position_name=$row_student['position_name'];
        if ($identity == 'name') {

            echo '<b>';
            echo ucfirst($f_name).' '.ucfirst($l_name); 
            echo '</b>';
            echo '<br/>';
            echo $position_name;
            echo ', ';
            if ($unit_abbrev==NULL) {
            echo '<b>';
            echo $unit_name;
            echo '</b>';
                } else {
            echo '<b>';
            echo $unit_abbrev;
            echo '</b>';
                }
        } // if identity
        else if ($identity=='unit') {
            if ($unit_abbrev==NULL) {
            echo '<b>';
            echo $unit_name;
            echo '</b>';
                } else {
            echo '<b>';
            echo $unit_abbrev;
            echo '</b>';
                }
        } // unit
        else if ($identity=='anonymous') {
            echo '<b>';
            echo 'ANONYMOUS';
            echo '</b>';
                
            } // anonymous
                
        } // if acc
        else if ($acc_type=='personnel') {

            
            
            $query_personnel_cunit=mysql_query("SELECT * FROM personnel_t, account_t, personnel_members_t, member_t, unit_t, position_t
                                        WHERE member_t.position_id=position_t.position_id AND personnel_members_t.account_no='$account_no' 
                                        AND personnel_members_t.personnel_id=personnel_t.personnel_id AND personnel_members_t.member_id=member_t.member_id 
                                        AND member_t.unit_id=unit_t.unit_id");
                                          
                        $num=mysql_num_rows($query_personnel_cunit);
                        if ($num>0) {
                                $row_personnel_cunit=mysql_fetch_assoc($query_personnel_cunit);
                                $f_name=$row_personnel_cunit['f_name'];
                                $l_name=$row_personnel_cunit['l_name'];
                                $unit_abbrev=$row_personnel_cunit['unit_abbrev'];
                                $unit_name=$row_personnel_cunit['unit_name'];
                                $position_name=$row_personnel_cunit['position_name'];
                                
                            if($identity=='name') { 
                                echo '<b>';
                                echo ucfirst($f_name).' '.ucfirst($l_name); 
                                echo '</b>';
                                echo '<br/>';
                                echo $position_name;
                                echo ', ';
                                if ($unit_abbrev==NULL) {
                                echo '<b>';
                                echo $unit_name;
                                echo '</b>';
                                    } else {
                                echo '<b>';
                                echo $unit_abbrev;
                                echo '</b>'; 


                                    }
                            } // identity 
                            else if ($identity=='unit') {
                                if ($unit_abbrev==NULL) {
                                echo '<b>';
                                echo $unit_name;
                                echo '</b>';
                                    } else {
                                echo '<b>';
                                echo $unit_abbrev;
                                echo '</b>';
                                    }
                
                                } // else identity
                            else if ($identity=='anonymous') {
                                echo '<b>';
                                echo 'ANONYMOUS';
                                echo '</b>';
                
                            } // anonymous
          } 
    }            
        else if($acc_type=='admin'){
            echo '<b>';
            echo 'Admin'; 
            echo '</b>';                                                            



        }
        
         $date = strtotime("$date_of_post");
         $time = strtotime("$time_of_post");
        
         ?>
        <br />
        <?php echo date("g:i A", $time); ?>, <?php echo date("F j, Y", $date) ?></span>

<?php
}


?>
