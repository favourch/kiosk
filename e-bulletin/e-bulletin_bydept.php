<?php
include "../db/db.php";

$unit_id=$_GET['unit_id'];
//echo $unit_id;
$query_member_t=mysql_query("SELECT * FROM member_t, personnel_members_t WHERE member_t.unit_id='$unit_id' 
							AND member_t.member_id=personnel_members_t.member_id");
//echo mysql_num_rows($query_member_t);


$c=0;
if(mysql_num_rows($query_member_t)>0) {
	//echo "didi";
while($row_member=mysql_fetch_assoc($query_member_t)){
	$account_no=$row_member['account_no'];
	//echo $account_no;
	$account_nos[]=$account_no;

	
	
	} //while member_T
} //if 
else {
	$query_member_st=mysql_query("SELECT * FROM member_t, student_members_t WHERE member_t.unit_id='$unit_id' 
								AND member_t.member_id=student_members_t.member_id");

	while($row_member_st=mysql_fetch_assoc($query_member_st)){
		$account_no=$row_member_st['account_no'];
		$account_nos[]=$account_no;

		//$query_posts_t=mysql_query("SELECT * FROM posts_t WHERE account_no='$account_no'");
	
	} //while member_T
}
	
	if(isset($account_nos)==NULL){

		echo "<h1><center>No Post Found</center></h1>";
	} else {
 ?>


        
      
   <div class="tab-pane active" id="Event">
           <div class="panel-body" style="height: 100%;">
				
               <div class="js-masonry" id="event" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php 
               	foreach($account_nos as $value){
               		$query_posts_t=mysql_query("SELECT * FROM posts_t WHERE account_no='$value' AND identity='unit'");
               		while($row_posts=mysql_fetch_assoc($query_posts_t)){
						$account_no=$row_posts['account_no'];
					   	$post_id=$row_posts['post_id'];
					   	$post_title=$row_posts['post_title'];
					   	$time_of_post=$row_posts['time_of_post'];
					   	$date_of_post=$row_posts['date_of_post'];
					   	$identity=$row_posts['identity'];
					   	$type_of_post=$row_posts['type_of_post'];
					   	$status=$row_posts['status'];
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

					} //while posts
				}

				?>

          		</div>  <!-- masonry -->
          </div><!--panel body -->
      
  </div> <!-- //tabpane -->


   <div class="tab-pane" id="Message">

              <div class="panel-body" style="max-height: 570px;">
				
               <div class="js-masonry" id="message" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php 
               		while($row_posts=mysql_fetch_assoc($query_posts_t)){
						$account_no=$row_posts['account_no'];
					   	$post_id=$row_posts['post_id'];
					   	$post_title=$row_posts['post_title'];
					   	$time_of_post=$row_posts['time_of_post'];
					   	$date_of_post=$row_posts['date_of_post'];
					   	$identity=$row_posts['identity'];
					   	$type_of_post=$row_posts['type_of_post'];
					   	$status=$row_posts['status'];
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

					} //while posts

				?>


          		</div>  <!-- masonry -->
          </div><!--panel body -->
       
   
 </div> <!-- //tabpane -->


   <div class="tab-pane" id="Announcement">

              <div class="panel-body" style="max-height: 570px;">
				
               <div class="js-masonry" id="ann" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php 
               		while($row_posts=mysql_fetch_assoc($query_posts_t)){
						$account_no=$row_posts['account_no'];
					   	$post_id=$row_posts['post_id'];
					   	$post_title=$row_posts['post_title'];
					   	$time_of_post=$row_posts['time_of_post'];
					   	$date_of_post=$row_posts['date_of_post'];
					   	$identity=$row_posts['identity'];
					   	$type_of_post=$row_posts['type_of_post'];
					   	$status=$row_posts['status'];
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

					} //while posts

				?>

          		</div>  <!-- masonry -->
          </div><!--panel body -->
   
 </div> <!-- //tabpane -->

   <div class="tab-pane" id="Holiday">

              <div class="panel-body" style="max-height: 570px;">
				
               <div class="js-masonry" id="holidays" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 50 }'>
               		<?php 
               		while($row_posts=mysql_fetch_assoc($query_posts_t)){
						$account_no=$row_posts['account_no'];
					   	$post_id=$row_posts['post_id'];
					   	$post_title=$row_posts['post_title'];
					   	$time_of_post=$row_posts['time_of_post'];
					   	$date_of_post=$row_posts['date_of_post'];
					   	$identity=$row_posts['identity'];
					   	$type_of_post=$row_posts['type_of_post'];
					   	$status=$row_posts['status'];
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

					} //while posts

				?>

          		</div>  <!-- masonry -->
          	</div><!--panel body -->
         </div><!-- tab pane -->
   <?php } ?>

   
	 
<script>
 
<?php if(isset($posts)) {?>
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
					//$("#event").masonry();


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

	<?php } ?>
</script>
