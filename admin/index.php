<!DOCTYPE html>

<?php
include "../db/db.php";
include_once 'actions/misc_functions.php';
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
    $user_id = $_SESSION['kiosk']['user_id'];

}
else{
    header("location: login.php");
}   

$privileges = privileges($user_id);
if($privileges['priv_admin']){
   // header("location: index.php");
}
else if($privileges['priv_bull']){
    header("location: faculty_managepost.php");
}
else if($privileges['priv_cms1'] || $privileges['priv_cms2'] || $privileges['priv_cms3']){
    header("location: cms.php");
}
else if($privileges['priv_ois1'] || $privileges['priv_ois2']){
    header("location: unit_management.php");
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
        .time-label{
            text-align:center; 
            font-size:9px;
        }
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="index" ?>
    <?php include "admin_left_pane.php";?>
  
    <section id="banner" class="" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->



    <section>

        <div id="panel" style="padding:20px; height: 450px;;background-color:#E2E3FF;">
            <div style="width:500px;float:left;">
              <h1>Welcome Screen Message</h1>
              <form action="actions/update_message_board.php" method="POST">
                <?php
                $query_message = mysqli_query($db_con,"SELECT * FROM message_board_t ") or die(trigger_error(mysqli_error($db_con)));
                if(mysqli_num_rows($query_message)>0){
                    $row_message = mysqli_fetch_array($query_message);
                    $title = $row_message['title'];
                    $message = $row_message['message'];
                }
                else{
                    $title = "Title";
                    $message = "Message";
                }
                ?>
                <input name="title" type="text" id="title" style="width: 100%;display: block;font-size: 20px;padding:10px;" value="<?php echo $title;?>" >
                <textarea name="message" id="message" style="width: 100%;text-align: left; resize:none;"><?php echo $message;?></textarea>
              <input id="update" name="update" type="submit" value="UPDATE"  class="btn btn-primary"  style="width: 100%" />
              </form>
            </div><!--/.col-lg-6-->
        <!--<h5 style="color: red; margin-left:100px auto; font-size: 30px"><icon class="icon-exclamation-sign"></i> Under Development</h5>-->
            <div class="panel panel-default " style="display:inline-block;float: left;margin: 70px 30px;">
                  <div class="panel-heading">Max Session time:
                  </div>
                  <div class="panel-body" style="max-height:400px;overflow-y:auto">
                    <form onsubmit="return validate_time();" action="actions/set_max_time.php" method="POST">
                      <table >
                        <?php
                        $query_session = mysqli_query($db_con,"SELECT * FROM session_time_t ") or die(trigger_error(mysqli_error($db_con)));
                        if(mysqli_num_rows($query_session)>0){
                            $row_session = mysqli_fetch_array($query_session);
                            $time = $row_session['time_limit'];
                            $hours = ($time - ($time%3600)) / 3600 ;
                            $time = $time%3600;
                            $minutes = ($time-($time%60)) / 60 ;
                            $time = $time%60;
                            $seconds = $time;

                        }
                        ?>
                        <tr>
                          <th><input type="number" min="0" id="session_hour" name="session_hour" style="text-align:right; width:50px;" value="<?php echo $hours;?>" onkeypress="return isNumberKey(event)" /></th>
                          <th><input type="number" min="0" id="session_minute" name="session_minute" style="text-align:right; width:50px;" value="<?php echo $minutes;?>" onkeypress="return isNumberKey(event)" /></th>
                          <th><input type="number" min="0" id="session_second" name="session_second" style="text-align:right; width:50px;" value="<?php echo $seconds;?>" onkeypress="return isNumberKey(event)"/></th>
                        </tr>
                        <tr>
                          <th class="time-label">Hours</th>
                          <th class="time-label">Minutes</th>
                          <th class="time-label">Seconds</th>
                        </tr>
                      </table>
                      
                      <input id="submit" name="submit" class="btn btn-danger btn-block" style="margin:10px 0;" type="submit" value="SET" />
                    </form>
                  </div>
                </div>
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
                <h3 style="margin:0;">Message</h3>
            </div>
                
            <div class="modal-body" style="text-align:center">
                <h4 id="warning_content">Message goes here...</h4>
                
            </div>
            <div class="modal-footer">
        
                <button id="warning_btn" type="button" class="btn btn-danger hidden" data-dismiss="modal"> DELETE</button>
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
        $("#session_hour").change(function (){
            validate_time();
        });
        $("#session_minute").change(function (){
            validate_time();
        });
        $("#session_second").change(function (){
            validate_time();
        });
        function validate_time(){
            var hours = $("#session_hour").val();
            var minutes = $("#session_minute").val();
            var seconds = $("#session_second").val();
            if(hours<0 || hours==""){
                hours=0;
            }
            if(minutes<0 || minutes==""){
                minutes=0;
            }
            if(seconds<0 || seconds==""){
                seconds=0;
            }
            $("#session_hour").val(hours);
            $("#session_minute").val(minutes);
            $("#session_second").val(seconds);
        }
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        (function(){
            /*
            var left_panel = $("#left-panel"); 
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });
            */

        })();
        <?php
        if(isset($_SESSION['kiosk']['error'])){
            $status = $_SESSION['kiosk']['error'];
            if($status==1){
            ?>
                $("#msg_content").text("Successfully uploaded data.");
                $("#msg_modal").modal("toggle");
                
            <?php
            }
            else{
            ?>
                $("#warning_content").text("<?php echo $status; ?>");
                $("#warning_modal").modal("toggle");
            <?php
            }
            unset($_SESSION['kiosk']['error']);
        }


        ?>
    </script>
</body>
</html>