<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
    $user_id = $_SESSION['kiosk']['user_id'];

}
else{
    header("location: login.php");
}

include_once '../db/db.php';



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
    <?php $active_page="" ?>
    <?php include "admin_left_pane.php";?>
  
    <section id="banner" class="" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->



    <section>

        <div id="panel" style="height: auto;background-color:#E2E3FF; padding: 10px 0;">
            <div class="col-lg-12">
              <h1><span class="glyphicon glyphicon-user" style="font-size:30px;"></span> Your Account</h1>
              <table class="table table-stripped table-bordered" style="background-color: #fff;border-radius: 5px;">
                <colgroup>
                    <col width="30%"/>
                    <col width="70%" />
                </colgroup>
                
                <tbody>
                  <tr>
                    <th>Account Type :</th>
                    <th id="type"></th>
                  </tr>
                  <tr>
                    <th>Name :</th>
                    <th ><?php echo getName()?></th>
                  </tr>
                  <tr>
                    <th>Username :</th>
                    <th id="username"></th>
                  </tr>
                  <tr>
                    <th>Password :</th>
                    <th id="password"></th>
                  </tr>
                </tbody>
              </table>
              <div class="container">
              <button class="btn btn-success pull-right" onclick="account_edit(<?php echo $user_id; ?>)">change</button>
              </div>
            </div><!--/.col-lg-6-->
        <!--<h5 style="color: red; margin-left:100px auto; font-size: 30px"><icon class="icon-exclamation-sign"></i> Under Development</h5>-->

        </div><!-- /#panel -->



    </section>
    
    <!-- MODAL for Editing account -->
    <div id="edit_modal" class="modal fade " >
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Edit Account</h3>
            </div>
                
            <div class="modal-body">
                <form id="edit_account_form" name="edit_account_form" class="center" role="form" action="actions/edit_account.php" method="POST"  >
                    <fieldset class="registration-form" style="width: 80%">
                        <div class="form-group">
                            <input readonly="true" id="e_type" name="e_type" type="text" class="form-control" style="width:100%;">
                            </input>
                        </div>
                        <div class="form-group">
                            <input readonly="true" id="e_member_id" name="e_member_id" type="text" class="form-control" style="width:100%;">
                            </input>
                        </div>

                        <div class="form-group">
                            <input type="text" id="e_username" name="e_username" placeholder="Username" class="form-control" style="width:100%;"></input>
                        </div>
                        <div class="form-group">
                            <input type="password" id="e_password" name="e_password" placeholder="Password" class="form-control" style="width:100%;"></input>
                        </div>
                        
                        <div class="form-group">
                            <input type="hidden" name="e_account_no" id="e_account_no" >
                        </div>

                        <div id="e_error_msg" class="alert alert-danger hidden">

                        </div>                        
                        
                
            </div>
            <div class="modal-footer">

                <input type="button" value="UPDATE" name="edit_button" id="edit_button" class="upload btn btn-success"/>
                    </fieldset>
                </form>
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
        (function(){
            /*
            var left_panel = $("#left-panel"); 
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });
            */

        })();
        //Event handler triggered when edit button pressed [Edit Modal]
        $("#edit_button").click(function(){

            
            //alert("'update' button clicked");
            var username = $("#e_username").val();
            var password = $("#e_password").val();
            var msg = "";
            if(username==""){
                msg = "Please enter username.";
            }
            else if(username.length<4){
                msg = "Username too short.";
            }

            if(msg!=""){
                $("#e_error_msg").removeClass("hidden").text(msg);
            }
            else{
                alert("Successfully edited account for: "+username);
                $("#edit_account_form").submit();
            }
        });
        function account_edit(account_no){
            console.log("admin: edit account # "+account_no);
            var accountType = "";
            $.ajax({
                url: "ajax/account_details.php",
                type: "GET",
                data: {account_no:account_no},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    accountType = details.type;
                    $("#e_username").val(details.username);
                    $("#e_password").val(details.password);
                    $("#e_type").val(details.type);
                    $("#e_member_id").val(details.id+" - "+details.name);
                    $("#e_account_no").val(account_no);
                }
            });
            if(accountType=="admin"){
                $("#e_member_id").addClass("hidden");

            }
            else{
                $("#e_member_id").removeClass("hidden");
            }

            $("#edit_modal").modal("toggle");
        }
        $(document).ready(function(){
            $.ajax({
                url: "ajax/account_details.php",
                type: "GET",
                data: {account_no:<?php echo $user_id; ?>},
                async : false,
                success: function(data){
                    console.log(data);
                    var details = jQuery.parseJSON(data);
                    accountType = details.type;
                    $("#username").text(details.username);
                    $("#password").text(details.password);
                    $("#type").text(details.type);
                    //$("#name").val(details.id+" - "+details.name);
                    //$("#account_no").val(account_no);
                }
            });
        });
    </script>
</body>
</html>