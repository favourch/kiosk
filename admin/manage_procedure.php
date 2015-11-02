<!DOCTYPE html>

<html lang="en">
<?php 
session_start();
$trans_id=$_GET['trans_id'];
?>
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


	<?php include "../db/db.php"; ?>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="service_guide" ?>
    <?php include "admin_left_pane.php";?>

    <section id="" class="torquiose peter-river" style="padding:0;">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section style="padding-left: 100px; margin-top: -32px;">
      <div class="" style="height: 74px;
                          width: 85%;
                          margin-left: 168px;">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3 style="margin: 0px;">
            <?php
            $query_trans=mysql_query("SELECT * FROM service_t WHERE service_id='$trans_id'");
            $row_trans=mysql_fetch_assoc($query_trans);
            $trans_name=$row_trans['service_title'];

                echo $trans_name;
            ?>
            </h3>
                      </div>
                    </div>
                </div>



   <div class="" style="height:300px; ">
                    <div class="panel panel-default" style="width: 85%; margin-left: 167px;">
                      <div class="panel-heading" style="line-height: 32px;">Procedure
                      
                      <div style="float:right">
                      <a class="btn btn-default" data-toggle="modal" href="#update_trans_flow"><i class="icon-edit-sign"></i> Update</a>
                      </div>
      
                      </div>
                      
                      <div class="panel-body" style="overflow-y: auto; max-height: 100%;">
                      <?php
					  	$query_procedure=mysql_query("SELECT * FROM service_t WHERE service_id='$trans_id'");
					  	$row_procedure=mysql_fetch_assoc($query_procedure);
						  $trans_flow=$row_procedure['transaction_flow'];
					   
              if($trans_flow!=NULL){
             ?>
          					<center><img src="images/transaction_flow_imgs/<?php echo $trans_flow ?>" width="700" height="700"/></center>
              <?php } else { ?>
                    <center><h1 style="color: red">No Transaction Flow Found</h1></center>
                <?php
              } ?>         
                       
                      </div>
                    </div>
                </div>
            </div>
        </div><!-- /#panel -->
     </section>


	 <!-- modal update trans flow -->
        <div id="update_trans_flow" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
                            <div class="modal-dialog" style="width: 533px; height: 640px; margin-top: 32px;"> <!--modified-->
                                
                                <div class="modal-content " style="height: 51%; width: 92%;">  <!--modified-->
                                    <div style="width:2%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
                                    </div>
                                    <div class="modal-" style="height: 100%; display: inline-block; padding: 20px;" > <!--modified-->
                                       <div class="modal-body" style="width: 420px;">
                                        
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 id="post_title">Update Transaction Flow</h4>
                     						 	<hr>
                                               <form action="actions/addEdit_trans_action.php" method="post" enctype="multipart/form-data">
                                               		<input type="hidden" value="<?php echo $trans_id ?>" name="service_id" /> 
                                                    
													
                                                    <div class="form-group">
                                                       <input type="file" name="image" id="image" />
                                                    </div>
                                              
                                          
                                        </div>
                                        <div class="modal-footer">
                                          <input type="submit" class="btn btn-info" value="UPDATE" name="update_procedures" />
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                                        </div>
                                         </form>
                                    </div>
                                        
                        
                                </div>
                            </div>
                            </div>
                            


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
   <script>

   
        function goBack(){
            window.history.go(-2);
        }
       
   
   </script>
  
</body>
</html>