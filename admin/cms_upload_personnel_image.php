<!DOCTYPE html>

<?php
include '../db/db.php';
session_start();
if(isset($_SESSION['kiosk']['user_id'])){


}
else{
    header("location: login.php");
}

$personnel_id = $_GET['personnel_id'];

$query_personnel = mysqli_query($db_con,"SELECT * FROM personnel_t WHERE personnel_id='$personnel_id'") or die(trigger_error(mysql_error()));
$row_personnel = mysqli_fetch_array($query_personnel);
$f_name = $row_personnel["f_name"];
$m_name = $row_personnel["m_name"];
$l_name = $row_personnel["l_name"];

$name = $f_name." ".$m_name." ".$l_name;


$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
$query_personnel = mysqli_query($temp_db_con, "SELECT * FROM personnel_t WHERE personnel_id='$personnel_id'") or die("Error at cms_panel.php : line 141 :: ".mysql_error());
$row_personnel = mysqli_fetch_array($query_personnel);
$image = $row_personnel["image"];
$image = ($image!="")? $image:"f3.png";
        


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
 							<h3><span class="glyphicon glyphicon-upload"></span> Upload Faculty Image</h3>
 							</div>
                    		<div class="modal-body" style="text-align:center">
    
                            <img style="width:300px;height:300px;" src="images/personnel_image/<?php echo $image; ?>" />
                    		<table style="width:80%;margin:30px auto;">
                    		  <tr>
                                <th>ID: </th>
                                <th><input type="text" class="col-sm-7 form-control" id="block" name="block" value="<?php echo $personnel_id;?>" disabled/></th>
                              </tr>
                              <tr>
                                <th>Name</th>
                                <th><input type="text" class="col-sm-7 form-control" id="subject" name="subject" value="<?php echo $name;?>" disabled/></th>
                              </tr>
                              
                            </table>
                            <hr>
                    		<form id="student_load" onsubmit="return validate()" role="form" action="actions/upload_image.php" style="width:50%;margin:0 auto;text-align:left;" method="post" enctype="multipart/form-data">
                              <input type="hidden" id="personnel_id" name="personnel_id" value="<?php echo $personnel_id;?>";/>
                              <div class="form-group">
                                <label>Source File</label>

                                <input type="file" id="student_load_file" name="file">
                              </div>
                              
                                <input type="submit" name="submit_student_load" class="btn btn-success btn-block" value="Upload" />
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