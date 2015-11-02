<!DOCTYPE html>

<?php
	include '../db/db.php';
  session_start();
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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
        
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="other_settings" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section style="padding: 20px 0;">
        
        <div id="panel" style="width: 1060px;">
        <!-- border: 1px solid #dadada; -->
            <div class="" style="padding: 20px 300px 20px 300px;">
            <div class="panel panel-default " style="">
              		<div class="panel-heading">Semester 
              </div>
              <div class="panel-body" style="max-height:400px;overflow-y:auto">
            
                <table class="table table-bordered">
                  <thead>
                  		<th>Semester</th>
                        <th>Academic Year</th>
                        <th>Status</th>
                        <th>Action</th>
                  

                  </thead>
                  <?php
      					  $query_select=mysql_query("SELECT * FROM semester_t ");
      					  while ($row_select=mysql_fetch_assoc($query_select)) {
                    $sem_id=$row_select['sem_id'];
        					  $sem_no = $row_select['sem_no'];
                    $ay_id = $row_select['ay_no'];
                    $sem_status = ($row_select['sem_status'])? "active":"inactive";

                    $query_ay = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='$ay_id'") or die(trigger_error(mysql_error()));
                    $row_ay = mysql_fetch_assoc($query_ay);

                    $year_start = $row_ay['year_start'];
                    $year_end = $row_ay['year_end'];

                    if($sem_no==3){
                      $acad_yr = $year_end;
                    }
                    else{
                      $acad_yr = $year_start." - ".$year_end;
                    }
                    switch ($sem_no) {
                      case '1':
                        $sem_name = "1st Semester";
                        break;
                      case '2':
                        $sem_name = "2nd Semester";
                        break;
                      case '3':
                        $sem_name = "summer";
                        break;

                    }
        
					        ?> 
                 
                    <tr>
                      <td><?php echo $sem_name;?></td>
                      <td id="status"><center><?php echo $acad_yr ?></center></td>
                      <td> <center><?php echo $sem_status ?></center></td>
                      <?php 
                      if($sem_status=='active') { 
                      ?>
                      <td></td>
                      <?php 
                      } else { 
                      ?>
                       <td> <center><a onclick="set_active(<?php echo $sem_id ?>)" class="btn btn-xs btn-default">Set as Active</a></center></td>
                      <?php 
                      } 
                      ?>
                    </tr>
                  <?php 
                  } //while
                  $next_sem = ($sem_no%3)+1;
                  if(($sem_no+1)>3){
                    $next_syear = $year_end;
                    $next_eyear = $next_syear+1;
                  }
                  else{
                    $next_syear = $year_start;
                    $next_eyear = $year_end;
                  }

                  if($next_sem==3){
                    $acad_yr = $year_end;
                  }
                  else{
                    $acad_yr = $next_syear." - ".$next_eyear;
                  }
                  switch ($next_sem) {
                    case '1':
                      $sem_name = "1st Semester";
                      break;
                    case '2':
                      $sem_name = "2nd Semester";
                      break;
                    case '3':
                      $sem_name = "summer";
                      break;

                  }
                  ?>
                  <tr>
                    <td><?php echo $sem_name;?></td>
                    <td><?php echo $acad_yr;?></td>
                    <td colspan="2"><center><a class="btn btn-info" name="open" href="actions/open_sem_action.php?sem_no=<?php echo $next_sem ?>&&year_start=<?php echo $next_syear ?>&&year_end=<?php echo $next_eyear; ?>">Open</a></center></td>
                    
                  </tr>
                  
                </table>
              </div>
            </div>
            </div><!--.col-lg-6-->

        </div><!-- /#panel -->
    </section>

    

    

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script>
        (function(){
            var left_panel = $("#left-panel"); 
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });

        });

       function set_active(sem_id){
        //alert(sem_id);
          $.ajax({
            url:"actions/open_sem_action.php",
            method: "GET",
            data: {sem_id:sem_id, action: "set_active"},
            async: false,
            success: function(data){
               alert("success");
               window.location="open_sem.php";
            }

          })

        }
    </script>
</body>
</html>


<!-- 
  $acad_yr=$row_select['year_start'].'-'.$row_select['year_end'];
                    $acad_yr=($sem_no!=3)? $acad_yr:$row_select['year_start'];
                    $nxt_yr=$row_select['year_end']+1;
                    $sem_status=$row_select['sem_status'];
                    $sem_status=($sem_status==0)? 'inactive':'active';
                    
                    $query_max=mysql_query("SELECT MAX(sem_id) AS last_id FROM semester_t");
                    $row_max=mysql_fetch_assoc($query_max);
                    $last_id=$row_max['last_id'];

                    $query=mysql_query("SELECT * FROM semester_t, academic_year_t WHERE semester_t.sem_id='$last_id' 
                              AND semester_t.ay_no = academic_year_t.ay_id");
                    $row=mysql_fetch_assoc($query);
                    $academic_yr=$row['year_start'].'-'.$row['year_end'];
                    $next_year=$row['year_end']+1;
                    //echo $row['year_end'];
                    
                    //echo $row['sem_no'].'lalalal';
                    if($row['sem_no']==1) {
                      $semester_no=$row['sem_no']+1;
                      $year_start=$row['year_end'];
                      $year_end=$row['year_end']+1;
                    } else if ($row['sem_no']==2) {
                      $semester_no=$row['sem_no']+1;  
                      $year_start=$row['year_end'];
                      $year_end=$row['year_end'];
                      
                    } else if ($row['sem_no']==3) {
                      $semester_no=$row['sem_no']-2;  
                      $year_start=$row['year_end'];
                      $year_end=$row['year_end']+1;
                      
                    }
 -->