<!DOCTYPE html>

<?php
session_start();
$temp_db_con = mysqli_connect("localhost","root", "","kiosk");
mysqli_autocommit($temp_db_con,FALSE);
//mysqli_begin_transaction($temp_db_con);
//mysqli_query($temp_db_con,"SET autocommit = 0");

mysqli_query($temp_db_con,"BEGIN");

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
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="cms-personnel" ?>
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
                  <li class="active"><a href="#personnel" role="tab" data-toggle="tab"><i class="icon icon-user"></i> Personnel</a></li>
                  <!-- <li><a href="#grades" role="tab" data-toggle="tab"><i class="icon icon-money"></i> Grades</a></li>  -->
                </ul>
                <div class="tab-content" style="height:90%;height: 89%;overflow-y: auto;">
                    
                    <div class="tab-pane active" id="personnel">
                        
                        <div class="container">
                            <h1>Personnel  </h1>
                            <table id="table_personnel" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                                <thead>
                                    <tr>
                                        <th width="20%">ID No.</th>
                                        <th width="50%">Name</th>
                                        <th width="10%">Gender</th>
                                        <th width="20%">Image</th>
                                        <!-- <th width="15%">Action</th> -->
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
                            <a  data-parent="#accordion" href="#panel_4">List of Personnels</a> <!-- data-toggle="collapse" -->
                        </h4>
                    </div>
                    <div id="panel_4" class="panel-collapse in">
                        <div class="panel-body">
                            
                            <!-- <p><i><small>select your file to upload and click on the upload button below.</small></i></p> -->

                            <form id="personnel_list" role="form" onsubmit="return validate()" action="excel_upload/upload_personnel_list.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Source File</label>
                                <input type="file" id="personnel_list_file" name="personnel_list_file">
                              </div>
                              <input type="submit" name="submit_personnel_list" class="btn btn-success btn-block" value="Upload" />
                              <div class="btn-grp pull-right">
                                
                              </div>
                            </form>
                            <hr>
                            <h5><strong>File template</strong></h5>
                            <p><i><small>NOTICE: please ensure that the file to be uploaded follows the given template.</small></i></p>
                            <a href="excel_upload/download_list_personnel_template.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-download"></span> Download Template</a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div><!--/#right_panel-->
        </div>
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
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="dataTables/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            
            $('#table_personnel').dataTable({
                "bLengthChange": false,
                'iDisplayLength': 5,

                "bJQueryUI": false,
                "bFilter": true,
                "bInfo": false,
                "processing": true,
                "ajax": "ajax/load_personnel_list.php"
            });
        });
        
        function upload_image(personnel_id){
            window.open('cms_upload_personnel_image.php?personnel_id='+personnel_id,'','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=650,position=center');

        }
        function delete_personnel(personnel_id){
            console.log("deleting personnel : "+personnel_id );
            var ok = confirm("Delete this personnel?");
            if(ok){
                alert("deleting personnel : "+personnel_id );
                $.ajax({
                    url: "ajax/delete_personnel.php",
                    type: "GET",
                    data: {personnel_id:personnel_id},
                    async : false,
                    success: function(data){
                        alert(data);
                    }
                });
            }
        }

        
        function validate(){
            valid = true;
            var str = $("#personnel_list_file").val();
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
    <script src="js/cmds_panel.js"></script>

</body>
</html>