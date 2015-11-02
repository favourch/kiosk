<!DOCTYPE html>
<?php   require_once('../db/db.php'); 

session_start();

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
    <link href="../js/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
   
   
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
  
     <style type="text/css">

        .post{
            background-color: rgba(255, 255, 0, 0.57);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
        .post_m{
            background-color: rgba(239, 0, 255, 0.57);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
        .post_a{
            background-color: rgba(79, 154, 239, 0.57);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
        .post_h{
            background-color: rgba(5, 255, 8, 0.68);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
		
		
		.post_section {
			margin: 0 auto;
			margin-right: 150px;
			margin-top: 20px;
			width: 1066px;
			height: 87%;
			padding: 0px 10px 10px 10px;
			transition: width 1s ease, margin-right 1s ease;
			}
		
		.post_adjust {
			margin-right: 45px;
			width: 1045px;
			
			}
		
	
					
		.content {
			padding: 5px 10px 10px 10px;
			box-sizing: border-box;
			color: rgba(0,0,0,0.8);
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
			font-size: 18px;
			font-family: 'Roboto', sans-serif;
			}

       
        .post hr{
            margin: 0;
            border: 1px solid #9b59b6;
        }
		
		#title {
			font-weight:bold;
			font-size:20px;
			padding-bottom: 5px;
			}

       
		.button {
			margin: 0 0 10px 0; 
			width: 305px; 
			height: 50px;
			font-size: 24px;
			
			}
		.section{
			margin-top: -10px;
			}
			
		
		
		.size {
			width: 239px;
			height: 125px;
			
			}
		.sizeof2 {
			width: 120px;
			height: 125px;
			
			
			}
		.sizeof3 {
			width: 117px;
			height: 62px;
		}
		.sample{
			width:100px;
			display: table-cell;
			}

			
		.side {
			margin: 10px 10px 0px 10px; 
			color: #FFF; 
			font-size: 20px; 
			padding: 10px;
			
			}
	
		
		.footer {
			font-style: italic;
			font-size: 12px;
			float: right;
			font-family: Arial
						
			}
			

	
		.tab-up {
			height: 50px;
			padding-top: 15px;
			transition: height 1s ease, padding-top 1s ease;

		}
		.tab-down {
			height: 88px; 
			padding-top: 35px;

		}
		
		.heading {
			height: 55px;
			transition: height 1s ease;
		}

		.heading-adjust {
			height: 93px;
		}

		.unit_checkbox {
			margin: 21px 5px 21px 100px;
		}

		.unit_adjust{
			margin: 21px 5px 21px 300px;
		}
    </style>
    
    
</head><!--/head-->
<body style="overflow:hidden; background: rgb(255, 255, 255);"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>


    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3><i class="icon-user" ></i> E-Bulletin</h3>
            </div>
        </div>
    </section><!--/#services-->
  	
 	
    <?php
	 date_default_timezone_set("Asia/Manila");
			   $date_now=date('Y-m-d H:i:s');
			   //echo $date_now;
	
			 	//$type_id=$_GET['type_id'];
			    $count=0;
			    if((isset($_GET["personnel_id"]))){
			   		$personnel_id=$_GET['personnel_id'];
			   		//$unit_id=$_GET['dept_id'];
			   
			   
					$query_select_posts=mysql_query("SELECT * FROM personnel_members_t, posts_t WHERE (personnel_members_t.personnel_id='$personnel_id') 
											AND (personnel_members_t.account_no=posts_t.account_no) AND (posts_t.identity<>'anonymous' AND posts_t.identity<>'unit') 
											ORDER BY posts_t.date_of_post DESC, posts_t.time_of_post DESC") or die(mysql_error());

				} else if (isset($_GET["type_id"])){
					$type=$_GET["type_id"];	
					//echo $type;
					$query_select_posts=mysql_query("SELECT * FROM posts_t ORDER BY posts_t.date_of_post DESC, posts_t.time_of_post DESC") or die(mysql_error());
					
				}	


	
	$c=0;
     if(true){
     	 
     		//echo mysql_num_rows($query_select_posts);
				 
    ?>

    <div class="post_section" style="" id="post_section">

            <div class="panel panel-default " style="height: 600px; overflow-y: hidden">
            
              		<ul class="nav nav-tabs heading" role="tablist" style="border-bottom:1;" id="heading">
    
    	
					<li id="Event_tab" class="" style="">
	                        	<a id="tabEvent" href="#Event" data-toggle="tab" class="tab-up">Events</a>
	            	</li>
					<li id="Message_tab" class="" style="">
	                        	<a id="tabMessage" href="#Message" data-toggle="tab" class="tab-up">Messages</a>
	           	 		</li>
					<li id="Announcement_tab" class="" style="">
	                        	<a id="tabAnnouncement" href="#Announcement" data-toggle="tab" class="tab-up">Announcements</a>
	            	</li>
					<li id="Holiday_tab" class="" style="">
	                        	<a id="tabHoliday" href="#Holiday" data-toggle="tab" class="tab-up">Holidays</a>
	            	</li>
                  

     <div id="form-group">
           <input type="checkbox" name="faculty_chck" value="" id="faculty" style="margin: 21px 5px 21px 300px;"/>
           <label style="font-size: larger" id="faculty_label">Faculty</label> 

            <input type="checkbox" name="unit" value="" id="unit_checkbox" style="margin: 21px 5px 21px 100px;" /> 
            <label style="font-size: larger" id="unit_label"> Unit</label><br />
           
            <select style="width: 307px; margin-left: 719px; margin-top: -6px;" id="unit_options" class="form-control hidden">
             <?php $query_unit=mysql_query("SELECT * FROM unit_t"); 
					while($row_unit=mysql_fetch_assoc($query_unit)){
						$unit_id=$row_unit['unit_id'];
						$unit_name=$row_unit['unit_name'];
						
			?>
            	<option value="<?php echo $unit_id ?>"><?php echo $unit_name; ?>
           <?php } ?>
            </select>

            <select id="faculty_option" class="form-control hidden" style="width: 307px; margin-left: 719px; margin-top: -6px;">
             <?php $query_faculty=mysql_query("SELECT * FROM personnel_t"); 
					while($row_faculty=mysql_fetch_assoc($query_faculty)){
						$personnel_id=$row_faculty['personnel_id'];
						$fname=$row_faculty['f_name'];
						$lname=$row_faculty['l_name'];
						$full_name=ucfirst($fname).' '.ucfirst($lname);
						
			?>
            	<option value="<?php echo $personnel_id ?>"><?php echo $full_name; ?>
           <?php } ?>
            </select> 

     </div>
            		
     </ul>




 <div class="tab-content" style="height:90%;height: 86%;overflow-y: auto;" id="content">
        

   	<div class="tab-pane" id="Event">
           <div class="panel-body" style="height: 100%;">
				
               <div class="js-masonry" id="event" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php
               		  while($row_select_posts=mysql_fetch_assoc($query_select_posts)){
					  	$account_no=$row_select_posts['account_no'];
					   	$post_id=$row_select_posts['post_id'];
					   	$post_title=$row_select_posts['post_title'];
					   	$time_of_post=$row_select_posts['time_of_post'];
					   	$date_of_post=$row_select_posts['date_of_post'];
					   	$identity=$row_select_posts['identity'];
					   	$type_of_post=$row_select_posts['type_of_post'];
					   	$status=$row_select_posts['status'];
					   //echo "$post_title";
					   	$posts[$c]["post_id"]=$post_id;
					   	$posts[$c]["types"]=$type_of_post;
					   	$posts[$c]["post_title"]=$post_title;
					   	$posts[$c]["time_of_post"]=$time_of_post;
					   	$posts[$c]["date_of_post"]=$date_of_post;
					   	$posts[$c]["identity"]=$identity;
				   		$posts[$c]["account_no"]=$account_no;
				   		$posts[$c]["status"]=$status;
    					$c++; 

    				}
               		 ?>



          		</div>  <!-- masonry -->
          </div><!--panel body -->
      
  </div> <!-- //tabpane -->


<div class="tab-pane" id="Message">

              <div class="panel-body" style="height: 100%;">
				
               <div class="js-masonry" id="message" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php
               		  while($row_select_posts=mysql_fetch_assoc($query_select_posts)){
					  	$account_no=$row_select_posts['account_no'];
					   	$post_id=$row_select_posts['post_id'];
					   	$post_title=$row_select_posts['post_title'];
					   	$time_of_post=$row_select_posts['time_of_post'];
					   	$date_of_post=$row_select_posts['date_of_post'];
					   	$identity=$row_select_posts['identity'];
					   	$type_of_post=$row_select_posts['type_of_post'];
					   	$status=$row_select_posts['status'];
					   //echo "$post_title";
					   	$posts[$c]["post_id"]=$post_id;
					   	$posts[$c]["types"]=$type_of_post;
					   	$posts[$c]["post_title"]=$post_title;
					   	$posts[$c]["time_of_post"]=$time_of_post;
					   	$posts[$c]["date_of_post"]=$date_of_post;
					   	$posts[$c]["identity"]=$identity;
				   		$posts[$c]["account_no"]=$account_no;
				   		$posts[$c]["status"]=$status;
				   
    					$c++;
               		
    					}


               		 ?>

          		</div>  <!-- masonry -->
          </div><!--panel body -->
       
   
 </div> <!-- //tabpane -->


 <div class="tab-pane" id="Announcement">
              <div class="panel-body" style="max-height: 570px;">
				
               <div class="js-masonry" id="ann" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php
               		  while($row_select_posts=mysql_fetch_assoc($query_select_posts)){
					  	$account_no=$row_select_posts['account_no'];
					   	$post_id=$row_select_posts['post_id'];
					   	$post_title=$row_select_posts['post_title'];
					   	$time_of_post=$row_select_posts['time_of_post'];
					   	$date_of_post=$row_select_posts['date_of_post'];
					   	$identity=$row_select_posts['identity'];
					   	$type_of_post=$row_select_posts['type_of_post'];
					   	$status=$row_select_posts['status'];
					   //echo "$post_title";
					   	$posts[$c]["post_id"]=$post_id;
					   	$posts[$c]["types"]=$type_of_post;
					   	$posts[$c]["post_title"]=$post_title;
					   	$posts[$c]["time_of_post"]=$time_of_post;
					   	$posts[$c]["date_of_post"]=$date_of_post;
					   	$posts[$c]["identity"]=$identity;
				   		$posts[$c]["account_no"]=$account_no;
				   		$posts[$c]["status"]=$status;
				   
    					$c++;
               		 

    					}
               		 ?>

          		</div>  <!-- masonry -->
          </div><!--panel body -->
   
 </div> <!-- //tabpane -->

 <div class="tab-pane" id="Holiday">
              <div class="panel-body" style="max-height: 570px;">
				
               <div class="js-masonry" id="holidays" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php
               		  while($row_select_posts=mysql_fetch_assoc($query_select_posts)){
					  	$account_no=$row_select_posts['account_no'];
					   	$post_id=$row_select_posts['post_id'];
					   	$post_title=$row_select_posts['post_title'];
					   	$time_of_post=$row_select_posts['time_of_post'];
					   	$date_of_post=$row_select_posts['date_of_post'];
					   	$identity=$row_select_posts['identity'];
					   	$type_of_post=$row_select_posts['type_of_post'];
					  	$status=$row_select_posts['status'];
					   //echo "$post_title";
					   	$posts[$c]["post_id"]=$post_id;
					   	$posts[$c]["types"]=$type_of_post;
					   	$posts[$c]["post_title"]=$post_title;
					   	$posts[$c]["time_of_post"]=$time_of_post;
					   	$posts[$c]["date_of_post"]=$date_of_post;
					   	$posts[$c]["identity"]=$identity;
				   		$posts[$c]["account_no"]=$account_no;
				   		$posts[$c]["status"]=$status;
				   
    					$c++;

    				}
               		 ?>

          		</div>  <!-- masonry -->
          	</div><!--panel body -->
         </div><!-- tab pane -->
   
	   </div> <!-- tab content -->
	</div><!-- panel default -->
</div><!-- post section -->



   <?php 	
				   
		}  
		//mysql_num_rows;
		?>
  	
	<!-- modal holidays -->
  <div id="ticket_modal_event" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width: 570px; height: 515px;; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="">  <!--modified-->
          
            <div class="modal-" style="width:100%; height:100%; display:inline-block; padding:28px; background-color: rgba(255, 255, 0, 0.57);" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>

                <td>
                <div id="event_modal" style="">
              
                </div>
                </td>
                </tr>
                
                </table>
            
                
                <div class="modal-body" style="margin-left: -20px; font-size: 20px; margin-top: -10px;">
                      <h4 id="post_title" style="font-size: 30px;"><?php echo $post_title; ?></h4>
                      <hr>
                      <table id="post_details">
                        <tr>
                          <th width: "69px">Venue</th>
                          <th style="width: 33px;">:</th>
                          <th id="event_venue">BSIT 3c</th>
                        </tr>
                        <tr>
                          <th>Time</th>
                          <th>:</th>
                          <th id="event_time">Introduction to Computer Science</th>
                        </tr>
                        <tr>
                          <th>Date</th>
                          <th>:</th>
                          <th id="event_date">CS 11</th>
                        </tr>
                         <tr>
                          <th>Theme</th>
                          <th>:</th>
                          <th id="event_theme">CS 11</th>
                        </tr>
                          <th>Fee</th>
                          <th>:</th>
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
    <div class="modal-dialog" style="width: 570px; height: 640px; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="">  <!--modified-->
            <div style="width:100%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:100%;height:100%; display:inline-block; padding:28px; background-color: rgba(239, 0, 255, 0.57);" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>
                <td>
                <div id="msg_modal">
                  <img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" width="489px" height="227px"></td>
                </div>
                </tr>
                
                </table>
            
                
                <div class="modal-body" style="font-size: 20px">
                      <h4 id="msg_title" style="font-size: 30px">sample</h4>
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
    <div class="modal-dialog" style="width: 570px; height: 640px; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="">  <!--modified-->
            <div style="width:100%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:100%;height:100%; display:inline-block; padding:28px; background-color: rgba(5, 255, 8, 0.68);" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>
                <td>
                <div id="holiday_modal">
                  <img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" style="width:'489px' height:'227px'"></td>
                </div>
                </tr>
                
                </table>
            
                 
                <div class="modal-body" style="font-size: 20px">
                 	<h4 id="holidate" style="font-size: 30px">sample</h4>
                      <hr>
                      
                      <table id="post_details">
                     
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

   
    
    <script src="../js/libs/jquery-1.8.3.min.js"></script>
	<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
	<script src="../js/Application.js"></script>
	 <script src="../js/lightbox/jquery.lightbox.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/masonry.pkgd.min.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
   

  
    <script>
    $("#tabMessage").click(function(){
		
		var $msg=$("#message");
		$msg.imagesLoaded(function(){
			$msg.masonry();
		})

	})

     $("#tabEvent").click(function(){
		
		var $events=$("#event");
		$events.imagesLoaded(function(){
			$events.masonry();
		})


	})
      $("#tabHoliday").click(function(){
		
		var $holidays=$("#holidays");

		$holidays.imagesLoaded(function(){
			$holidays.masonry();
		})

	})

       $("#tabAnnouncement").click(function(){
		
		var $ann=$("#ann");

		$ann.imagesLoaded(function(){
			$ann.masonry();
		})


	})
   /* $(".js-masonry").imagesLoaded(function(){
    	//alert("didi");
    	$(".js-masonry").masonry({

    		itemSelector: ".item",
    		isAnimated: true,
    		isFitWidth: true,

    	})


    }) */

   
	
	
	
	

	  function goBack(){
            window.history.go(-2);
        }
		

	
        var posts=<?php echo json_encode(isset($posts)?$posts:""); ?>;
       
       	if(posts==""){
       		//alert("here");
       		$("#content").html("<h1>No Post Found</h1>")
       	}
		
		$.ajax({
			url: "event.php",
			type: "POST",
			data: {posts:posts},
			async: false,
			success: function(data){
					//alert("here");
					//console.log(data);
					$("#event").html(data);


			}

		})

		$.ajax({
			url: "message.php",
			type: "POST",
			data: {posts:posts},
			async: false,
			success: function(data){
					//alert(data)
					$("#message").html(data);


			}

		})

		$.ajax({
			url: "holiday.php",
			type: "POST",
			data: {posts:posts},
			async: false,
			success: function(data){
					//alert(data)
					$("#holidays").html(data);


			}

		})

		$.ajax({
			url: "announcement.php",
			type: "POST",
			data: {posts:posts},
			async: false,
			success: function(data){
					//alert(data)
					$("#ann").html(data);


			}

		})

	

	$("#faculty").click(function() {
		if($("#faculty").is(':checked')){
			$("#faculty_option").removeClass("hidden").addClass("show");
			$("#unit_checkbox").addClass("hidden");
			$("#unit_label").addClass("hidden");

			$("#heading").addClass("heading-adjust")
			$("#tabEvent").addClass("tab-down");
			$("#tabMessage").addClass("tab-down");
			$("#tabAnnouncement").addClass("tab-down");
			$("#tabHoliday").addClass("tab-down");

			$("#faculty_option").change(function(){
				var personnel_id = $("#faculty_option").val();

				$.ajax({
					url: "post_faculty.php",
					method: "GET",
					data: {personnel_id: personnel_id},
					async: false,
					success: function(data){
						//alert(data);
						
						$("#Message_tab").removeClass("active");
						$("#Announcement_tab").removeClass("active");
						$("#Holiday_tab").removeClass("active");
						$("#Event_tab").addClass("active");
						$("#content").html(data);



					}

				})
		})
		} else {
			//alert("didi");
			$("#heading").removeClass("heading-adjust");
			$("#tabEvent").removeClass("tab-down");
			$("#tabMessage").removeClass("tab-down");
			$("#tabAnnouncement").removeClass("tab-down");
			$("#tabHoliday").removeClass("tab-down");
			$("#faculty_option").removeClass("show").addClass("hidden");
			$("#unit_checkbox").removeClass("hidden");
			$("#unit_label").removeClass("hidden");

		}

	})


	$("#unit_checkbox").click(function() {
		if($("#unit_checkbox").is(':checked')){
			$("#unit_options").removeClass("hidden").addClass("show");
			$("#faculty").addClass("hidden");
			$("#faculty_label").addClass("hidden");

			$("#heading").addClass("heading-adjust")
			$("#tabEvent").addClass("tab-down");
			$("#tabMessage").addClass("tab-down");
			$("#tabAnnouncement").addClass("tab-down");
			$("#tabHoliday").addClass("tab-down");


			$("#unit_options").change(function(){
				var unit_id = $("#unit_options").val();

				$.ajax({
					url: "e-bulletin_bydept.php",
					method: "GET",
					data: {unit_id: unit_id},
					async: false,
					success: function(data){
						//alert(data);
						//console.log(data);
						$("#Message_tab").removeClass("active");
						$("#Announcement_tab").removeClass("active");
						$("#Holiday_tab").removeClass("active");
						$("#Event_tab").addClass("active");
						$("#content").html(data);

						var $events=$("#event");
						$events.imagesLoaded(function(){
							$events.masonry();
						})


						var $msg=$("#message");
						$msg.imagesLoaded(function(){
							$msg.masonry();
						})

						
						var $holidays=$("#holidays");

						$holidays.imagesLoaded(function(){
							$holidays.masonry();
						})
					}

				});
			})
		} else {
			//alert("didi");
			$("#heading").removeClass("heading-adjust");
			$("#tabEvent").removeClass("tab-down");
			$("#tabMessage").removeClass("tab-down");
			$("#tabAnnouncement").removeClass("tab-down");
			$("#tabHoliday").removeClass("tab-down");

			$("#unit_options").removeClass("show").addClass("hidden");
			$("#faculty").removeClass("hidden");
			$("#faculty_label").removeClass("hidden");

		}

	})
	
	$(document).ready(function(){

		var url = window.location;
		var array = String(url).split("#");
		var target;

		if(array.length>1){
			target=array[1];
		}


		$("#"+target).addClass("active");
		$("#"+target+"_tab").addClass("active");
	})
	

	 function item_click(post_id){
	 	//alert("here");
        $.ajax({
            url: "../ajax/event_modal.php",
            method: "GET",
            data: {post_id:post_id},
            async: true,
            success: function(data){
            		  //alert(data);
                      var details = jQuery.parseJSON(data);
                      var type=details['type'];
                      //alert(type);
                  if(type=="event"){
                      var event_title=details['event_title'];
                      var event_venue=details['event_venue'];
                      var event_time =details['event_time'];
                      var event_date = details['event_date'];
                     
                      if(details['fee']=="FREE") {
                        var fee=details['fee'];
                      } else {
                        var fee = "P"+details['fee'];
                      }
                      var imgs=details['img'];

                      if(details['event_theme']==""){
                      	var event_theme="N/A";

                      } else {
                      	var event_theme=details['event_theme'];
                      }
                      //alert(imgs);
                   	
                      $("#post_title").text(event_title);
                      $("#event_venue").text(event_venue);
                      $("#event_time").text(event_time);
                      $("#event_date").text(event_date);
                      $("#event_theme").text(event_theme);
                      $("#event_fee").text(fee);
                      $("#event_modal").html(imgs);
                      console.log(" here i am");
                      $("#ticket_modal_event").modal("toggle");
                    
                  } else if (type=="message"){
                          //alert ("didi");
                                var msg_title=details['msg_title'];
                                var msg_content=details['msg_content'];
                            var imgs=details['img'];
                         
                              $("#msg_title").text(msg_title);
                                $("#msg_content").text(msg_content);
                 
                      $("#msg_modal").html(imgs);
                      $("#ticket_modal_msg").modal("toggle");
                      
                  }  else if (type=="holiday") {
  
                              //alert("holiday");
                                var holidate=details['holidate'];
                                var occasion=details['occasion'];
                              var imgs=details['img'];
                     
                              $("#holidate").text(holidate);
                              $("#hol_occasion").text(occasion);
                     
                      $("#holiday_modal").html(imgs); 
                      $("#ticket_modal_hol").modal("toggle");
        
   
                   } 
                }
            
        })

    }

    </script>


</body>
</html>