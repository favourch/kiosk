<!DOCTYPE html>

<?php
include '../db/db.php';
session_start();
if(isset($_SESSION['kiosk']['user_id'])){


}
else{
    header("location: login.php");
}

$class_id = $_GET['class_id'];

$query_class = mysqli_query($db_con,"SELECT * FROM class_t WHERE class_id='$class_id'") or die(trigger_error(mysql_error()));
$row_class = mysqli_fetch_array($query_class);
$subject_id = $row_class["subject_id"];
$block_id = $row_class["block_id"];
$faculty_id = $row_class["faculty_id"];

$query_subject = mysqli_query($db_con, "SELECT subject_code FROM subject_t WHERE subject_id='{$subject_id}'") or die(trigger_error(mysqli_error($db_con)));
$row_subject = mysqli_fetch_array($query_subject);
$subject_code = $row_subject["subject_code"];

$query_block = mysqli_query($db_con, "SELECT block_name FROM student_block_t WHERE block_id='{$block_id}'") or die(trigger_error(mysqli_error($db_con)));
$row_block = mysqli_fetch_array($query_block);
$block_name = $row_block["block_name"];

$query_faculty = mysqli_query($db_con, "SELECT f_name, m_name, l_name FROM personnel_t WHERE personnel_id='{$faculty_id}'") or die(trigger_error(mysqli_error($db_con)));
$row_faculty = mysqli_fetch_array($query_faculty);
$faculty = $row_faculty["f_name"]." ".$row_faculty["l_name"];


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
<body style="padding-top: 0px;">

 				<div class="panel panel-default"style="padding:0px;">
 							<div class="modal-header">
 							<h3><span class="glyphicon glyphicon-upload"></span> Upload Class List</h3>
 							</div>
                    		<div class="modal-body">
                    		<table style="width:80%;margin:30px auto;">
                    		  <tr>
                                <th>Block</th>
                                <th><input type="text" class="col-sm-7 form-control" id="block" name="block" value="<?php echo $block_name;?>" disabled/></th>
                              </tr>
                              <tr>
                                <th>Subject</th>
                                <th><input type="text" class="col-sm-7 form-control" id="subject" name="subject" value="<?php echo $subject_code;?>" disabled/></th>
                              </tr>
                              <tr>
                                <th>Faculty</th>
                                <th><input type="text" class="col-sm-7 form-control" id="faculty" name="faculty" value="<?php echo $faculty;?>" disabled/></th>
                              </tr>
                            </table>
                            <hr>
                    		<form id="student_load" onsubmit="return validate()" role="form" action="excel_upload/upload_student_load.php" style="width:50%;margin:0 auto;" method="post" enctype="multipart/form-data">
                              <input type="hidden" id="class_id" name="class_id" value="<?php echo $class_id;?>";/>
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="student_load_file" name="student_load_file">
                              </div>
                              
                                <input type="submit" name="submit_student_load" class="btn btn-success btn-block" value="Upload" />
                                <hr>
                                <div style="text-align:center;margin:20px;">
                                    <a href="excel_upload/download_student_load_template.php" class="btn btn-default btn-xs"><span class="glyphicon icon-download"></span> Download Template</a>
                                </div>
                            </form>

                            </div>
                </div>



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
</body>
		 <script src="js/jquery.js"></script>
         <script src="js/bootstrap.min.js"></script>
		 <script type="text/javascript">
		 	function validate(){
	            valid = true;
	            var str = $("#student_load_file").val();
	            var msg = "";
	            if(str==""){
	                valid = false;
	                msg = "No file chosen.";
	            }
	            else if (!str.match(".xlsx$")) {
	                valid = false;
	                msg = "File type invalid.";
	            }
	            if(valid==false){
	                $("#warning_content").text(msg);
	                $("#warning_modal").modal("toggle");
	            }
	            return valid;
	        }
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
      
</html>