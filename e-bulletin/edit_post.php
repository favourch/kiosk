<!DOCTYPE html>
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
    <link href="../css/schedules.css" rel="stylesheet">
    <link href="../css/timetables.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    
   <style type="text/css">
	 	
        .post{
            background-color: #76F0F0;
            width: 289px;
            margin:5px;  
            word-wrap:break-word;
			display:inline-block;
			vertical-align:top;

        }
		
		.post_section {
			margin:10px 1px 0px 25px; 
			width: 1314px; 
			background-color:#FFF; 
			height: 510px;
			border:1px solid #DADADA; 
			padding: 20px 30px 20px 55px;
			overflow-y: overlay;
			}
		
		.post_show {
			height: 350px;
			}
		.headline {
			background-color: #CCFFCC;
            width: 309px;
            padding: 5px 10px 10px 10px;
            margin:5px;  
            word-wrap:break-word;
			display: inline-block;
			
			}
			
		.headline_section {
			margin:10px 1px 0px 25px; 
			width: 1314px;
			height: 50px; 
			background-color:#FFF; 
			border:1px solid #DADADA; 
			padding: 5px;
			top: -11px;
		
			}
					
		.content {
			padding: 5px 10px 10px 10px;
			box-sizing: border-box;
			color: rgba(0,0,0,0.8);
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
			font-size: 18px;
			}

        .post_column{
            
        }
        .post hr{
            margin: 0;
            border: 1px solid #9b59b6;
        }

        #column1 .post{
            background-color: #0099CC;
        }
        #column2 .post{
            background-color: #66CCFF;
        }
        #column3 .post{
            background-color: #003399;
        }
        
		.sidebar{
			margin:10px 10px 25px 12px; 
			width: 356px; 
			background-color:#FFF; 
			border:1px solid #DADADA; 
			padding: 10px; 
			overflow-y: overlay;
			height: 510px;
			transition: height 1s ease;
			}
		
		.button {
			margin: 0 0 10px 0; 
			width: 305px; 
			height: 50px;
			font-size: 24px;
			
			}
		.section{
			margin-top: 50px;
			transition: margin-top 1s ease;
			}
			
		.size {
			width: 80px; 
			height: 80px;
			
			}
			
		#grid[data-columns]{
			content: '3 .column.size-1of3';
			}
		
		/* These are the classes that are going to be applied: */
		.column { float: left; }
		.size-1of3 { width: 300px; }
		
	
    </style>
    
   
    
    
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "../resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3><i class="icon-user" ></i> Studnet Information System</h3>
            </div>
        </div>
    </section><!--/#services-->

    
   <section id="registration" class="container">
      <?php
			   require_once('../db/db.php');
			   $post_ID=$_GET['post_id'];
			   $type_id=$_GET['type_id'];
			   
		if ($type_id==1) {
		 $select_post=mysql_query("SELECT * FROM post_events_t WHERE event_id='$post_ID'");
			   while ($row_post=mysql_fetch_assoc($select_post)){
				   $event_id=$row_post['event_id'];
				   $event_title=$row_post['event_title'];
				   $event_venue=$row_post['venue'];
				   $time=$row_post['start_time'];
				   $date_start=$row_post['date_start'];
				   $date_end=$row_post['date_end'];
				   $theme=$row_post['theme'];
				   $reg_fee=$row_post['reg_fee'];
				   $cunit_id=$row_post['cunit_id'];
				   $org_id=$row_post['org_id'];
				   $dept_id=$row_post['department_id'];
				   
				
				   ?>
        <form class="center" role="form" action="../admin/actions/editpost_action.php" method="post" name="addpost_event" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 50%">
            	<div class="form-group">
                    <input type="text" name="event_title" placeholder="Event Title" class="form-control" value="<?php echo $event_title ?>"></textarea>
                </div>
                	<input type="hidden" value="<?php echo $type_id; ?>" name="type_id">
                    <input type="hidden" value="<?php echo $post_ID; ?>" name="post_id">
                <div class="form-group">
                    <input type="text" name="event_venue" placeholder="Venue" class="form-control" value="<?php echo $event_venue ?>"></textarea>
                </div>
                <div class="form-group">
                    <input type="time" name="event_time" placeholder="Time" class="form-control" value="<?php echo $time ?>"></textarea>
                </div>
                 <div class="form-group">
                    <input type="date" name="start_date" placeholder="Date" class="form-control" value="<?php echo $date_start ?>"></textarea>
                </div>
                 <div class="form-group">
                    <input type="date" name="end_date" placeholder="Date" class="form-control" value="<?php echo $date_end ?>"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="event_theme" placeholder="Theme" class="form-control" style="height:150px" value="<?php echo $theme ?>"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="event_regfee" placeholder="Registration Fee (optional)" class="form-control" value="<?php echo $reg_fee ?>"></textarea>
                </div>
               <p align="left"><b>Attachment</b></p>
                <div class="form-group">
          <?php $query_select_image=mysql_query("SELECT * FROM images_t WHERE post_id = '$post_ID' AND type_id=$type_id");
					while($row_select_image=mysql_fetch_assoc($query_select_image)) {
			
					$image = $row_select_image['img_name']; 
					$img_id = $row_select_image['img_id']; 
					
					$images[] = $img_id;
					?>
                    <div id="div<?php echo $img_id;?>" class="abcd">
                	<img class="size previewimg1" id="im<?php echo $img_id;?>" src="images/imgs_post/<?php echo $image; ?>">
                    <a id="delete<?php echo $img_id;?>"><img id="img" src="x.png" /></a>
                    </div>
          <?php } ?>
          			<p></p>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="" style="float: left;
					margin-bottom: 10px;" value="Add More Files"/>
                    
                </div>
                <br />
              	
                <div class="form-group">
                   <input type="submit" value="Post" name="submit" id="upload" class="upload"/>
                </div>
            </fieldset>
        </form>
          
      
        <?php    } //while events
			   }  //if events 
				else if ($type_id==2){ 
				$select_post=mysql_query("SELECT * FROM post_messages_t WHERE message_id='$post_ID'");
			    while ($row_post=mysql_fetch_assoc($select_post)){
				   $message_id=$row_post['message_id'];
				   $message_title=$row_post['message_title'];
				   $message_content=$row_post['message_content'];
				   $cunit_id=$row_post['cunit_id'];
				   $org_id=$row_post['org_id'];
				   $dept_id=$row_post['department_id'];
				  
				
				?>
			<form class="center" role="form" action="../admin/actions/editpost_action.php" method="post" name="addpost" enctype="multipart/form-data" >
           		<fieldset class="registration-form" style="width: 50%">
            	<div class="form-group">
                    <input type="text" name="post_title" placeholder="Post Title (optional)" class="form-control" value="<?php echo $message_title; ?>"></textarea>
                </div>
                  <input type="hidden" value="<?php echo $post_ID; ?>" name="post_id">
                 <input type="hidden" value="<?php echo $type_id; ?>" name="type_id">
                <div class="form-group">
                    <input type="text" name="post" placeholder="Post" class="form-control" style="height:150px" value="<?php echo $message_content; ?>"></textarea>
                </div>
                <p align="left"><b>Attachment</b></p>
                <div class="form-group">
          <?php $query_select_image=mysql_query("SELECT * FROM images_t WHERE post_id = '$post_ID' AND type_id=$type_id");
					while($row_select_image=mysql_fetch_assoc($query_select_image)) {
			
					$image = $row_select_image['img_name']; 
					$img_id = $row_select_image['img_id']; 
					
					$images[] = $img_id;
					?>
                    <div id="div<?php echo $img_id;?>" class="abcd">
                	<img class="size previewimg1" id="im<?php echo $img_id;?>" src="images/imgs_post/<?php echo $image; ?>">
                    <a id="delete<?php echo $img_id;?>"><img id="img" src="x.png" /></a>
                    </div>
          <?php } ?>
          			<p></p>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="" style="float: left;
					margin-bottom: 10px;" value="Add More Files"/>
                    
                </div>
                <br />
                <div class="form-group">
                   <input type="submit" value="Post" name="submit" id="upload" class="upload"/>
                </div>
            </fieldset>
        </form>
					
		<?php 
					} 
		} // if msgs
		else if ($type_id==3) {
			
			
			
			
		} // if announcements
		else if ($type_id==4){ 
		$select_post=mysql_query("SELECT * FROM post_holidays_t WHERE holiday_id='$post_ID'");
			    while ($row_post=mysql_fetch_assoc($select_post)){
				   $hol_id=$row_post['holiday_id'];
				   $hol_date=$row_post['date_of_holiday'];
				   $occasion=$row_post['occasion'];
				  
		?>
			<form class="center" role="form" action="../admin/actions/editpost_action.php" method="post" name="addpostevent" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 50%">
            	<div class="form-group">
                    <input type="date" name="hol_date" placeholder="Date" class="form-control" value="<?php echo $hol_date ?>"></textarea>
                </div>
                  <input type="hidden" value="<?php echo $post_ID; ?>" name="post_id">
                  <input type="hidden" value="<?php echo $type_id; ?>" name="type_id">
                <div class="form-group">
                    <input type="text" name="holiday" placeholder="Occasion/Event" class="form-control" style="height:150px" value="<?php echo $occasion; ?>"></textarea>
                </div>
                
                <p align="left"><b>Attachment</b></p>
                <div class="form-group">
          <?php $query_select_image=mysql_query("SELECT * FROM images_t WHERE post_id = '$post_ID' AND type_id=$type_id");
					while($row_select_image=mysql_fetch_assoc($query_select_image)) {
			
					$image = $row_select_image['img_name']; 
					$img_id = $row_select_image['img_id']; 
					
					$images[] = $img_id;
					?>
                    <div id="div<?php echo $img_id;?>" class="abcd">
                	<img class="size previewimg1" id="im<?php echo $img_id;?>" src="images/imgs_post/<?php echo $image; ?>">
                    <a id="delete<?php echo $img_id;?>"><img id="img" src="x.png" /></a>
                    </div>
          <?php } ?>
          			<p></p>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="" style="float: left;
					margin-bottom: 10px;" value="Add More Files"/>
                    
                </div>
                <br />
              	
                <div class="form-group">
                   <input type="submit" value="Post" name="submit" id="upload" class="upload"/>
                </div>
            </fieldset>
        </form>	
				
		<?		
		} // if holiday
	}
			
		 ?>
    </section><!--/#registration-->
    
   
     <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script src="../js/script.js"></script>
    
 
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').dataTable({
			"bLengthChange": false,
			'iDisplayLength': 4,			
			});
	});
	</script>
    <script>
        function goBack(){
            window.history.go(-2);
        }
       
	   
	<?php 
			
			 foreach($images as $img_id) { ?>
					$('#delete<?php echo $img_id?>').click (function(){
						
						var img_id = <?php echo $img_id; ?>;
						$.ajax({
							url: "actions/delete_image_action.php",
							type: "GET",
							data: {img_id:img_id},
							async : false,
							success: function(data){	
							
								$('#div<?php echo $img_id;?>').remove();
							}
				
						});
					});
			
			
	<?php } ?>
    </script>
</body>
</html>

