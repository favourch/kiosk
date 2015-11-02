<!DOCTYPE html>
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
 
   
    
    
</head><!--/head-->
<body style="padding-top: 0px;"> <!-- Remove overflow to use scrollbars -->    
   
      <?php
			   include '../db/db.php';
			   $post_ID=$_GET['post_id'];
			   $type=$_GET['type'];

	$query_post=mysql_query("SELECT * FROM posts_t WHERE post_id='$post_ID'");
	$row=mysql_fetch_assoc($query_post);
		//$post_id=$row['post_id'];
		$post_title=$row['post_title'];


	if ($type=='event') {
		 $select_post=mysql_query("SELECT * FROM post_events_t WHERE event_id='$post_ID'");
			   while ($row_post=mysql_fetch_assoc($select_post)){
				   //$event_id=$row_post['event_id'];
				   //$event_title=$row_post['event_title'];
				   $event_venue=$row_post['venue'];
				   $time=$row_post['start_time'];
                   $end_time=$row_post['end_time'];
				   $date_start=$row_post['date_start'];
				   $date_end=$row_post['date_end'];
				   $theme=$row_post['theme'];
				   $reg_fee=$row_post['reg_fee'];
				   
				
				   ?>
        <form class="center" role="form" action="actions/editpost_action.php" method="post" name="addpost_event" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 93%;">
            	<div class="form-group">
                    <input type="text" name="event_title" placeholder="Event Title" class="form-control" value="<?php echo $post_title ?>"></textarea>
                </div>
                	<input type="hidden" value="<?php echo $type; ?>" name="type_id">
                    <input type="hidden" value="<?php echo $post_ID; ?>" name="post_id">
                <div class="form-group">
                    <input type="text" name="event_venue" placeholder="Venue" class="form-control" value="<?php echo $event_venue ?>"></textarea>
                </div>
                <div class="form-group">
                    <input type="time" name="event_time" placeholder="Time" class="form-control" value="<?php echo $time ?>"></textarea>
                </div>
                 <div class="form-group">
                    <input type="time" name="end_time" placeholder="Time" class="form-control" value="<?php echo $end_time ?>"></textarea>
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
          <?php $query_select_image=mysql_query("SELECT * FROM attachment_t WHERE post_id = '$post_ID'");
					while($row_select_image=mysql_fetch_assoc($query_select_image)) {
			
					$image = $row_select_image['attachment_name']; 
					$img_id = $row_select_image['attachment_id']; 
					
					$images[] = $img_id;
					?>
                    <div id="div<?php echo $img_id;?>" class="abcd">
                	<img class="size previewimg1" id="im<?php echo $img_id;?>" src="../e-bulletin/images/imgs_post/<?php echo $image; ?>">
                    <a href="" id="delete<?php echo $img_id;?>"><img id="img" src="x.png" /></a>
                    </div>
          <?php } ?>
          			<p></p>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="" style="float: left;
					margin-bottom: 10px;" value="Add More Files"/>
                    
                </div>
                <br />
              	
                <div class="form-group">
                   <input type="submit" value="Update" name="submit" class="upload"/>
                </div>
            </fieldset>
        </form>
          
      
        <?php    } //while events
			   }  //if events 
	else if ($type=='message'){ 
				    $select_post=mysql_query("SELECT * FROM post_messages_t WHERE message_id='$post_ID'");
			         while ($row_post=mysql_fetch_assoc($select_post)){
				  // $message_id=$row_post['message_id'];
				   //$message_title=$row_post['message_title'];
				            $message_content=$row_post['message_content'];
				 
				
				?>
			<form class="center" role="form" action="actions/editpost_action.php" method="post" name="addpost" enctype="multipart/form-data" >
           		<fieldset class="registration-form" style="width: 93%;">
            	<div class="form-group">
                    <input type="text" name="post_title" placeholder="Post Title (optional)" class="form-control" value="<?php echo $post_title; ?>"></textarea>
                </div>
                  <input type="hidden" value="<?php echo $post_ID; ?>" name="post_id">
                 <input type="hidden" value="<?php echo $type; ?>" name="type_id">
                <div class="form-group">
                    <input type="text" name="post" placeholder="Post" class="form-control" style="height:150px" value="<?php echo $message_content; ?>"></textarea>
                </div>
                <p align="left"><b>Attachment</b></p>
                <div class="form-group">
          <?php $query_select_att=mysql_query("SELECT * FROM attachment_t WHERE post_id = '$post_ID'");
					while($row_select_att=mysql_fetch_assoc($query_select_att)) {
			
					$attachment_name = $row_select_att['attachment_name']; 
					$attachment_id = $row_select_att['attachment_id']; 
					
					$images[] = $attachment_id;
					?>
                    <div id="div<?php echo $attachment_id;?>" class="abcd">
                	<img class="size previewimg1" id="im<?php echo $attachment_id;?>" src="../e-bulletin/images/imgs_post/<?php echo $attachment_name; ?>">
                    <a href="" id="delete_msg<?php echo $attachment_id ?>"><img id="img" src="x.png" /></a>
                    </div>
          <?php } ?>
          			<p></p>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="" style="float: left;
					margin-bottom: 10px;" value="Add More Files"/>
                    
                </div>
                <br />
                <div class="form-group">
                   <input type="submit" value="Update" name="submit" class="upload"/>
                </div>
            </fieldset>
        </form>
					
		<?php 
				}
		} // if msgs
		else if ($type=='announcement') {
			     $select_post=mysql_query("SELECT * FROM post_announcements_t WHERE announcement_id='$post_ID'");
                     while ($row_post=mysql_fetch_assoc($select_post)){
                  // $message_id=$row_post['message_id'];
                   //$message_title=$row_post['message_title'];
                            $announcement_desc=$row_post['announcement_desc'];
                 
                
                ?>
            <form class="center" role="form" action="actions/editpost_action.php" method="post" name="addpost" enctype="multipart/form-data" >
                <fieldset class="registration-form" style="width: 93%;">
                <div class="form-group">
                    <input type="text" name="post_title" placeholder="Post Title (optional)" class="form-control" value="<?php echo $post_title; ?>"></textarea>
                </div>
                  <input type="hidden" value="<?php echo $post_ID; ?>" name="post_id">
                 <input type="hidden" value="<?php echo $type; ?>" name="type_id">
                <div class="form-group">
                    <input type="text" name="ann_desc" placeholder="Post" class="form-control" style="height:150px" value="<?php echo $announcement_desc; ?>"></textarea>
                </div>
                <p align="left"><b>Attachment</b></p>
                <div class="form-group">
          <?php $query_select_att=mysql_query("SELECT * FROM attachment_t WHERE post_id = '$post_ID'");
                    while($row_select_att=mysql_fetch_assoc($query_select_att)) {
            
                    $attachment = $row_select_att['attachment_name']; 
                    $att_id = $row_select_att['attachment_id']; 
                    
                   
                    ?>
                    <div id="delete_att" style="width: 100%; height: 100%; background-color: navajowhite; border-radius: 20px;">
                    <a style="font-size: 18px;" href="" onclick="window.open('../e-bulletin/actions/view_pdf.php?filename=<?php echo $attachment ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1500, height=1500,position=center')"><?php echo $attachment; ?></a>
                    <a onclick="del_attachment(<?php echo $att_id ?>)" href=""><img id="img" style="height: 24px; width: 26px; position: fixed; margin-top: -11px;margin-left: 76px;" src="x.png" /></a>
                    </div>
          <?php } ?>
                    <p></p>
                    <div id="filediv"><input name="file" type="file"/></div><br/>
                    
                </div>
                <br />
                <div class="form-group">
                   <input style="width: 100%" type="submit" value="Post" name="submit" class="btn btn-info"/>
                </div>
            </fieldset>
        </form>
                    
        <?php 
                }
			
			
			
		} // if announcements
		else if ($type=="holiday"){
             $select_post=mysql_query("SELECT * FROM post_holidays_t WHERE holiday_id='$post_ID'");
                     while ($row_post=mysql_fetch_assoc($select_post)){
                  // $message_id=$row_post['message_id'];
                   //$message_title=$row_post['message_title'];
                            $holidate=$row_post['date_of_holiday'];
                 
                
                ?>
            <form class="center" role="form" action="actions/editpost_action.php" method="post" name="addpost" enctype="multipart/form-data" >
                <fieldset class="registration-form" style="width: 93%;">
                <div class="form-group">
                    <input type="date" name="holidate" placeholder="Post Title (optional)" class="form-control" value="<?php echo $holidate; ?>"></textarea>
                </div>
                  <input type="hidden" value="<?php echo $post_ID; ?>" name="post_id">
                 <input type="hidden" value="<?php echo $type; ?>" name="type_id">
                <div class="form-group">
                    <input type="text" name="occasion" placeholder="Post" class="form-control" style="height:150px" value="<?php echo $post_title; ?>"></textarea>
                </div>
                <p align="left"><b>Attachment</b></p>
                <div class="form-group">
          <?php $query_select_att=mysql_query("SELECT * FROM attachment_t WHERE post_id = '$post_ID'");
                    while($row_select_att=mysql_fetch_assoc($query_select_att)) {
            
                    $attachment_name = $row_select_att['attachment_name']; 
                    $attachment_id = $row_select_att['attachment_id']; 
                    
                    $images[] = $attachment_id;
                    ?>
                    <div id="div<?php echo $attachment_id;?>" class="abcd">
                    <img class="size previewimg1" id="im<?php echo $attachment_id;?>" src="../e-bulletin/images/imgs_post/<?php echo $attachment_name; ?>">
                    <a href="" id="delete<?php echo $attachment_id;?>"><img id="img" src="x.png" /></a>
                    </div>
          <?php } ?>
                    <p></p>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="" style="float: left;
                    margin-bottom: 10px;" value="Add More Files"/>
                    
                </div>
                <br />
                <div class="form-group">
                   <input type="submit" value="Update" name="submit" class="upload"/>
                </div>
            </fieldset>
        </form>
                    
        <?php 
                }

        }
		
			
		 ?>
   
    
   
     <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script src="../js/script.js"></script>
    

    <script>

         function del_attachment(att_id){
                    alert(att_id);
                        $.ajax({
                            url: "actions/delete_image_action.php",
                            type: "GET",
                            data: {att_id:att_id, action: "delete_att"},
                            async : false,
                            success: function(data){    
                                //alert(data);
                                $('#delete_att').remove();

                            }
                
                        });
         }
                   

        function goBack(){
            window.history.go(-2);
        }
       
        
		<?php 
        if($_GET['type']=="message") {
             foreach($images as $attachment_id) { ?>

                $('#delete_msg<?php echo $attachment_id ?>').click (function(){

						var img_id = <?php echo $attachment_id; ?>;
						
						$.ajax({
							url: "actions/delete_image_action.php",
							type: "GET",
							data: {img_id:img_id},
							async : false,
							success: function(data){	
								//alert(data);
								$('#div<?php echo $attachment_id;?>').remove();

							}
				
						});
                    });
                    <?php    } 
                } ?>
					
			
			



    </script>
</body>
</html>

