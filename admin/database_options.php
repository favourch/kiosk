<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['kiosk']['user_id'])){


}
else{
    header("location: login.php");
}


$link = mysql_connect('localhost','root', '');
$link_status = null;
if(!$link){
    $link_status = "bad";
}
else{
    $link_status = "good";
}

$db_selected = mysql_select_db('kiosk', $link);
$db_status = "";
if(!$db_selected){
    $db_status = "No Database Found.";
}
else{
    $db_status = "Connected";
}

//query to get the size of the database
if($db_selected){
    $query_size = mysql_query("SELECT table_schema AS database_name,
                                      round(sum(data_length + index_length)/1024/1024, 2) AS db_size 
                                 FROM information_schema.TABLES 
                                WHERE table_schema='kiosk' 
                             GROUP BY table_schema
                             ") or die(mysql_error());
    $row_size = mysql_fetch_assoc($query_size);
    $db_size = $row_size['db_size']." MB";



    //query to count number of rows of all tables in the database
    $total_rows = 0;
    $query_rows_query = mysql_query("SELECT concat('SELECT COUNT(*) as rows FROM ', table_name) as query 
                                 FROM information_schema.tables 
                                WHERE table_schema = 'kiosk'
                              ") or die(mysql_error());
    while($row_rows_query = mysql_fetch_assoc($query_rows_query)){

        $query_rows = mysql_query($row_rows_query['query']) or die(mysql_error());
        $row_rows = mysql_fetch_assoc($query_rows);
        $total_rows+=$row_rows['rows'];
    }

}
else{
  $total_rows="No Database Selected";
  $db_size="No Database Selected";
}

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
        .db-title{
          font-size: 25px;
          display: block;
        }
        .db-description{
          font-size: 11px;
          display: block;
          color: #727272;
        }
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="db_deploy" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section style="padding: 20px 0;">
        
        <div id="panel" style="height:auto;">
        <!-- border: 1px solid #dadada; -->
            <div class="row col-md-12">
            <div class="row container">
              <div class="col-md-6">

                <div class="panel panel-default " style="">
                  <div class="panel-heading">Main Database
                  </div>
                  <div class="panel-body" style="max-height:400px;overflow-y:auto">
                    <table class="table">
                      <thead>
                        <tr>
                          <td colspan="2"  style="padding-bottom:16px;">
                          <strong class="db-title">kiosk_db</strong>
                          <i class="db-description">This is the primary database used by the kiosk. All visible data from the kiosk are taken from here. Data does not go directly here but rather passes through a temporary database for processing.</i>
                          </td>
                        </tr>
                      </thead>
                      <tr>
                        <td>Database Status: </td>
                        <td id="status"><?php echo $db_status; ?></td>
                      </tr>
                      <tr>
                        <td>Used Space: </td>
                        <td id="deployment"><?php echo $db_size;?></td>
                      </tr>
                      <tr>
                        <td>Active: </td>
                        <td id="active"><?php echo ($total_rows)? "Yes":"No";?></td>
                      </tr>
                      
                      <tr class="hidden">
                        <td colspan="2" style="text-align: right;">
                          <a href="#" class="btn btn-success">Check</a>
                          <a href="#" class="btn btn-success">Deploy</a>
                          <a href="#" class="btn btn-danger">Uninstall</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div><!--.col-md-6-->
              
              <div class="col-md-6">
                <div class="panel panel-default " style="">
                  <div class="panel-heading">Reset Semester Data
                  </div>
                  <div class="panel-body" style="max-height:400px;overflow-y:auto">
                      <select name="sem" id="sem" class="form-control">
                        <?php 
                        $query_sem = mysql_query( "SELECT * FROM semester_t ORDER BY sem_id DESC") or die(trigger_error(mysql_error()));
                        while($row_sem = mysql_fetch_array($query_sem)){
                            $sem_id = $row_sem['sem_id'];
                            $ay_id = $row_sem['ay_no'];
                            $sem_no = $row_sem['sem_no'];
                            $query_ay = mysql_query("SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(trigger_error(mysql_error()));
                            $row_ay = mysql_fetch_array($query_ay);
                            $year_start = $row_ay['year_start'];
                            $year_end = $row_ay['year_end'];
                            switch($sem_no){
                                case 1: 
                                    $sem_no = "1st Semester";
                                    break;
                                case 2:
                                    $sem_no = "2nd Semester";
                                    break;
                                case 3:
                                    $sem_no = "Summer";
                                    break;
                                default : 
                                    $sem_no = "Undefined Semester";
                                    break;
                            }
                        ?>
                            <option value="<?php echo $sem_id; ?>"><?php echo $sem_no." ".$year_start." - ".$year_end;?></option>
                            
                        <?php } ?>
                        <option val="0">All Semester</option>

                      </select>
                      <input id="reset_btn" name="reset_btn" class="btn btn-danger btn-block" style="margin:10px 0;" type="button" value="RESET" />
                  </div>
                </div>
              </div><!--.col-md-6-->

              <div class="col-md-6 hidden">
                <div class="panel panel-default " style="">
                  <div class="panel-heading">Clean Database
                  </div>
                  <div class="panel-body" style="max-height:400px;overflow-y:auto">
                    <table class="table">
                      <thead>
                        <tr>
                          <td colspan="2"  style="padding-bottom:16px;">
                          <i class="db-description">Clean database from unused data.</i>
                          </td>
                        </tr>
                      </thead>
                      <tr>
                        <td>Subject Data: </td>
                        <td><a href="#" class="btn btn-success"> Clean </a></td>
                      </tr>
                      <tr>
                        <td>Student Block Data: </td>
                        <td><a href="#" class="btn btn-success"> Clean </a></td>
                      </tr>
 
                    </table>
                  </div>
                </div>
              </div><!--.col-md-6-->
            </div><!--.container-->
            </div><!--.col-md-12-->




        </div><!-- /#panel -->
    </section>

    
    <div id="msg_modal" class="modal fade " >
    <div class="modal-dialog" style="margin-top:100px;width:500px;">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="margin:0;">Message</h3>
            </div>
                
            <div class="modal-body" style="text-align:center">
                <h4 id="msg_content">Message goes here...</h4>
                
            </div>
            <div class="modal-footer">
        
                <button type="button" class="btn btn-success" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>

    <div id="warning_modal" class="modal fade " >
    <div class="modal-dialog" style="margin-top:100px;width:500px;">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="margin:0;">Warning</h3>
            </div>
                
            <div class="modal-body" style="text-align:left">
                <h4 id="warning_content">Message goes here...</h4>
                
            </div>
            <div class="modal-footer">
        
                <button id="warning_btn" type="button" class="btn btn-danger hidden" data-dismiss="modal"> RESET</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>
    

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script>
        $("#reset_btn").click(function(){
          var sem_id = $("#sem").val();
          var sem = "this semester?";
          var msg = "Are you sure you want to reset all data for "+sem;
          
          $("#warning_content").text(msg);
          $("#warning_modal").modal('toggle');

          $("#warning_btn").removeClass("hidden");
          $("#warning_btn").unbind("click");
          $("#warning_btn").click(function(){
            reset_semester(sem_id);
          });

        });
        function reset_semester(sem_id){
          $.ajax({
              url: "ajax/reset_sem_data.php",
              type: "GET",
              data: {sem_id:sem_id},
              async : false,
              success: function(data){
                  msg = data;

              }
                  
          });
          $("#msg_content").text(msg);
          $("#msg_modal").modal('toggle');
        }
        (function(){
            var left_panel = $("#left-panel"); 
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });

        })();
    </script>
</body>
</html>