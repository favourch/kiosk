<?php 
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    } 
    ?>

    <?php
    include "../actions/misc_functions.php"

    ?>




    <header id="header" class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner" style="height:60px">
        <div class="">
            <div class="navbar-header" style="width:100%">
            <!--
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            _--> <?php ?>
                <h2 class="navigation-controler" >
                    <a class="" href="#" onclick="goBack()" ><i class="icon-chevron-left "></i></a>
                    <a class="" href="menu.html"><i class="icon-th "></i></a>


                    <div class="btn-group" style="vertical-align:top;">
                      <a href="#" onclick="" data-toggle="dropdown"><i class="icon-info-sign "></i></a>
                      <div class="dropdown-menu" role="menu" style="width:300px;">
                        <div style=" color:#d3d3d3;margin:20px;" >
                            <i class="icon-info" style="font-size:30px;padding:0 10%; "></i>
                            Info faculty schedule
                        </div>
                        <div class="divider"></div>
                        <div style="max-height:300px;overflow-y:scroll;">
                            <p class="dropdown-info" style="">
                                This window displays the name of the faculty and his/hers respective department and the faculty's schedule timetable. Click the expand button to expand the timetable. click on the cell to view the schedule ticket which contains the details of the specific schedule.
                            </p>
                            <p class="dropdown-info" style="">
                                This window displays the name of the faculty and his/hers respective department and the faculty's schedule timetable. Click the expand button to expand the timetable. click on the cell to view the schedule ticket which contains the details of the specific schedule.
                            </p>
                            <p class="dropdown-info" style="">
                                This window displays the name of the faculty and his/hers respective department and the faculty's schedule timetable. Click the expand button to expand the timetable. click on the cell to view the schedule ticket which contains the details of the specific schedule.
                            </p>
                            <p class="dropdown-info" style="">
                                This window displays the name of the faculty and his/hers respective department and the faculty's schedule timetable. Click the expand button to expand the timetable. click on the cell to view the schedule ticket which contains the details of the specific schedule.
                            </p>
                        </div>
                      </div>
                    </div>

                    <div class="btn-group pull-right" style="vertical-align:top;">
                      
                      <a href="#" onclick="" class="menu-toggle"><i class="icon-list"></i></a>
                      <!--
                      <a href="#" onclick="" data-toggle="dropdown"><i class="icon-list"></i></a>
                      
                      <ul class="dropdown-menu slide" role="menu" style="right:-15px">
                        <?php include "resources/dropdown-menu-items.php"; ?>
                      </ul>
                      -->

                    </div>
                    <?php if(isset($_SESSION['kiosk']['student_id'])){ ?>
                      <?php
                        $student_id = $_SESSION['kiosk']['student_id'];
                        $query_student = mysql_query("SELECT * FROM student_t WHERE student_id='{$student_id}'") or die(mysql_error());
                        $row_student = mysql_fetch_assoc($query_student);

                        $query_registration = mysql_query("SELECT * FROM student_registration_t WHERE student_id='{$student_id}' ORDER BY reg_date") or die(mysql_error());
                        $count_registration = mysql_num_rows($query_registration) - 1;

                        $query_registration = mysql_query("SELECT * FROM student_registration_t WHERE student_id='{$student_id}' ORDER BY reg_date ASC LIMIT $count_registration,1") or die(mysql_error());
                        $row_registration = mysql_fetch_assoc($query_registration);






                        $year_level    = $row_registration['year_level'];
                        $course_code   = $row_registration['course_code'];
                        $sem_id        = $row_registration['sem_id'];

                        $query_course = mysql_query("SELECT * FROM course_t WHERE course_code='{$course_code}'") or die(mysql_error());
                        $row_course   = mysql_fetch_assoc($query_course);

                        $course_title = $row_course['course_title'];

                        $query_sem = mysql_query("SELECT * FROM semester_t WHERE sem_id='{$sem_id}'") or die(mysql_error());
                        $row_sem = mysql_fetch_assoc($query_sem);

                        $sem_no = $row_sem['sem_no'];
                        $ay_id = $row_sem['ay_no'];

                        $query_year = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(mysql_error());
                        $row_year = mysql_fetch_assoc($query_year);

                        $year_start = $row_year['year_start'];
                        $year_end   = $row_year['year_end'];
                        /*
                        $block_id = $row_registration['block_id'];

                        $query_block = mysql_query("SELECT  course_t.course_code as course_code,
                                                            course_t.course_title as course_title,
                                                            semester_t.sem_no as sem_no,
                                                            academic_year_t.year_start as year_start,
                                                            academic_year_t.year_end as year_end,
                                                            student_block_t.block_name as block_name,
                                                            student_block_t.year_level as year_level
                                                    FROM
                                                            course_t,
                                                            semester_t,
                                                            academic_year_t,
                                                            student_block_t
                                                    WHERE
                                                            student_block_t.block_id = '{$block_id}' AND
                                                            course_t.course_code = student_block_t.course_code AND
                                                            semester_t.sem_no = student_block_t.sem_id AND
                                                            academic_year_t.ay_id = semester_t.ay_no

                                                    ") or die(mysql_error());
                        $row_block = mysql_fetch_assoc($query_block);

                        $course_code   = $row_block['course_code'];
                        $course_title  = $row_block['course_title'];
                        $sem_no        = $row_block['sem_no'];
                        $year_start    = $row_block['year_start'];
                        $year_end      = $row_block['year_end'];
                        $block_name    = $row_block['block_name'];
                        $year_level    = $row_block['year_level'];
                        */
                      ?>
                        <!-- visible when session is started (for handling log out) -->
                        <div class="btn-group pull-right" style="vertical-align:top;">
                          <a href="#" onclick="" data-toggle="dropdown"><?php echo $row_student['f_name'];?></a>
                          <div class="dropdown-menu" role="menu" style="width:300px;">
                            <div style=" color:#d3d3d3;margin:20px;" >
                                <i class="icon-user" style="font-size:30px;padding:0 10%; "></i>
                                Student Info
                            </div>
                            <div class="divider"></div>
                            <div style="max-height:300px;overflow-y:scroll;">
                                <p class="dropdown-info">
                                <?php echo $row_student['student_id']; ?></br>
                                <?php echo $row_student['f_name']; ?>
                                <?php echo $row_student['l_name']; ?></br>
                                <?php echo print_level($year_level);   ?></br>
                                <?php echo $course_title; ?></br>
                                <?php //echo $sem_no;       ?></br>
                                <?php echo $course_code." ";  ?></br>
                                <?php echo "A.Y. ".$year_start." - ".$year_end;   ?>
                                
                                </p>
                            </div>
                            <div class="divider"></div>
                            <div class="">
                                <a href="actions/logout.php" class="btn btn-danger">Log Out</a>

                            </div>

                          </div>
                        </div>
                    <?php } ?>
                </h2>
                
            </div>
            
               
          
        </div>
    </header><!--/header-->

    <?php include "../resources/menu-panel.php"; ?>

    <script src="js/jquery.js"></script>
    <script>
        $(".menu-toggle").click(function(){
            $("#menu-panel").toggleClass("show");
        });
    </script>