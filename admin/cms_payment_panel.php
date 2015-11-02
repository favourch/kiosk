<!DOCTYPE html>

<?php
session_start();
$db_con = mysqli_connect("localhost","root", "","kiosk");
mysqli_autocommit($db_con,FALSE);
//mysqli_begin_transaction($db_con);
//mysqli_query($db_con,"SET autocommit = 0");

mysqli_query($db_con,"BEGIN");

if(isset($_SESSION['kiosk']['user_id'])){


}
else{
    header("location: login.php");
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
    <link href="dataTables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="dataTables/css/jquery.dataTables_themeroller.css" rel="stylesheet">
    
    <style type="text/css">
        .cms-panel{
            border: 1px solid #dadada;
            border-radius: 4px;

            display: inline-block;
            vertical-align: top;
        }
        .btn-banner{
            color:#FFF;
            border:1.5px solid white;
        }
        .panel-default > .panel-heading{
            background-color: #837E90;
        }
        a:hover, a:focus {
            color: #FFEF50;

        }
        table tbody th{
            font-weight: normal;
            font-size: 12px;
        }
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="cms-payment" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="height:44px;">
         <div class="panel-menu-item" style="">
              <!-- <div id="banner_buttons" style = "float:left;"> -->
                  <a href="#" class="menu-toggle" style="color:white;">
                  <span class="glyphicon glyphicon-list-alt" > </span> Content Management
                  </a>
                    <p class="sem-header">Active semester : <?php echo sem_name(semester()); ?></p>

              <!-- </div> -->
        </div>
    </section><!--/#services-->

    <section id="" style="padding:20px 0;">
        <div id="panel" style="width:75%">
        <div id="left_pane" class="cms-panel" style=" width:74%;">
            <!-- Nav tabs -->
                <ul class="nav nav-tabs " role="tablist" style="border-bottom:1;">
                  <!-- <li ><a href="#students" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Students</a></li> -->
                  <li class="active"><a href="#payment" role="tab" data-toggle="tab"><i class="icon icon-money"></i> payments</a></li>
                  <!-- <li><a href="#grades" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Grades</a></li>  -->
                </ul>
                <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">
                    
                    <div class="tab-pane active" id="payment">
                        
                        <div class="container">
                           
                            <table id="table_student" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">Student No.</th>
                                        <th width="40%">Name</th>
                                        <th width="10%">Gender</th>
                                        <th width="10%">Status</th>
                                        <th width="20%">Payments</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                </tbody>
                            </table>

                           
                            
                        </div>
                    </div> <!-- /#personnel-->



                </div> <!-- /.tab-content -->


               
        </div><!-- /#panel -->
        <div id="right_panel" class="cms-panel" style="width:25%; height:500px;">
            <div style="border-bottom: 5px #428BCA solid;
                        box-shadow: 0px 5px 15px -10px;
                        padding: 15px;
                        margin-bottom: 10px;
                        font-size: 16px;
                        font-weight: 500;">
                <span class="icon icon-upload" style="font-size:22px;"></span>
                Excel Uploads
            </div>
            <div class="panel-group" id="accordion">
                
               

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a  data-parent="#accordion" href="#panel_4">Student Payments</a> <!-- data-toggle="collapse" -->
                        </h4>
                    </div>
                    <div id="panel_4" class="panel-collapse in">
                        <div class="panel-body">
                            
                            <!-- <p><i><small>select your file to upload and click on the upload button below.</small></i></p> -->

                            
                            <form id="payments" onsubmit="return validate()" role="form" action="excel_upload/upload_payments.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="payments_file" name="payments_file" class="">
                              </div>
                              
                              
                              <input type="submit" name="submit_payments" class="btn btn-success btn-block" value="Upload" />
                              
                            </form>
                            <hr>
                            <h5><strong>File template</strong></h5>
                            <p><i><small>NOTICE: please ensure that the file to be uploaded follows the given template.</small></i></p>
                            <a href="excel_upload/download_payment_template.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-download"></span> Download Template</a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div><!--/#right_panel-->
        </div>
    </section>

    <!-- MODAL for Editing student -->
    <div id="edit_modal" class="modal fade " >
    <div class="modal-dialog" style>
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Edit</h3>
            </div>
                
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">

                <input type="button" value="UPDATE"  name="edit_button" id="edit_button" class="upload btn btn-success"/>
                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>




    <div id="payment_modal" class="modal fade " >
    <div class="modal-dialog" style="width:80%">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Payments</h3>
            </div>
                
            <div id="payment_content" class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Student ID: </label>
                        <input type="text" id="student_id" disabled class="form-control" style="display:inline-block;width:15%" />
                        <label>Name: </label>
                        <input type="text" id="student_name" disabled class="form-control" style="display:inline-block;width:50%"/>
                    </div>
                    <div class="form-group">
                        <label>Semester: </label>
                        <select id="payment_modal_sem" class="form-control" style="display:inline-block;width:60%;">

                        <?php 
                        $query_sem = mysqli_query($db_con, "SELECT * FROM semester_t ORDER BY sem_id DESC") or die(trigger_error(mysqli_error($db_con)));
                        while($row_sem = mysqli_fetch_array($query_sem)){
                            $sem_id = $row_sem['sem_id'];
                            $ay_id = $row_sem['ay_no'];
                            $sem_no = $row_sem['sem_no'];
                            $query_ay = mysqli_query($db_con, "SELECT * FROM academic_year_t WHERE ay_id='{$ay_id}'") or die(trigger_error(mysqli_error($db_con)));
                            $row_ay = mysqli_fetch_array($query_ay);
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
                        </select>
                    </div>
                </form>
                <div id="payment_table">
                </div>
            </div>
            <div class="modal-footer">
        
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
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

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="dataTables/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            
            $('#table_student').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_payment_list.php"
            });
        });
        
        
        function validate(){
            valid = true;
            var str = $("#payments_file").val();
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

        function view_payment(student_id){
            $('#student_id').val(student_id);
            $.ajax({
                url: "ajax/details_student.php",
                type: "GET",
                data: {student_id:student_id},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    var f_name = details['f_name'];
                    var m_name = details['m_name'];
                    var l_name = details['l_name'];
                    var gender = details['gender'];
                    var status = details['status'];

                    $("#student_name").val(f_name+" "+m_name+" "+l_name);

                }
            });
            load_payment_data();

            $("#payment_modal").modal('toggle');
        }

        $('#payment_modal_sem').change(load_payment_data);

        function load_payment_data(student_id){
            var sem_id = $('#payment_modal_sem').val();
            var student_id = $('#student_id').val();
            $.ajax({
                url: "ajax/load_student_payments.php",
                type: "GET",
                data: {student_id:student_id,sem_id:sem_id},
                async : false,
                success: function(data){
                    //alert(data);
                    $("#payment_table").html(data);
                }
                   
            });
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


        (function(){
            /*
            var left_panel = $("#left-panel"); 
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });
            */

        })();
    </script>
    <script src="js/cms_panel.js"></script>

</body>
</html>