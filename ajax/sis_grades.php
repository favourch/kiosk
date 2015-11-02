<?php
include "../db/db.php";
include "../actions/misc_functions.php";

$student_id = $_GET['student_id'];
?>
                    <div class="container">
                        <h1>Student Grades</h1>
                       
                        <div class="">
                          <div class="container-fluid">
                            <?php
                            $total_units = 0;
                            $query_reg = mysql_query("SELECT reg_no, sem_id FROM student_registration_t WHERE student_id='{$student_id}' ORDER BY sem_id DESC") or die(trigger_error(trigger_error(mysql_error())));
                            while($row_reg = mysql_fetch_assoc($query_reg)){
                                $sem_reg_no = $row_reg['reg_no'];
                                $load_sem_id = $row_reg['sem_id'];
                                $subtotal_units = 0;
    ##

                                $query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_id='{$load_sem_id}'") or die(trigger_error(mysql_error()));
                                $row_sem = mysql_fetch_assoc($query_sem);

                                $sem_no = $row_sem['sem_no'];
                                $ay_id = $row_sem['ay_no'];

                                $sem_name = sem_name($load_sem_id);

                                $query_year = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(trigger_error(mysql_error()));
                                $row_year = mysql_fetch_assoc($query_year);

                                $year_start = $row_year['year_start'];
                                $year_end   = $row_year['year_end'];
    ##
                            ?>
                                <h4><?php echo $sem_name;//." A.Y.".$year_start." - ".$year_end;?></h4>

                                <table style="width:100%;" class="table table-bordered ">
                                  <thead>
                                    <tr>
                                      <th>Code</th>
                                      <th>Subject Title</th>
                                      <th>Unit Credit</th>
                                      <th>Midterm Grade</th>
                                      <th>Tentative Final</th>
                                      <th>Final Grade</th>
                                      <th>Remarks</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $query_load=mysql_query("SELECT * FROM student_load_t, class_t, subject_t WHERE student_load_t.reg_no = '$sem_reg_no' AND 
                                                class_t.class_id=student_load_t.class_id AND subject_t.subject_id=class_t.subject_id") or die(trigger_error(mysql_error()));
                                    $query_units=mysql_query("SELECT SUM(units) as total_units FROM student_load_t, class_t, subject_t WHERE student_load_t.reg_no = '$sem_reg_no' AND 
                                                class_t.class_id=student_load_t.class_id AND subject_t.subject_id=class_t.subject_id") or die(trigger_error(mysql_error()));
                                    $row_units = mysql_fetch_assoc($query_units);
                                    $subtotal_units = $row_units['total_units'];
                                    $gwa=0;
                                    $all_graded = true;

                                    while($row_load=mysql_fetch_assoc($query_load)){
                                      $class_id=$row_load['class_id'];
                                      $subject_code=$row_load['subject_code'];
                                      $subj_title=$row_load['subject_title'];
                                      $units=$row_load['units'];
                                      $load_id = $row_load['load_id'];
                                      
                                      $query_grade=mysql_query("SELECT * FROM student_grade_t WHERE load_id='{$load_id}'") or die(trigger_error(mysql_error()));
                                      $row_grade=mysql_fetch_assoc($query_grade);
                                      $midterm_grade=$row_grade['midterm_grade'];
                                      $tentative_fgrade=$row_grade['tentative_final_grade'];
                                      $final_grade=$row_grade['final_grade']; 

                                      //$mg = (is_numeric($midterm_grade))? "-":sprintf("%.1f", $midterm_grade);
                                      //$tfg = (is_numeric($tentative_fgrade))? "-":sprintf("%.1f", $tentative_fgrade);
                                      //$fg = (is_numeric($final_grade))? "-":sprintf("%.2f", $final_grade);

                                      if(is_numeric($midterm_grade)){
                                        $mg = ($midterm_grade<1)? "inc":sprintf("%.1f", $midterm_grade);
                                      }
                                      else{
                                        $mg = "-";
                                      }

                                      if(is_numeric($tentative_fgrade)){
                                        $tfg = ($tentative_fgrade<1)? "inc":sprintf("%.1f", $tentative_fgrade);
                                      }
                                      else{
                                        $tfg = "-";
                                      }

                                      if(is_numeric($final_grade)){
                                        $fg = ($final_grade<1)? "inc":sprintf("%.2f", $final_grade);
                                      }
                                      else{
                                        $fg = "-";
                                      }

                                      if(!($mg>=1 && $tfg>=1 && $fg>=1)){
                                        $all_graded = false;
                                      }
                                      


                                      if(is_numeric($final_grade)){
                                        if($fg>3){
                                          $remarks = "Fail";
                                        }
                                        else if($fg>=1){
                                          $remarks = "Pass";

                                        }
                                        else{
                                          $remarks = "Incomplete";
                                        }
                                      }
                                      else{
                                        $remarks = "-";
                                      }
                                      $gwa += $fg*$units/$subtotal_units;
                                      //$subtotal_units+=$units;
                                      ?>
                                      
                                                      
                                        <tr>
                                          <th><?php echo $subject_code; ?></th>
                                          <th><?php echo $subj_title ?></th>
                                          <th style="text-align:center"><?php printf("%.1f", $units) ?></th>
                                          <th style="text-align:center"><?php echo $mg; ?></th>
                                          <th style="text-align:center"><?php echo $tfg; ?></th>
                                          <th style="text-align:center"><?php echo $fg; ?></th>
                                          <th style="text-align:center"><?php echo $remarks; ?></th>
                                        </tr>
                                        
                                    <?php 
                                    } 
                                    $total_units+=$subtotal_units;
                                    ?>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th style="text-align:center"><?php printf("%.1f", $subtotal_units) ?></th>
                                      <th style="text-align:center"><?php ?></th>
                                      <th style="text-align:right">GWA:</th>
                                      <th style="text-align:center"><?php echo ($all_graded)? $gwa:"-"; ?></th>
                                      <th style="text-align:center"><?php?></th>
                                    </tr>
                                  </tbody>
                                </table>

                            <?php
                            }
                            ?>
                          </div>
                        </div>
                    </div>