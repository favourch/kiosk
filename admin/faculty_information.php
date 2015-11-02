<!DOCTYPE html>
<?php
include '../db/db.php';
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
  $account_no=$_SESSION['kiosk']['user_id'];

  $query_p_members=mysql_query("SELECT * FROM personnel_members_t, personnel_t WHERE personnel_members_t.account_no='$account_no'
                              AND personnel_members_t.personnel_id=personnel_t.personnel_id") or die(mysql_error());
  $row_p_members=mysql_fetch_assoc($query_p_members);
  $faculty_id=$row_p_members['personnel_id'];

}
else{

    header("location: login.php");
}
//echo $user_id;
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kiosk Admin</title>
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
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
   <style>
	
		.size {
			width: 80px; 
			height: 80px;
		}
		
		.sample>.s {
		display: none;	
		}
		
		.sample>.active{
			display: block;
		}
		
	</style>

</head><!--/head-->
<body>

  <?php
      include "actions/time_intervals.php"; //include the aray $times[]
      include "actions/class_functions.php";
      //include "actions/sched_functions.php";
      include "actions/subject_functions.php";
      //include "actions/load_schedule.php"; //to pre-load schedule on the time table.
      include "actions/scheduling_functions.php";
      //include "actions/misc_functions.php";
      ?>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="faculty_info" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="padding:0;">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section>

         <div id="panel" style="width: 79%;
								margin: 0 auto;
								margin-right: 20px;
								border: 1px solid #dadada;
								border-radius: 4px;
								height: 100%;">
    
                <!-- Nav tabs -->
        <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
             
					  <li class="active">
                        	<a id="schedule" href="#f_schedule" data-toggle="tab">Schedule</a>
            </li>
           	<li class="">
                        	<a id="load" href="#f_load" data-toggle="tab">Load</a>
            </li>
           
			
        </ul>
                
                
                <!-- Tab panes -->
          <div class="tab-content" style="height:90%;height: 86%;overflow-y: auto;">
        
          	<div class="tab-pane active" id="f_schedule">
                    <div class="container" style="padding-top: 10px;">
          
<?php
    $query_faculty = mysql_query(" SELECT * FROM personnel_t WHERE personnel_id='{$faculty_id}' ") or die(mysql_error());
    $row_faculty = mysql_fetch_assoc($query_faculty);

    $faculty_name       = $row_faculty['f_name']." ".$row_faculty['m_name']." ".$row_faculty['l_name'];
    $faculty_position   = $row_faculty['academic_rank'];
    $image   = $row_faculty['image'];
    $faculty_department = "College of Science";
    $sem_id = semester();


    $image = ($image!="")? $image:"f3.png";
    ?>
            <div id="timetable" class="compact-table">
                <table  width="100%" border="1" bordercolor="#DADADA" class="timetable" style="" cellpadding="0" cellspacing="0" style="line-height:">
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
                                  <tr bgcolor='#fff'>
                                            <th bgcolor='#EDEEFE' font="Arial"><font face='Arial, Helvetica, sans-serif' size='1'><?php echo date('h:i A',strtotime($times[$i]))?></th>
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
                 		</div>		
                 </div>    
				
		<div class="tab-pane" id="f_load">
             <div class="container" id="container" style="padding-top: 10px;">
              <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Subject Title</th>
                            <th>Block</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                           
                        </tr>
                    </tbody>
                </table>
               
   		</div>		
  </div>           		
  
</div>	<!--tab-contents-->			
                       
            
     		
        </div><!-- /#panel -->
    </section>

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
  
            //alert("semester load changed");
            var personnel_id = '<?php echo $faculty_id; ?>';
            var sem_id = <?php echo $sem_id ?>;
            //alert(personnel_id);
            var arr = {"sem_id":sem_id, "personnel_id":personnel_id};
            console.log("chaning semester to view load: personnel_id = "+personnel_id+", sem_id = "+sem_id);
            $.ajax({
                url: "ajax/load_load_list.php",
                type: "GET",
                data: arr,
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);

                    var len = details['data'].length;
                    var list = "";
                    if(len>0){
                        for(var i=0;i<len;i++){
                            list += "<tr>";
                            for(var j=0;j<3;j++){
                                list += "<th>";
                                list += details['data'][i][j];
                                list += "</th>";
                            }
                            list += "</th>";
                            
                        }
                    }
                    else{
                        list="<tr><th colspan='4'>Faculty has no Load for this Semester.</th></tr>";
                    }
                    $("#container .table tbody").html(list);

                }
            });
       
  </script>
</body>
</html>