<!DOCTYPE html>



<?php
include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
//include "actions/sched_functions.php";
include "actions/subject_functions.php";
//include "actions/load_schedule.php"; //to pre-load schedule on the time table.
include "actions/scheduling_functions.php";
include "actions/misc_functions.php";
include "db/db.php";

$block_id = 1;
$sem_id = semester();
$faculty_id=$_GET['p_id'];;

if(isset($faculty_id)){
    $query_faculty = mysql_query(" SELECT * FROM personnel_t WHERE personnel_id='{$faculty_id}' ") or die(mysql_error());
    $row_faculty = mysql_fetch_assoc($query_faculty);

    $faculty_name       = $row_faculty['f_name']." ".$row_faculty['m_name']." ".$row_faculty['l_name'];
    $faculty_position   = $row_faculty['academic_rank'];
    $image   = $row_faculty['image'];
    $faculty_department = "College of Science";

    $image = ($image!="")? $image:"f3.png";
}


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ours.css" rel="stylesheet">
    <link href="css/schedules.css" rel="stylesheet">
    <link href="css/timetables.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
        #schedule_details th,
        #schedule_details>tr>th{
          line-height: 20px;
        }
        #timetable > table > tbody > tr > th > font{
          top: -13px;
          position: relative;
        }
    </style>

