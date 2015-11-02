<?php
include "../db/db.php";
include "../actions/misc_functions.php";

$student_id = $_GET['student_id'];
?>
<div class="container">
                        <h1>Student Load</h1>

                        <?php
                        $sem_reg_no = 0;
                        $query_reg = mysql_query("SELECT reg_no, sem_id FROM student_registration_t WHERE student_id='{$student_id}' ORDER BY sem_id DESC") or die(trigger_error(trigger_error(mysql_error())));
                        while($row_reg = mysql_fetch_assoc($query_reg)){
                            $sem_reg_no = $row_reg['reg_no'];
                            $load_sem_id = $row_reg['sem_id'];

##

                            $query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_id='{$load_sem_id}'") or die(trigger_error(mysql_error()));
                            $row_sem = mysql_fetch_assoc($query_sem);

                            $sem_no = $row_sem['sem_no'];
                            $ay_id = $row_sem['ay_no'];

                            //get name of semester
                            $sem_name = sem_name($load_sem_id);

                            $query_year = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(trigger_error(mysql_error()));
                            $row_year = mysql_fetch_assoc($query_year);

                            $year_start = $row_year['year_start'];
                            $year_end   = $row_year['year_end'];
##
                        ?>
                            <h4><?php echo $sem_name;//." A.Y.".$year_start." - ".$year_end;?></h4>


                            <table class="table table-bordered">
    		                  <thead>
    		                    <th>Code</th>
    		                    <th>Subject Title</th>
    		                    <th>Lec Units</th>
    		                    <th>Lab Units</th>
    		                    <th>Credit Units</th>
    		                    <th>Course</th>
    		                    <th>Year & Block</th>
    		                    <th>Faculty</th>
    		                  </thead>

    		                  <tbody>
    		                    <?php 
    		                    $total_units = 0;
    		                    $subject_count = 0;
    		                    $query_class = mysql_query("SELECT * 
    		                    							FROM class_t 
    		                    							WHERE class_id 
    		                    							IN ( SELECT class_id 
    		                    								 FROM student_load_t 
    		                    								 WHERE reg_no='{$sem_reg_no}'
    		                    								)
    		                    						  ") or die(trigger_error(mysql_error()));

    		                    if(mysql_num_rows($query_class)>0){
    		                        
    		                        while($row_class = mysql_fetch_assoc($query_class)){
    		                        	$subject_count++;
                                        $faculty_id = $row_class['faculty_id'];
    		                            $subject_id = $row_class['subject_id'];
    		                            $course_code = $row_class['course_code'];
    		                            $year_level = $row_class['year_level'];
    		                            $block_id = $row_class['block_id'];

                                        $query_faculty = mysql_query("SELECT * FROM personnel_t WHERE personnel_id='{$faculty_id}'") or die(trigger_error(mysql_error()));
                                        $row_faculty = mysql_fetch_assoc($query_faculty);
                                        $faculty_name = $row_faculty['f_name']." ".$row_faculty['l_name'];

    		                            $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_id='{$subject_id}'") or die(trigger_error(mysql_error()));
    		                            $row_subject = mysql_fetch_assoc($query_subject);
                                        $subject_code = $row_subject['subject_code'];
    		                            $subject_title = $row_subject['subject_title'];
    		                            $lec_units = $row_subject['lec_units'];
    		                            $lab_units = $row_subject['lab_units'];
    		                            $credit_units = $row_subject['units'];
    		                            $total_units+=$credit_units;


                                        $query_block = mysql_query("SELECT * FROM student_block_t WHERE block_id='$block_id'") or die(trigger_error(trigger_error(mysql_error())));
    		                            $row_block = mysql_fetch_assoc($query_block);

                                        $course_code = $row_block['course_code'];
                                        $year_level = $row_block['year_level'];
                                        $block = $row_block['block_name'];
                                        ?>
    		                            <tr>
    		                              <th><?php echo $subject_code;?></th>
    		                              <th><?php echo $subject_title?></th>
    		                              <th><?php echo $lec_units;?></th>
    		                              <th><?php echo $lab_units;?></th>
    		                              <th><?php echo $credit_units;?></th>
    		                              <th><?php echo $course_code;?></th>
    		                              <th><?php echo $block;?></th>
    		                              <th><?php echo $faculty_name; ?></th>

    		                            </tr>
    		                            <?php


    		                        }

    		                    }
    		                    else{
    		                      ?>
    		                      <tr><th colspan="8">Student has no Load for this semester.<?php echo $reg_no?></th></tr>
    		                      <?php
    		                    }
    		                    ?>

    		                    <tr >
    		                      <th colspan="2"><?php echo $subject_count." subject"; echo ($subject_count>1)? "s":""; ?></th>
    		                      <th colspan="2">Total Units:</th>
    		                      <th><?php echo $total_units;?></th>
    		                      <th colspan="4"></th>
    		                    </tr>

    		                    <?php ?>
    		                  </tbody>

    		                </table>

                        <?php
                        }   
                        ?>


                    </div>