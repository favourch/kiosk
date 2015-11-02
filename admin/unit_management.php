<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
  $account_no=$_SESSION['kiosk']['user_id'];

}
else{

    header("location: login.php");
}
//echo $user_id;
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
    <?php $active_page="unit_management" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="padding:0;">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section style="padding: 25px;">
                <!-- Nav tabs -->
            
                 <div class="panel panel-default" style="width: 79%;
                                                        margin: 0 auto;
                                                        margin-right: 20px;
                                                        border: 1px solid #dadada;
                                                        border-radius: 4px;
                                                        height: 100%;">
                                                        
                      <div class="panel-heading" style="line-height: 33px;">Units
                      
                      <div style="float:right">
                      		<a class="btn btn-default" onclick="window.open('add_unit.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')"><i class="icon-plus"></i> Add</a>
                      </div>
      
                      </div>
                      
                      <div class="panel-body" style="max-height: 100%;">
         
					  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                      <colgroup>
                            <col width="100">
                            <col width="50">
                            <col width="25">

                      </colgroup>
                        <thead>
                            <tr>
                                <th>Unit Name</th>
                                <th>Unit Type</th>
                                 <th>Action</th>
                               
                                
                            </tr>
                        </thead>
                      
        	 <?php
         	   $select_unit=mysql_query("SELECT * FROM unit_t");
			   while ($row_unit=mysql_fetch_assoc($select_unit)){
				    $unit_id=$row_unit['unit_id'];
				 	$unit_name=$row_unit['unit_name'];
					$unit_abbrev=$row_unit['unit_abbrev'];
					$unit_type=$row_unit['type'];
					?>
					<tbody>
						<tr>
                     		<?php if($unit_abbrev==NULL){ ?>
                            	<td><?php echo $unit_name; ?></td>
                            <?php } else { ?>
								<td><?php echo $unit_name.' ('.$unit_abbrev.')'; ?></td>
							<?php } ?>
                            <td><?php echo $unit_type; ?></td>
							
                			<td>
                                <a class="btn btn-default btn-xs" href="manage_transaction.php?unit_id=<?php echo $unit_id; ?>" style="width: 112px;"><i class="icon-eye-open"></i> View</a>
                                <a onclick="window.open('add_unit.php?unit_id=<?php echo $unit_id; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=300,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                                <a class="btn btn-danger btn-xs" href="actions/manage_position.php?unit_id=<?php echo $unit_id; ?>&&toDo='delete'" onClick="return confirm('Are you sure you want to delete this post?')"><i class="icon-trash"></i> Delete</a>
                			</td>

						   
					
				 <?php }  //post_events_query  ?>
   					 
	 	</tr>
     </tbody>
   </table>		
   		
   			</div>  	
        </div><!-- /#panel -->
    </section>
<!-- modal event -->
 <div id="ticket_modal_event" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width: 700px; height: 515px;; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>
                <td><img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" width="111px" height: "114px"></td>
                </tr>
                
                </table>
            
                
                <div class="modal-body">
                      <h4 id="post_title"><?php echo $post_title; ?></h4>
                      <hr>
                      <table id="post_details">
                        <tr>
                          <th width="150px">Venue</th>
                          <th id="event_venue">BSIT 3c</th>
                        </tr>
                        <tr>
                          <th>Time</th>
                          <th id="event_time">Introduction to Computer Science</th>
                        </tr>
                        <tr>
                          <th>Date</th>
                          <th id="event_date">CS 11</th>
                        </tr>
                         <tr>
                          <th>Theme</th>
                          <th id="event_theme">CS 11</th>
                        </tr>
                          <th>Fee</th>
                          <th id="event_fee">7:00AM - 8:00AM</th>
                        </tr>
                        
                      </table>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                </div>
            </div>
                

        </div>
    </div>
    </div>
    
    
    <!-- modal message -->
 <div id="ticket_modal_msg" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width: 700px; height: 640px; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>
                <td><img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" width="489px" height="227px"></td>
                </tr>
                
                </table>
            
                
                <div class="modal-body">
                      <h4 id="msg_title">sample</h4>
                      <hr>
                      <table id="post_details">
                        <tr>
                          <th id="msg_content">BSIT 3c</th>
                        </tr>
                       
                      </table>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                </div>
            </div>
                

        </div>
    </div>
    </div>


 <!-- modal holidays -->
 <div id="ticket_modal_hol" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width: 700px; height: 640px; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>
                <td><img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" width="489px" height="227px"></td>
                </tr>
                
                </table>
            
                
                <div class="modal-body">
                 
                      <hr>
                      <table id="post_details">
                       <tr>
                          <th id="holidate">BSIT 3c</th>
                        </tr>
                       
                        <tr>
                          <th id="hol_occasion">BSIT 3c</th>
                        </tr>
                       
                      </table>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                </div>
            </div>
                

        </div>
    </div>
    </div>



  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
   <script>
   

   	window.show_post = function show_post(post_id, type){
			//alert("this");
     
			$.ajax({
                url: "../ajax/post_details.php",
                type: "GET",
                data: {post_id:post_id,
					   type_id:type},
					  
                async : false,
                success: function(data){
                   // alert(data);
				
                    var details = jQuery.parseJSON(data);
					var event_title=details['event_title'];
					var event_venue=details['event_venue'];
					var start_time =details['start_time'];
					var end_time =details['end_time'];
                    var date = details['date_start']+"-"+details['date_end'];
					var event_theme=details['event_theme'];
                    var fee = "P"+details['fee'];
                   
                   
				    $("#post_title").text(event_title);
					$("#event_venue").text(event_venue);
                    $("#event_time").text(event_time);
                    $("#event_date").text(date);
                    $("#event_theme").text(event_theme);
                    $("#event_fee").text(fee);
				
                }
				
            });

            $("#ticket_modal_event").modal("toggle");
       
	
}

   
        function goBack(){
            window.history.go(-2);
        }
        function toggleSize(){
            var timetable = $("#timetable");
            timetable.toggleClass("compact-table");
		}
 
   
   </script>
   
   
  

</body>
</html>