</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->

    <?php  include "resources/navbar.php";?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-calendar" ></i> Faculty Schedule</h3>
                <h5>Semester : <?php echo sem_name(semester());?></h5>
            </div>
        </div>
    </section><!--/#services-->

    <div id="viewport" class="hidden" style="margin:20px; background-color:#FFF; height:460px; border:1px solid #DADADA; padding: 10px;">
        <h1>This is it</h1>
        <i class="icon-linux "></i>
    </div><!--/#main-->

    <section class="" style="padding-bottom:0; padding-top:20px; height:90%">
    
      
        <div id="panel" class="panel panel-default " style="">

          <div class="panel-body" style="padding:0;">
            <div id="left_pane" class="col-sm-3" style="">
                <img class="picture" src="admin/images/personnel_image/<?php echo $image; ?>" style=""/>
                <div id="details" class="container">
                    <h3><?php echo $faculty_name; ?></h3>
                    <h5><?php echo $faculty_position; ?></h5>
                    <h5><?php echo $faculty_department; ?></h5>
                    <button id="expand-button" onclick="toggleSize()">Expand</button>
                </div>
            </div><!--/#left_pane-->
            <div id="right_pane" style="height:95%;">
                <table style="width:100%">
                  <colgroup>
                      <col width="50"/>
                      <col width="100"/>
                      <col width="100"/>
                      <col width="100"/>
                      <col width="100"/>
                      <col width="100"/>
                  </colgroup>
                  <thead><tr bgcolor="#006699" style="color:white">
                      <th class="timetable_header">TIME</th>
                      <?php
                      $day_count = count($day_array);
                      for($i=0;$i<$day_count;$i++){ ?>
                          <th class="timetable_header" style=''><?php echo ucfirst($day_array[$i])?></th>
                      <?php
                      }
                      ?>
                  </tr></thead>
                </table>
                </table>
                <div id="timetable" class="compact-table" style="border-bottom:1px solid #dadada;">
                <table  width="100%" border="1" bordercolor="#DADADA" class="timetable" style="" cellpadding="0" cellspacing="0" style="line-height:">
                                <colgroup>
                                    <col width="50"/>
                                    <col width="100"/>
                                    <col width="100"/>
                                    <col width="100"/>
                                    <col width="100"/>
                                    <col width="100"/>
                                </colgroup>
                               <!--  <thead><tr bgcolor="#006699" style="color:white">
                                    <th width="50">TIME</th>
                                    <?php
                                    $day_count = count($day_array);
                                    for($i=0;$i<$day_count;$i++){ ?>
                                        <th class="timetable_header" style=''><?php echo $day_array[$i]?></th>
                                    <?php
                                    }
                                    ?>
                                </tr></thead> -->
                 
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
                                  <tr bgcolor='#fff'>
                                            <th bgcolor='#EDEEFE' font="Arial"><font face='Arial, Helvetica, sans-serif' size='1'><?php echo ($i>0)? date('h:i A',strtotime($times[$i])):"-"; ?></th>
                                  <?php
                                  
                                  for($j=0;$j<$day_count;$j++){
                                      $loaded_day_ID =$j+1;
                                      $start = $times[$i];
                                      $end = $times[$i+1];

                                      $schedule_id = faculty_loaded($faculty_id, $start, $end, $loaded_day_ID,$sem_id); //1 is current semester
                                      //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester

                                     
                                      $loaded_class_id = get_class_id($schedule_id, 1);//to retrieve from actual table
                                      
                                      
                                      if($loaded_class_id!=""){
                                          $slots = get_slots($schedule_id);
                                          if(is_first($schedule_id, $start)){
                                              ?> <th bgcolor="#A4B4FF" class="loaded" rowspan="<?php echo $slots;?>" onclick="show_ticket(<?php echo $schedule_id; ?>)"> <?php
                                              $query_subject = mysql_query("SELECT subject_t.subject_code FROM subject_t, class_t 
                                                                                                           WHERE subject_t.subject_id=class_t.subject_id
                                                                                                           AND class_t.class_id=$loaded_class_id") or die(mysql_error());
                                              $row_subject = mysql_fetch_assoc($query_subject);
                                              echo "<small>".strtoupper($row_subject['subject_code'])."</small>";
                                              //echo $loaded_day_ID;
                                              ?></th><?php
                                           }
                                           else{

                                           }
                                           ?> 
                                      <?php
                                      }
                                      else {?>
                                             <th><?php ?></th>
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
          </div><!--/.panel-body-->
        </div><!-- /#panel -->

      
      
    </section>
    

     <!-- MODAL for Schedule Ticket -->
    <div id="ticket_modal" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width:700px;height:500px;margin-top:100px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
              <img class="picture" src="admin/images/personnel_image/<?php echo $image;?>" style="margin-top:45px;"/> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="padding:0;margin:0;" >Schedule Ticket</h3>
            
                
                <div class="modal-body">
                      <h4><?php echo $faculty_name; ?></h4>
                      <h6><?php echo $faculty_position; ?></h6>
                      <h6><?php echo $faculty_department; ?></h6>
                      <hr>
                      <table id="schedule_details">
                        <tr>
                          <th width="150px">Course Block</th>
                          <th id="ticket-block">BSIT 3c</th>
                        </tr>
                        <tr>
                          <th>Course Title</th>
                          <th id="ticket-subject_title">Introduction to Computer Science</th>
                        </tr>
                        <tr>
                          <th>Course Code</th>
                          <th id="ticket-subject_code">CS 11</th>
                        </tr>
                        <tr>
                          <th>Day</th>
                          <th id="ticket-day">Monday</th>
                        </tr>
                        <tr>
                          <th>Time</th>
                          <th id="ticket-time">7:00AM - 8:00AM</th>
                        </tr>
                        <tr>
                          <th>ROOM</th>
                          <th id="ticket-room">CSB2 201</th>
                        </tr>
                      </table>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                </div>
            </div>
                

        </div>
    </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
        function goBack(){
            window.history.go(-2);
        }
        function toggleSize(){
            var timetable = $("#timetable");
            timetable.toggleClass("compact-table");
        }
        function show_ticket(schedule_id){
            console.log("Showing ticket with schedule_id : "+schedule_id);
            $.ajax({
                url: "ajax/schedule_details.php",
                type: "GET",
                data: {schedule_id:schedule_id},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    var block = details['block'];
                    var subject_title = details['subject_title'];
                    var subject_code = details['subject_code'];
                    var day = details['day'];
                    var time = details['start_time']+" - "+details['end_time'];
                    var room = details['room'];

                    $("#ticket-block").text(block);
                    $("#ticket-subject_title").text(subject_title);
                    $("#ticket-subject_code").text(subject_code);
                    $("#ticket-day").text(day);
                    $("#ticket-time").text(time);
                    $("#ticket-room").text(room);
                }
            });

            $("#ticket_modal").modal("toggle");
        }
    </script>

</body>
</html>