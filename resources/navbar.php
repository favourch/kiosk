<?php 
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    } 
    ?>

    <?php
    include_once "actions/misc_functions.php"

    ?>
    <?php 
    $query_session = mysqli_query($db_con,"SELECT * FROM session_time_t WHERE id='1'") or die(trigger_error(mysqli_error($db_con)));
    if(mysqli_num_rows($query_session)>0){
        $row_session = mysqli_fetch_array($query_session);
        $time = $row_session['time_limit'];
        
    }
    else{
        $time = 60;
    }
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
                    

<!--------------------------------------- DISPLAY CLOCK ------------------------------------------------------>
                    <div id="clock" style="font-size:20px;font-size: 20px;font-weight: 100;width: 96%;text-align: center;margin: 0 auto;position: fixed; top: 12px;">
                        <div id="clock_time" style="font-size:18px;"></div>
                        <div id="clock_date" style="font-size:12px;"></div>
                    </div><!--#clock-->

                    <a class="" href="#" onclick="returnPage()" ><i class="icon-chevron-left "></i></a>
                    <a class="" href="index.php"><i class="icon-home "></i></a>
                    <div class="btn-group" style="vertical-align:top;">
                      <a href="#" onclick="" data-toggle="dropdown"><i class="icon-info-sign "></i></a>
                      <div class="dropdown-menu" role="menu" style="width:300px;">
                        <div style=" color:#d3d3d3;margin:20px;" >
                            <i class="icon-info" style="font-size:30px;padding:0 10%; "></i>
                            Kiosk Help
                        </div>
                        <div class="divider"></div>
                        <div style="max-height:300px;overflow-y:scroll;">
                            <p class="dropdown-info" style="">
                            Welcome to the BUCS Kiosk! Here you can avail our services in viewing information of various elements in the college. Click the <i class="icon-home "></i> home button to return to the main menu </p>
                            <p class="dropdown-info" style="">
                             Or toggle the menu panel (<i class="icon-backward "></i> )at the right side of the screen.
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
                        $query_student = mysql_query("SELECT * FROM student_t WHERE student_id='{$student_id}'") or die(trigger_error(mysql_error()));
                        $row_student = mysql_fetch_assoc($query_student);
                        $sem_id = semester();

                        $query_registration = mysql_query("SELECT * FROM student_registration_t WHERE student_id='{$student_id}' AND sem_id='{$sem_id}' ") or die(trigger_error(mysql_error()));
                        if(mysql_num_rows($query_registration)>0){

                            // //$count_registration = ($count_registration<1)? 1:$count_registration;
                            // $query_registration = mysql_query("SELECT * FROM student_registration_t WHERE student_id='{$student_id}' ORDER BY reg_date ASC LIMIT $count_registration,1") or die(trigger_error(mysql_error()));
                            $row_registration = mysql_fetch_assoc($query_registration);






                            $year_level    = $row_registration['year_level'];
                            $course_code   = $row_registration['course_code'];
                            //$sem_id        = $row_registration['sem_id'];

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
                        }
                        else{
                            $year_level    = "You are currently not registered.";
                            $course_code   = "";
                            //$sem_id        = $row_registration['sem_id'];

                            $course_title = "You are currently not registered.";

                            $sem_no = "";
                            $ay_id = "";

                            $year_start = "";
                            $year_end   = "";
                        }
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
                          <a href="#" onclick="" data-toggle="dropdown" style="padding-right:20px;font-size:22px;"><?php echo $row_student['f_name'];?> <span class="glyphicon glyphicon-user"></span></a>
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
                                <?php echo $course_code." ";  ?></br>
                                <?php //echo "A.Y. ".$year_start." - ".$year_end;   ?>
                                
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

    <?php include "resources/menu-panel.php"; ?>


    <script src="js/jquery.js"></script>

    <!-- scripts for sound effects -->
    <script src="js/ion.sound-master/js/ion.sound.min.js"></script>



    <script>
        $(".menu-toggle").click(function(){
            $("#menu-panel").toggleClass("show");
            $("#open-menu-icon").toggleClass("rotate-icon");

        });
    </script>
    <script>
        startTime();
        var idleTime = 0;
        $(document).ready(function(){
            var idleInterval = setInterval(timerIncrement, 1000);
            $(this).mousemove(function(e){
                idleTime = 0;
            });
            $(this).keypress(function(e){
                idleTime = 0;
            });
            $(this).on("touchmove",function(e){
                idleTime = 0;
            });
        });
        function timerIncrement(){
            //console.log("IDLE time = "+idleTime);
            idleTime = idleTime + 1;
            if(idleTime > <?php echo $time;?>){ //set timeout here 
                console.log("redirecting.")
                window.location = "actions/auto_logout.php";
            }
        }
        function startTime() {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            var dd = "AM";
            if (h >= 12) {
                h = h-12;
                dd = "PM";
            }
            if (h == 0) {
                h = 12;
            }


            year = today.getFullYear();
            month = today.getMonth();
            months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
            d = today.getDate();
            day = today.getDay();
            days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');



            m = checkTime(m);
            s = checkTime(s);
            $("#clock_time").text( h+":"+m+":"+s+" "+dd);//+":"+s
            $("#clock_date").text( months[month]+" "+d+", "+year);
            var t = setTimeout(function(){startTime()},500);
        }

        function checkTime(i) {
            if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
        function returnPage(){
            setTimeout(function(){
                window.history.go(-2);
            },500);
        }


        ion.sound({
            sounds: [
                {name: "snap"},
                {name: "branch_break"},
                {name: "tap"},
                {name: "water_droplet_3"},
                {name: "pop_cork"}
                
            ],
            volume: 0.5,
            path: "js/ion.sound-master/sounds/",
            preload: true
        });
        $("a").click(function(e){
            var url = $(this).attr('href');
            e.preventDefault();
            ion.sound.play("water_droplet_3");
            setTimeout(function(){
                window.location = url;
            },200);
            //alert("this");
        });
        $("button").onclick = function(){
            ion.sound.play("water_droplet_3");
            console.log("button pressed");
            setTimeout(function(){
            },200);
        };

    </script>