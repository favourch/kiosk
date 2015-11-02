<?php
//AJAX return shcedule timetable for block with $block_id

	$student_id = $_GET['student_id'];

    
	include "../db/db.php";
	include "../actions/time_intervals.php"; //include the aray $times[]
	include "../actions/scheduling_functions.php";
	include "../actions/class_functions.php";
    include "../actions/misc_functions.php";
?>
        <colgroup>
            <col width="50"/>
            <col width="100"/>
            <col width="100"/>
            <col width="100"/>
            <col width="100"/>
            <col width="100"/>
        </colgroup>
        <thead><tr bgcolor="#006699" style="color:white">
            <th width="50">TIME</th>
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
                $schedule_id = student_loaded($student_id, $start, $end, $loaded_day_ID,semester()); //1 is current semester
                //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester
                //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester

                $loaded_class_id = get_class_id($schedule_id, 1);//to retrieve from actual table
              
              
                if($loaded_class_id!=""){
                    $slots = get_slots($schedule_id);
                    if(is_first($schedule_id, $start)){
                        ?> <th bgcolor="#dadada" class="loaded" rowspan="<?php echo $slots;?>"  onclick="show_ticket(<?php echo $schedule_id;?>)"> <?php
                        $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t 
                                                                                     WHERE subject_t.subject_id=class_t.subject_id
                                                                                     AND class_t.class_id=$loaded_class_id") or die(mysql_error());
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
     


