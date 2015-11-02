                
                   <?php
                   include "../db/db.php";
                   include "../actions/misc_functions.php";

                    $student_id = $_GET['student_id'];
                    $query_student = mysql_query("SELECT * FROM student_t WHERE student_id='{$student_id}'") or die(trigger_error(mysql_error()));
                    $row_student = mysql_fetch_assoc($query_student);
                    $f_name = $row_student['f_name'];
                    $m_name = $row_student['m_name'];
                    $l_name = $row_student['l_name'];
                    $status = $row_student['status'];
                    $address = $row_student['address'];
                    $gender=$row_student['gender'];



                    $sem_id = semester();
                    $query_reg = mysql_query("SELECT * FROM student_registration_t WHERE student_id='{$student_id}' AND sem_id='{$sem_id}'") or die(trigger_error(mysql_error()));
                    
                    if(mysql_num_rows($query_reg)>0){
                      $row_reg = mysql_fetch_assoc($query_reg);

                      $reg_no = $row_reg['reg_no'];
                      $stud_course_code = $row_reg['course_code'];
                      $stud_year_level = $row_reg['year_level'];

                      $date_of_reg=$row_reg['reg_date'];
                      $reg_of_date=strtotime($date_of_reg);
                      $year_of_reg=date("Y", $reg_of_date);
                      $next_yr=$year_of_reg+1;




                      $query_course = mysql_query("SELECT * FROM course_t WHERE course_code='{$stud_course_code}'") or die(trigger_error(mysql_error()));
                      $row_course = mysql_fetch_assoc($query_course);

                      $course_title = $row_course['course_title'];

                    


                    ?>
                    <div class="container">
                        <h1>Student Profile</h1>

                        <div class="profile_holder">
                        <div class="container">
                          <div class="col-md-8">
                              <table style="width:100%">
                                <colgroup>
                                    <col width="100px"/>
                                    <col width="300px"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Fullname:</th>
                                  <th class="t-value"><?php echo strtoupper($l_name).", ".strtoupper($f_name)." ".ucfirst($m_name);?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Gender:</th>
                                  <th class="t-value"><?php echo $gender;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">College</th>
                                  <th class="t-value"><?php echo "College of Science";?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Program</th>
                                  <th class="t-value"><?php echo $course_title;?></th>
                                </tr>
                               <!--  <tr>
                                  <th class="t-label">Major</th>
                                  <th class="t-value"></th>
                                </tr> -->
                              </table>
                          </div>
                          <div class="col-md-4">
                              <table>
                                <colgroup>
                                    <col width="200"/>
                                    <col width="300"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Student No:</th>
                                  <th class="t-value"><?php echo $student_id;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Year Level:</th>
                                  <th class="t-value"><?php echo print_level($stud_year_level); ?></th>
                                </tr>
                                <tr>
                                  <th class="t-label"><!-- Retention  -->Status:</th>
                                  <th class="t-value"><?php echo $status; ?></th>
                                </tr>
                                <tr>
                                  <th class="t-label"><!-- Academic Year -->Course code:</th>
                                  <th class="t-value"><?php echo  $stud_course_code;//$year_of_reg."-".$next_yr;?></th>
                                </tr>
                              </table>
                          </div>
                        </div> <!-- /.container -->
                        </div> <!-- /profile_holder -->
                        <div  class="profile-status" >
                        
                          You are Registered.
                        </div> <!-- /profile_holder -->
                       
                
                    </div>
                    <?php

                    }
                    else{
                    ?>
                    <div class="container">
                        <h1>Student Profile</h1>

                        <div class="profile_holder">
                        <div class="container">
                          <div class="col-md-8">
                              <table style="width:100%">
                                <colgroup>
                                    <col width="100px"/>
                                    <col width="300px"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Fullname:</th>
                                  <th class="t-value"><?php echo strtoupper($l_name).", ".strtoupper($f_name)." ".ucfirst($m_name);?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">Gender:</th>
                                  <th class="t-value"><?php echo $gender;?></th>
                                </tr>
                                
                                
                               <!--  <tr>
                                  <th class="t-label">Major</th>
                                  <th class="t-value"></th>
                                </tr> -->
                              </table>
                          </div>
                          <div class="col-md-4">
                              <table>
                                <colgroup>
                                    <col width="200"/>
                                    <col width="300"/>
                                </colgroup>
                                <tr>
                                  <th class="t-label">Student No:</th>
                                  <th class="t-value"><?php echo $student_id;?></th>
                                </tr>
                                <tr>
                                  <th class="t-label">College</th>
                                  <th class="t-value"><?php echo "College of Science";?></th>
                                </tr>
                                
                              </table>
                          </div>
                        </div> <!-- /.container -->
                        </div> <!-- /profile_holder -->
                        <div class="profile-status" style="background-color:#CB1919;">
                        
                          You are not Registered for this Semester.
                        </div> <!-- /profile_holder -->
                       
                
                    </div>

                    <?php
                    }
                    ?>