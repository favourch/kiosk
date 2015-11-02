<?php
include "../db/db.php";

$personnel_id=$_GET["personnel_id"];

$query_select_posts=mysql_query("SELECT * FROM personnel_members_t, posts_t WHERE (personnel_members_t.personnel_id='$personnel_id') 
								AND (personnel_members_t.account_no=posts_t.account_no) AND (posts_t.identity<>'anonymous' AND posts_t.identity<>'unit') ORDER BY posts_t.date_of_post DESC, posts_t.time_of_post DESC") or die(mysql_error());

if(mysql_num_rows($query_select_posts)>0){
?>


      
   <div class="tab-pane active" id="Event">
           <div class="panel-body" style="height: 100%;">
				
               <div class="js-masonry" id="event" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php
               		  $c=0;
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
<?php }
if(mysql_num_rows($query_select_posts)>0){ ?>

   <div class="tab-pane" id="Message">

              <div class="panel-body" style="max-height: 570px;">
				
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
					   	$posts[$c]["status"]=$status;
				   
    					$c++;
               		
    					}


               		 ?>

          		</div>  <!-- masonry -->
          </div><!--panel body -->
       
   
 </div> <!-- //tabpane -->
<?php } 
if(mysql_num_rows($query_select_posts)>0){ ?>

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
					   	$posts[$c]["status"]=$status;

				   
    					$c++;
               		 

    					}
               		 ?>

          		</div>  <!-- masonry -->
          </div><!--panel body -->
   
 </div> <!-- //tabpane -->
<?php }
if(mysql_num_rows($query_select_posts)>0){ ?>
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
					   	$posts[$c]["status"]=$status;
				   
    					$c++;

    				}
               		 ?>

          		</div>  <!-- masonry -->
          	</div><!--panel body -->
         </div><!-- tab pane -->
   <?php } else { ?>
		
		 <div class="tab-pane active" id="Event">
           <div class="panel-body" style="height: 100%;">
				<h1>No Post Found</h1>
          </div><!--panel body -->
      
  </div> <!-- //tabpane -->

	<?php 
}   ?>

<script>
 var posts=<?php echo json_encode($posts); ?>;
		//var account_no=<?php echo $account_no ?>;
			
		//alert(account_no);
		$.ajax({
			url: "event.php",
			type: "POST",
			data: {posts:posts},
			async: false,
			success: function(data){
					//alert(data);
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
			url: "announcement.php",
			type: "POST",
			data: {posts:posts},
			async: false,
			success: function(data){
					//alert(data)
					$("#ann").html(data);


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

		var events=$("#event");

		events.imagesLoaded(function(){
			events.masonry();
		})

		var msg=$("#message");

		msg.imagesLoaded(function(){
			msg.masonry();
		})

		var ann=$("#ann");

		ann.imagesLoaded(function(){
			ann.masonry();
		})

		var holidays=$("#holidays");

		holidays.imagesLoaded(function(){
			holidays.masonry();
		})
</script>
