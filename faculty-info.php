<!DOCTYPE html>

<?php
include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
//include "actions/sched_functions.php";
include "actions/subject_functions.php";
//include "actions/load_schedule.php"; //to pre-load schedule on the time table.
include "actions/scheduling_functions.php";

$block_id = 1;
$faculty_id="2009-43346";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Faculty Info</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ours.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <header id="header" class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">                                      <!-- STYLE INSERTED HERE -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style=""><i class="icon-user "></i> Faculty Information</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right" style="">              <!-- STYLE INSERTED HERE -->
                    <li><h4><a href="menu.html"><i class="icon-th"></i> Home</a></h4></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <div id="left_pane" class="col-sm-3" style="border:1px solid #DADADA; height:100%; width:20%;">
        <img src="images/f3.png" style="width: 100%; padding: 20px; border-radius:100%;"/>
        <div class="container">
        <h3>Faculty Name</h3>
        <h5>Faculty Position</h5>
        <h5>Department</h5>
        </div>
    </div><!--/#main-->
    <div id="right_pane" style="width: 80%;float: right;padding: 10px 20px;">

        <table  width="100%" border="1" bordercolor="#DADADA" class="timetable" style="" cellpadding="0" cellspacing="0">
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
                        <tbody style="line-height: 20px">
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
                              $schedule_id = faculty_loaded($faculty_id, $start, $end, $loaded_day_ID,1); //1 is current semester
                              //$schedule_id = block_loaded($block_id, $start, $end, $loaded_day_ID,1); //1 is current semester

                              $loaded_class_id = get_class_id($schedule_id, 1);//to retrieve from actual table
                              
                              
                              if($loaded_class_id!=""){
                                  $slots = get_slots($schedule_id);
                                  if(is_first($schedule_id, $start)){
                                      ?> <th bgcolor="#dadada" class="loaded" rowspan="<?php echo $slots;?>"> <?php
                                      $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t 
                                                                                                   WHERE subject_t.subject_code=class_t.subject_code
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
                      
        </table>




    </div>
    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>