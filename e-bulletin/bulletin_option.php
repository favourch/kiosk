<!DOCTYPE html>



<?php

include "../db/db.php";


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/ours.css" rel="stylesheet">
    <link href="../css/styles_accordion.css" rel="stylesheet"/>
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
            width: 150px;
            box-shadow: inset -100px 0 100px -100px rgba(0, 0, 0, 0.31);
            border-right: 5px solid transparent;
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
		
		.icon_position {
			position: absolute;
			margin-top: -75px;
			font-size: 75px;
			padding: 4px 4px 4px 14px;
			right: -60px;
			top: 262px;
			color: #9B59B6;
            transition:right 1s ease,transform .5s ease;
			}
		.icon_position.right{
            right:-140px;
            z-index: 3;
            transform:rotate(-180deg);
        }
		.post_type {
			width: 70%;
            margin:0 auto;
			/*margin: 75px 23px 23px 275px; */
			/*position: absolute;*/
			transition: left 1s ease;
				
			}
			
		.post_type_hidden{
			left: -1099px;
			
			}
		 
		.dept_name{
			background: #fff;
			color: #000;
			font-size: 18px;
			border: 1px solid;
		}
		
        #panel{
            left:0;
            transition:left 1s ease;
        }
		#panel.hidden-panel{
            left:-100%;
        }
        #panel_right{
            top:135px;
            /*left:35px;*/
            left:0;
            width:100%;
            position:absolute;
            transition:left 1s ease;
        }
        #panel_right.hidden-panel{
            left:100%;
        }

    </style>

</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-user" ></i> E-Bulletin Board</h3>
            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:18px; height:85%">
     
        <div id="panel" class="" style="width: 90%; margin: 0 auto; border: 1px solid #dadada; border-radius: 4px; height:100%; background-color:#fafafa;padding:50px;">
            <div class="container post_type" id="post_type">
                <a href="#"><i class="icon-chevron-right icon_position" id="chevron"></i></a>
               
                <div class="row">
         
                    <div class="col-md-6">
                        <div class="box-option">
                            <div style="background-color:#6ECDEB"></div>
                            <a href="bulletin.php?type_id=event#Event" style="">
                                    <span class="glyphicon icon-calendar-empty"></span>
                                    <h1 style="font-size:20px;">Events</h1>
                                    <p>View upcoming events</p>
                            </a>
                        </div>
                    </div>
            
               
                    <div class="col-md-6">
                        <div class="box-option">
                            <div style="background-color:#6ECDEB"></div>
                            <a href="bulletin.php?type_id=message#Message" style="">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                    <h1 style="font-size:20px;">Messages</h1>
                                    <p>View latest messages</p>
                            </a>
                        </div>
                    </div>
              
                
                </div> <!--row-->
            
                <div class="row">
         
                
                    
                    <div class="col-md-6">
                        <div class="box-option">
                            <div style="background-color:#6ECDEB"></div>
                            <a href="bulletin.php?type_id=announcement#Announcement" style="">
                                    <span class="glyphicon glyphicon-volume-up"></span>
                                    <h1 style="font-size:20px;">Announcements</h1>
                                    <p>View latest Announcements</p>
                            </a>
                        </div>
                    </div>
              
          
               
               
                    <div class="col-md-6">
                        <div class="box-option">
                            <div style="background-color:#6ECDEB"></div>
                            <a href="bulletin.php?type_id=holiday#Holiday" style="">
                                    <span class="glyphicon glyphicon-gift"></span>
                                    <h1 style="font-size:20px;">Holidays</h1>
                                    <p>View holidays</p>
                            </a>
                        </div>
                    </div>
              
            
                </div> <!-- /.row -->
            </div> <!-- /#post_type -->
            
        </div><!-- /#panel -->
      
           
        
        <div id="panel_right" class="hidden-panel" style="padding-left:50px;">

            <div >
                <?php
			  	$unit=array('department', 'college', 'course');
				
				for($i=0; $i<3; $i++){
					
			  
			    ?>
                
                <div class='cssmenu col-lg-4' id="cssmenu_dept<?php echo $i; ?>">
                    <ul>
                       <li><a href='' style="background: #9B59B6;"><span><?php echo strtoupper($unit[$i]) ?></span></a></li>
                       
                      <?php
        			  
        			  $query_dept=mysql_query("SELECT * FROM unit_t WHERE type='$unit[$i]'");
        			  while($row_dept=mysql_fetch_assoc($query_dept)){
        				  $unit_name=$row_dept['unit_name'];
        				  $unit_id=$row_dept['unit_id'];
        			   ?>
                       <li><a href=''><span class="dept_name"><?php echo $unit_name ?></span></a>
                          <ul style="max-height: 140px; overflow-y: overlay;">
                          <?php
        				  $query_personnel=mysql_query("SELECT * FROM personnel_members_t, member_t, personnel_t WHERE personnel_members_t.personnel_id=personnel_t.personnel_id AND personnel_members_t.member_id=member_t.member_id AND member_t.unit_id='$unit_id'");
        						while($row_personnel=mysql_fetch_assoc($query_personnel)){
        							  $personnel_id=$row_personnel['personnel_id'];
        							  $fname=$row_personnel['f_name'];
        							  $lname=$row_personnel['l_name'];
        							  $full_name=ucfirst($fname).' '.ucfirst($lname);
        				   ?>

                           <?php if(mysql_num_rows($query_personnel)>0){ ?>
                            		 <li><a href='bulletin.php?personnel_id=<?php echo $personnel_id ?>'><?php echo $full_name ?></a></li>
                             <?php } else {

                                } ?>
                             <?php } 
                             if (mysql_num_rows($query_personnel)==0){ ?>
                                    <li><a href='#'>None</a></li>
                             
                             <?php }  ?>
                          </ul>
                       </li>
                    <?php } ?>
                    </ul>
                </div>
    		    <?php } ?>
            </div> <!-- /.conainer -->
        </div> <!-- /#panel_right -->
        
    </section>
    
    
    
    

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/main_accordion.js"></script>  
    <script>
        function goBack(){
            window.history.go(-2);
        }
        $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
		
	<?php
	for($i=0; $i<3; $i++) {
	 ?>
		$("#chevron").click(function(){
			$("#panel").toggleClass("hidden-panel");
			$("#panel_right").toggleClass("hidden-panel");
            $(".icon_position").toggleClass("right");
		});
	<?php } ?>
       
	 
    </script>

</body>
</html>