 <?php
include "../db/db.php";
include "../actions/misc_functions.php";
include "../actions/time_intervals.php"; //include the aray $times[]
include "../actions/class_functions.php";
// include "../actions/subject_functions.php";
include "../actions/scheduling_functions.php";

$sem = semester();
$student_id = $_GET['student_id'];

$query_reg = mysql_query("SELECT reg_no FROM student_registration_t WHERE student_id='{$student_id}' AND sem_id='{$sem}'") or die("query reg line 32: ".trigger_error(mysql_error()));
$row_reg = mysql_fetch_assoc($query_reg);
$reg_no = $row_reg['reg_no'];

if($reg_no==""){
  ?>
  <div>
    <h1>You are not registered.</h1>
  </div>
  <?php
  return ;
}

 ?>
                        <div id="left_pane" class="col-sm-3" style="height:100%;padding:0;">
                          <div style="padding:20px; box-shadow: 0 5px 30px -20px; border-bottom:1px solid #ddd;">
                           <!--  <button class="btn btn-default btn-block" onclick="loadStudentTimetable(<?php echo $reg_no;?>)">View Own Schedule</button> -->
                            <h3 style="margin:0;">Classes </h3>
                          </div>
                          <div class="btn-group-vertical" style="max-height:80%; overflow-y:auto;padding:10px;width:100%;border-bottom:1px solid #ddd;">
                            <?php 
                            $query_class = mysql_query("SELECT * FROM class_t, student_load_t 
                                                                WHERE class_t.class_id=student_load_t.class_id
                                                                  AND student_load_t.reg_no = '{$reg_no}'
                                                        ") or die(trigger_error(trigger_error(mysql_error())));
                            while($row_class = mysql_fetch_assoc($query_class)){
                            	$class_id = $row_class['class_id'];
                                $subject_id = $row_class['subject_id'];

                                $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_id='{$subject_id}'") or die(trigger_error(trigger_error(mysql_error())));
                                $row_subject = mysql_fetch_assoc($query_subject);
                                $subject_code = $row_subject['subject_code'];
                                $subject_title = $row_subject['subject_title'];


                            ?>
                        	    <div class="btn btn-default btn-block disabled " style="text-align: left;padding: 5px;white-space: normal;padding-left:20px;">
                                    <h5 style="margin: 5px 0;font-weight: bold;;"><?php echo $subject_code;?></h5>
                                    <p style="font-size:12px;"><?php echo $subject_title;?></p>
                                </div>
                            <?php 
                            } 
                            ?>
                          </div><!--.btn-group-->
                            <button id="expand-button" class="hidden" onclick="toggleSize()">Expand</button>
                        
                        </div><!--/#left_pane-->

 <!--     ============================             SCHEDULING TIMETABLE CODES              =================================      -->                       
                        <div id="right_pane" style="">
                            
                            <div id="timetable" class="compact-table">
                            <table  id="shcedule_timetable" width="100%" border="1" bordercolor="#DADADA" class="timetable" style="" cellpadding="0" cellspacing="0" style="line-height:">
                                                <colgroup>
                                                <col width="50"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                            </colgroup>
                                            <thead><tr bgcolor="#006699" style="color:white">
                                                <th width="50" class="timetable_header">TIME</th>
                                                <?php
                                                $day_count = count($day_array);
                                                for($i=0;$i<$day_count;$i++){ ?>
                                                    <th class="timetable_header" style=''><?php echo $day_array[$i]?></th>
                                                <?php
                                                }
                                                ?>
                                            </tr></thead>
                             
                             <!-- insert another table here -->
                                            <colgroup>
                                                <col width="50"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                                <col width="100"/>
                                            </colgroup>
                                            <tbody class="" style="">
                                            
                                          <?php
                                          // $i === time interval
                                          // $j === sections
                                          
                                          for($i=0;$i<count($times)-1;$i++){ ?>
                                              <tr bgcolor='#F2F2F2'>
                                                        <th bgcolor='#EDEEFE' font="Arial"><font face='Arial, Helvetica, sans-serif' size='1'><?php echo date('h:i A',strtotime($times[$i]))?></th>
                                              <?php
                                              
                                              for($j=0;$j<$day_count;$j++){
                                                  $loaded_day_ID =$j+1;
                                                  $start = $times[$i];
                                                  $end = $times[$i+1];
                                                  $schedule_id = student_loaded($reg_no, $start, $end, $loaded_day_ID,1); //1 is current semester
                                                  //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester
                                                  //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester

                                                  $loaded_class_id = get_class_id($schedule_id, 1);//to retrieve from actual table
                                                  
                                                  
                                                  if($loaded_class_id!=""){
                                                      $slots = get_slots($schedule_id);
                                                      if(is_first($schedule_id, $start)){
                                                          ?> <th bgcolor="#dadada" class="loaded" rowspan="<?php echo $slots;?>" onclick="show_ticket(<?php echo $schedule_id;?>)"> <?php
                                                          $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t 
                                                                                                                       WHERE subject_t.subject_id=class_t.subject_id
                                                                                                                       AND class_t.class_id=$loaded_class_id") or die(trigger_error(trigger_error(mysql_error())));
                                                          $row_subject = mysql_fetch_assoc($query_subject);
                                                          echo "<small>".$row_subject['subject_title']."</small>";
                                                          ?></th><?php
                                                       }
                                                       ?> 
                                                  <?php
                                                  }
                                                  else {?>
                                                         <th></th>
                                                  <?php
                                                  }
                                              }
                                              echo "</tr>";
                                          }
                                          ?>
                                         
                                          </tbody>
                                      
                            </table>

                            </div> <!-- /.scrolable-->




                        </div><!-- /#right_pane-->

