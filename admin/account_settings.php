<!DOCTYPE html>

<?php
session_start();



if(isset($_SESSION['kiosk']['user_id'])){
    //include "actions/misc_functions.php";

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
    <style type="text/css">
        .table thead>tr>th,
        .table tbody>tr>th,
        .table tfoot>tr>th, 
        .table thead>tr>td, 
        .table tbody>tr>td, 
        .table tfoot>tr>td{
            /*padding:1px;*/
        }
        label{
            font-weight: normal;
        }
    </style>

</head><!--/head-->
<body>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="account_settings" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="torquiose peter-river" style="">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-user" > </span> Accounts Setting
              </a>
        </div>
    </section><!--/#services-->

    <section>
        
        <div id="panel" style="">


           <div class="panel panel-default " style="width:100%">
              <div class="panel-heading">Accounts
                <a class="btn btn-default btn-xs pull-right" data-toggle="modal" href="#add_modal"><span class="glyphicon icon-plus-sign" style="font-size:18px; margin-right:10px;"></span> ADD</a>
              </div>
              <div class="panel-body" style="overflow-y:auto"> <!-- max-height:400px; -->
                

                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                    <thead>
                        <tr>
                            <th width="10%">No.</th>
                            <th width="20%">Username</th>
                            <th width="20%">type</th>
                            <th wieth="30%">Owner</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                   
                    <?php
                        $query_account = mysql_query("SELECT * FROM account_t") or die(mysql_error());

                    ?>



                    <tbody>
                    <?php while($row_account=mysql_fetch_assoc($query_account)){ ?>
                        <tr>
                            <td><?php echo $row_account['account_no']?></td>
                            <td><?php echo $row_account['username']?></td>
                            <td><?php echo $row_account['type']?></td>
                            <td><?php echo getAccountName($row_account['account_no']);?></td>
                            <td>
                                <!-- <a href="#" onclick="account_view(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Details</a> -->
                                <a href="#" onclick="account_edit(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#" onclick="account_delete(<?php echo $row_account['account_no']?>)" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> delete</a>
                            </td>
                           
                        </tr>
                    <?php }?>
                    </tbody>
                </table>





              </div>
            </div>
        </div><!-- /#panel -->
    </section>


    <!-- MODAL for adding account -->
    <div id="add_modal" class="modal fade " >
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content " >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Add Account</h3>
            </div>
                
            <div class="modal-body">
                <form id="add_account_form" onsubmit="return validate_add()" name="add_account_form" class="center" role="form" action="actions/add_account.php" method="post"  enctype="multipart/form-data">
                    <fieldset class="registration-form" style="width: 100%">
                        <div style="width:75%;">
                            <table style="width:100%;">
                              <colgroup>
                                  <col width="30%"/>
                                  <col width="70%"/>
                              </colgroup>
                              <tr class="form-group">
                                <th> Account Type :</th>
                                <th >
                                    <select id="type" name="type"  class="form-control" style="width:100%;">
                                        <option value="student">Student</option>
                                        <option value="personnel">Personnel</option>
                                        <option value="admin" selected>Admin</option>

                                    </select>
                                </th>
                              </tr>
                              <tr id="member" class="form-group hidden">
                                <th> </th>
                                <th>
                                    <select id="member_id" name="member_id"  class="form-control" style="width:100%;">


                                    </select>
                                </th>
                              </tr>
                              <tr class="form-group">
                                <th> Username :</th>
                                <th class="form-group">
                                    <input type="text" id="username" name="username" placeholder="Username" class="form-control" style="width:100%;"></input>
                                </th>
                              </tr>
                              <tr class="form-group">
                                <th>Password :</th>
                                <th >
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" style="width:100%;"></input>
                                </th>
                              </tr>

                            </table>

                        </div><!-- /.col-md-6 -->
                        <hr>
                        <div style="text-align:left;">
                            <h4 style="display:inline">Privileges</h4>
                            <p style="display:inline;">
                                <input id="box_select_all" type="checkbox" />
                                <label> Select All</label>
                            </p>
                            <hr style="margin:0;">
                            <div class="container" style="margin:0 20px;">
                             <?php
                             //$check_box=array("System Administration", "E - Bulletin Management", "Personnel Data", "Enrollment Data", "Payment Data", "Office Information", "Member Assignment");
                             //print_r($check_box);
                              ?>

                                <div class="col-md-4">
                                    <h4>Admin Panel</h4>
                                    <div class="form-gorup">
                                        <input id="checkbox_1" name="checkbox[]" type="checkbox" value="System Administrator" />
                                        <label>System Administrator</label>
                                    </div>
                                    <div class="form-gorup">
                                        <input id="checkbox_2" name="checkbox[]" type="checkbox" value="E - Bulletin Management"/>
                                       <label>E - Bulletin Management</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <h4>Content Management</h4>
                                    <div class="form-gorup">
                                         <input id="checkbox_3" name="checkbox[]" type="checkbox" value="Personnel Data" />
                                        <label>Personnel Data</label>
                                    </div>
                                    <div class="form-gorup">                                    
                                        <input id="checkbox_4" name="checkbox[]" type="checkbox" value="Enrollment Data" />
                                        <label>Enrollment Data</label>
                                        
                                    </div>
                                    <div class="form-gorup">
                                    
                                        <input id="checkbox_5" name="checkbox[]" type="checkbox" value="Payment Data" />
                                       <label>Payment Data</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4>Office Info Management</h4>
                                    <div class="form-gorup">
                                         <input id="checkbox_6" name="checkbox[]" type="checkbox" value="Office Information" />
                                         <label>Office Information</label>
                                    </div>
                                    <div class="form-gorup">                                    
                                        <input id="checkbox_7" name="checkbox[]" type="checkbox" value="Member Assignment" />
                                        <label>Member Assignment</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div id="error_msg" class="alert alert-danger hidden">

                        </div>                        
                        
                
            </div>
            <div class="modal-footer">

                <input type="submit" value="ADD" name="add_button" id="add_button" class="upload btn btn-success"/>
                    </fieldset>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>



    <!-- MODAL for Viewing -->
    <div id="details_modal" class="modal fade " >
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Account Details</h3>
            </div>
                
            <div class="modal-body">
                    <div  style="width: 100%">
                        
                        <table style="width: 80%;margin: auto;font-size: 20px;">
                          <tr>
                            <th>Username: </th>
                            <th id="username_view"></th>
                          </tr>
                          <tr>
                            <th>Password: </th>
                            <th id="password_view"></th>
                          </tr>
                          <tr>
                            <th>Account Type:</th>
                            <th id="type_view"></th>
                          </tr>
                        </table>
                      
                    </div>
                    <hr>
                    <div>
                        <table>
                          <tr>
                            <td>
                                <input type="checkbox" />

                            </td>
                          </tr>
                        </table>
                    </div>
                
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                
            </div>
                

        </div>
    </div>
    </div>




    
     <!-- MODAL for Editing account -->
    <div id="edit_modal" class="modal fade " >
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content " >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Edit Account</h3>
            </div>
                
            <div class="modal-body">
                <form id="edit_account_form" onsubmit="return validate_edit()" name="edit_account_form" class="center" role="form" action="actions/edit_account.php" method="post"  enctype="multipart/form-data">
                    <fieldset class="registration-form" style="width: 100%">
                        <div style="width:75%;">
                            <input type="hidden" id="e_account_no" name="e_account_no" />
                            <table style="width:100%;">
                              <colgroup>
                                  <col width="30%"/>
                                  <col width="70%"/>
                              </colgroup>
                              <tr class="form-group">
                                <th> Account Type :</th>
                                <th >
                                    <input readonly="true" type ="text" id="e_type" name="e_type"  class="form-control" style="width:100%;" />
                                       
                                </th>
                              </tr>
                              <tr class="form-group">
                                <th> </th>
                                <th>
                                    <input readonly="true" type ="text" id="e_member_id" name="e_member_id"  class="form-control" style="width:100%;">


                                </th>
                              </tr>
                              <tr class="form-group">
                                <th> Username :</th>
                                <th class="form-group">
                                    <input type="text" id="e_username" name="e_username" placeholder="Username" class="form-control" style="width:100%;"></input>
                                </th>
                              </tr>
                              <tr class="form-group">
                                <th>Password :</th>
                                <th >
                                    <input type="password" id="e_password" name="e_password" placeholder="Password" class="form-control" style="width:100%;"></input>
                                </th>
                              </tr>

                            </table>

                        </div><!-- /.col-md-6 -->
                        <hr>
                        <div style="text-align:left;">
                            <h4 style="display:inline">Privileges</h4>
                            <p style="display:inline;">
                                <input id="e_box_select_all" type="checkbox" />
                                <label> Select All</label>
                            </p>
                            <hr style="margin:0;">
                            <div class="container" style="margin:0 20px;">
                             <?php
                             //$check_box=array("System Administration", "E - Bulletin Management", "Personnel Data", "Enrollment Data", "Payment Data", "Office Information", "Member Assignment");
                             //print_r($check_box);
                              ?>

                                <div class="col-md-4">
                                    <h4>Admin Panel</h4>
                                    <div class="form-gorup">
                                        <input id="e_checkbox_1" name="e_checkbox[]" type="checkbox" value="System Administrator" />
                                        <label>System Administrator</label>
                                    </div>
                                    <div class="form-gorup">
                                        <input id="e_checkbox_2" name="e_checkbox[]" type="checkbox" value="E - Bulletin Management"/>
                                       <label>E - Bulletin Management</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <h4>Content Management</h4>
                                    <div class="form-gorup">
                                         <input id="e_checkbox_3" name="e_checkbox[]" type="checkbox" value="Personnel Data" />
                                        <label>Personnel Data</label>
                                    </div>
                                    <div class="form-gorup">                                    
                                        <input id="e_checkbox_4" name="e_checkbox[]" type="checkbox" value="Enrollment Data" />
                                        <label>Enrollment Data</label>
                                        
                                    </div>
                                    <div class="form-gorup">
                                    
                                        <input id="e_checkbox_5" name="e_checkbox[]" type="checkbox" value="Payment Data" />
                                       <label>Payment Data</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4>Office Info Management</h4>
                                    <div class="form-gorup">
                                         <input id="e_checkbox_6" name="e_checkbox[]" type="checkbox" value="Office Information" />
                                         <label>Office Information</label>
                                    </div>
                                    <div class="form-gorup">                                    
                                        <input id="e_checkbox_7" name="e_checkbox[]" type="checkbox" value="Member Assignment" />
                                        <label>Member Assignment</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div id="e_error_msg" class="alert alert-danger hidden">

                        </div>                        
                        
                
            </div>
            <div class="modal-footer">

                <input type="submit" value="UPDATE" name="edit_button" id="edit_button" class="upload btn btn-success"/>
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
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').dataTable({
            "bLengthChange": false,
            'iDisplayLength': 5,

            "bJQueryUI": true,
            "bFilter": true,
            "bInfo": false
            });
    });

    

    $("input").change(function(){
        $("#error_msg").addClass("hidden");
    });
    $("#box_select_all").change(function(){
        if($(this).is(":checked")){
            $("[id^=checkbox]").each(function(){
                this.checked = true;
            });
            //alert("check");
        }
        else{
            $("[id^=checkbox]").each(function(){
                this.checked = false;
            });

        }
    });

    //Event handler triggered when add button pressed [Add Modal]
    function validate_add(){ 
        
        console.log("'add' button clicked");
        var username = $("#username").val();
        var password = $("#password").val();
        var privileges = $('[id^=checkbox]:checked').map(function() {
            return this.value;
        }).get();

        var msg = "";
        if(username==""){
            msg = "Please enter username.";
        }
        else if(username.length<4){
            msg = "Username too short.";
        }
        else if(privileges.length<1){
            msg = "Please add atleast one privilege to this account.";
        }
        //alert(privileges.length);

        if(msg!=""){
            $("#error_msg").removeClass("hidden").text(msg);
        }
        else{
            console.log("Successfully added account for: "+username);
            setTimeout((function(){
                $("#e_error_msg").removeClass("hidden").text("Successfully Added Account.");       
            }), 1000); 
            return true;
            // $("#add_account_form").submit();
        }
        return false;
    };
    $("#type").change(function(){
        
        console.log("type value changed");
        var type = $("#type").val();
        if(type=="student"){
            $.ajax({
                url: "ajax/member_student_selection.php",
                type: "GET",
                async : false,
                success: function(data){
                    //alert(data);
                    if(data!=""){
                        $("#member_id").html(data);
                        $("#add_button").prop("disabled", false);

                    }
                    else{
                        $("#member_id").html("<option>No student available for account registration.</option>");
                        $("#add_button").prop("disabled", true);
                    }
                }
            });
            $("#member").removeClass("hidden");

        }
        else if(type=="personnel"){
            var options = "";
            $.ajax({
                url: "ajax/member_personnel_selection.php",
                type: "GET",
                async : false,
                success: function(data){
                    //alert(data);
                    options += data;
                    
                }
            });
            if(options!=""){
                $("#member_id").html(options);
                $("#add_button").prop("disabled", false);

            }
            else{
                $("#member_id").html("<option>No personnel available for account registration.</option>");
                $("#add_button").prop("disabled", true);
            }
            //$("#member_id").html(options);
            $("#member").removeClass("hidden");

        }
        else{
            $("#member").addClass("hidden");
            $("#add_button").prop("disabled", false);

        }
        
        //$("#member").removeClass("hidden");
        
    });
    $("#e_box_select_all").change(function(){
        if($(this).is(":checked")){
            $("[id^=e_checkbox]").each(function(){
                this.checked = true;
            });
            //alert("check");
        }
        else{
            $("[id^=e_checkbox]").each(function(){
                this.checked = false;
            });

        }
    });
    //Event handler triggered when edit button pressed [Edit Modal]
    function validate_edit(){

        
        console.log("'update' button clicked");
        var username = $("#e_username").val();
        var password = $("#e_password").val();
        var privileges = $('[id^=e_checkbox]:checked').map(function() {
            return this.value;
        }).get();
        var msg = "";
        if(username==""){
            msg = "Please enter username.";
        }
        else if(username.length<4){
            msg = "Username too short.";
        }
        else if(privileges.length<1){
            msg = "Please add atleast one privilege to this account.";
        }

        if(msg!=""){
            $("#e_error_msg").removeClass("hidden").text(msg);
        }
        else{
            alert("Successfully edited account for: "+username);
            // $("#edit_account_form").submit();
            return true;
        }
        return false;
    };
    
    </script>
    <script>
        (function(){
            var left_panel = $("#left-panel");
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                left_panel.toggleClass("show");
            });

        })();

        function account_view(account_no){
            console.log("admin: view account # "+account_no);
            $.ajax({
                url: "ajax/account_details.php",
                type: "GET",
                data: {account_no:account_no},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    $("#username_view").text(details.username);
                    $("#password_view").text(details.password);
                    $("#type_view").text(details.type);
                }
            });



            $("#details_modal").modal("toggle");
        }
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

                    $("#e_checkbox_1").prop("checked",(details.priv_admin==1)? true:false);
                    $("#e_checkbox_2").prop("checked",(details.priv_bull==1)? true:false);
                    $("#e_checkbox_3").prop("checked",(details.priv_cms1==1)? true:false);
                    $("#e_checkbox_4").prop("checked",(details.priv_cms2==1)? true:false);
                    $("#e_checkbox_5").prop("checked",(details.priv_cms3==1)? true:false);
                    $("#e_checkbox_6").prop("checked",(details.priv_ois1==1)? true:false);
                    $("#e_checkbox_7").prop("checked",(details.priv_ois2==1)? true:false);

                
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
        function account_delete(account_no){
            console.log("admin: delete account # "+account_no);
            if(confirm("Are you sure you want to delete account: "+account_no)){
                window.location = "actions/delete_account.php?account_no="+account_no;
            }
        }
    </script>
</body>
</html>