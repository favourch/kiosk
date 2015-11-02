<!DOCTYPE html>



<?php

include "db/db.php";
$service_id=$_GET['service_id'];

$query_service=mysql_query("SELECT * FROM service_t WHERE service_id='$service_id'");
$row_service=mysql_fetch_assoc($query_service);
$service_title=$row_service['service_title'];


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
    <style type="text/css">
        .box-option{
            width:100%;
            height:200px; 
            background-color:#ddd;

        }
        .box-option > div{
            width:5px;
            height:100%; 
            background-color:#F00; 
            transition:width 1s ease;
            float:left;
        }
        .box-option:hover > div{
            width:30px;
        }
        .box-option > a {
            text-align:right;
            padding:20px;
            width:100%;
            height: 100%;
            display:block;
            background-color:#fff;
            transition:background-color 1s ease;

            border: 1px solid #ddd;
            box-shadow: -1px 5px 10px #ddd;
        }
        .box-option > a:hover, .box-option > a:active {
            /*
            color:white;
            background-color:#333;
            */
        }
        .box-option .glyphicon{
            font-size: 36px;
        }
		
		.left {
		
			position: absolute;
			left: 80px;
			margin-top: 300px;
			transition: left 1s ease;
		}
	
	
		.right {
		
			position: absolute;
			right: 80px;
			margin-top: 300px;
			transition:right 1s ease;
	
		}
    </style>
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-coffee" ></i> Office Information System</h3>
            </div>
        </div>
    </section><!--/#services-->
     

	 <div class="col-sm-12" style="height:300px; ">
                    <div class="panel panel-default" style="width: 70%; margin: 0 auto; margin-top: 20px;">
                      <div class="panel-heading"><?php echo ucfirst($service_title); ?></div>
                      <div class="panel-body" style="overflow-y: auto; max-height: 560px;">
                        <ul class="list-group">

                        <?php
						 
						  $query_trans=mysql_query("SELECT * FROM service_t where service_id='$service_id'") or die (mysql_error());
						  $row_trans=mysql_fetch_assoc($query_trans);
						  $trans_flow=$row_trans['transaction_flow'];
						  //$trans_id=$row_trans['service_id'];
						  if($trans_flow!=NULL){

						  ?>

                            	<center><img src="admin/images/transaction_flow_imgs/<?php echo $trans_flow ?>" width="700" height="700"/></center>
                         <?php  } else { ?>
								<center><p style="font-size: 20px; color: red">No Uploaded Transaction</p></center>

                          <?php } ?>
                          

						 
                        </ul>
                      </div>
                    </div>
                </div>
                
                
                
                
                
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