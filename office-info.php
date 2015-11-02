<!DOCTYPE html>



<?php

include "db/db.php";
$unit_id=$_GET['unit_id'];

$unit_id=$_GET['unit_id'];
$query=mysql_query("SELECT * FROM unit_t WHERE unit_id='$unit_id'");
$row=mysql_fetch_assoc($query);
$unit_name=$row['unit_name'];
$unit_type=$row['type'];
//echo $unit_type;
if(($unit_type=='course') || ($unit_type=='department')){
    //echo "here";
    header("location: office-info-nt.php?unit_id=$unit_id");
}
			
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-coffee" ></i> Office Information</h3>
            </div>
        </div>
    </section><!--/#services-->
	
    
    <section style="padding-bottom:0; padding-top:20px; height:90%">
        <div id="panel" style="width: 90%; margin: 0 auto; border: 1px solid #dadada; border-radius: 4px; height:100%; background-color:#fafafa; padding-top:20px">
            <div class="container">
                
                <div class="col-sm-5" style="height:400px; ">
                    <div class="panel panel-default" style="width:100%">
                      <div class="panel-heading">Members of the <?php echo $unit_name ?></div>
                      <div class="panel-body" style="max-height:400px;overflow-y:auto">
                        <ul class="list-group">
                           <?php
						
						  $query_trans=mysql_query("SELECT * FROM member_t, position_t where member_t.unit_id='$unit_id'
                                                    AND member_t.position_id=position_t.position_id") or die (mysql_error());
						  if(mysql_num_rows($query_trans) != 0) {
							  	while($row_trans=mysql_fetch_assoc($query_trans)) { 
								$member_id=$row_trans['member_id'];
								$position_name =$row_trans['position_name'];
									if($row_trans['member_type']=='personnel'){
										$query_member=mysql_query("SELECT * FROM personnel_members_t, personnel_t WHERE personnel_members_t.member_id='$member_id'
																		AND personnel_members_t.personnel_id=personnel_t.personnel_id") or die(mysql_error());
									
											while($row_member=mysql_fetch_assoc($query_member)){
												$personnel_id=$row_member['personnel_id'];
												//$position_name=$row_member['position_name'];
												$fname=$row_member['f_name'];
												$lname=$row_member['l_name'];
												$full_name =ucfirst($fname).' '. ucfirst($lname); ?>
												
											  	<li class="list-group-item"><strong><?php echo $full_name  ?></strong><br />
                                                <p style="margin-bottom: 0px; font-size: 12px;"><?php echo $position_name ?></p>
                                                </li> 

                                                
                                                
                                                
                                <?php }
									} else if ($row_trans['member_type']=='student'){
										$query_member=mysql_query("SELECT * FROM student_members_t, student_t, position_t WHERE student_members_t.member_id='$member_id'
																		AND student_members_t.student_id=student_t.student_id AND position_t.position_id='$position_id'");
									
											while($row_member=mysql_fetch_assoc($query_member)){
												$student_id=$row_member['student_id'];
												$fname=$row_member['f_name'];
												$lname=$row_member['l_name'];
												$full_name =ucfirst($fname).' '. ucfirst($lname); ?>
												
												<li class="list-group-item"><strong><?php echo $full_name  ?></strong><br />
                                                <p style="margin-bottom: 0px; font-size: 12px;"><?php echo $position_name ?></p>
                                                </li>  
								<?php } ?>
                      
                       
                          <?php 		}		
									}
								
						}
						?>
                        
                        
                     
                        </ul>
                      </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3 style="margin: 0px;"> <?php echo $unit_name ?> </h3>
                      </div>
                    </div>
                </div>
                <div class="col-sm-7" style="height:300px; ">
                    <div class="panel panel-default" style="width:100%">
                      <div class="panel-heading">Transactions</div>
                      <div class="panel-body" style="overflow-y: auto; max-height: 300px;">
                        <ul class="list-group">
                        <?php
						  $query_trans=mysql_query("SELECT * FROM service_t where unit_id='$unit_id'") or die (mysql_error());
						  if(mysql_num_rows($query_trans) != 0) {
						  while($row_trans=mysql_fetch_assoc($query_trans)) { 
						  		$transaction_name=$row_trans['service_title'];
								$trans_id=$row_trans['service_id'];
						  ?>
                          <a href="trans_procedure.php?service_id=<?php echo $trans_id; ?>"><li class="list-group-item" style="border-radius: 0px; margin:0px"><?php echo $transaction_name ?></li></a>
                          <?php }
						  	} else { ?>
						  <a href=""><li class="list-group-item">No Transactions</li></a>							
						  <?php
									}
					?>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div><!-- /#panel -->
    </section>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
        function goBack(){
            window.history.go(-2);
        }
       
    </script>

</body>
</html>