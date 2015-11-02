<?php
include "../db/db.php";
include "actions/misc_functions.php";

$posts=$_POST['posts'];
//print_r($posts);

//print_r($posts);
//echo json_encode($post_ids);

//echo $no_of_events;
$count = 0;
foreach ($posts as $key=>$value) {
    if ($value ["types"] == 'message') {
        $count++;
    


 
    $post_id=$value["post_id"];
    $type_of_post=$value["types"];
    $post_title=$value["post_title"];
    $time_of_post=$value["time_of_post"];
    $date_of_post=$value["date_of_post"];
    $identity=$value["identity"];
    $account_no=$value["account_no"];
    $status=$value['status'];
                   
    //echo $post_id;
    $post_title=($post_title!="")? $post_title:"N/A";

		$select_post_msg=mysql_query("SELECT * FROM post_messages_t WHERE message_id='$post_id'");
			  while($row_post_msg=mysql_fetch_assoc($select_post_msg)) {
			  			//echo "dito";
						$message_content=$row_post_msg['message_content'];
						
					
		  if($status!='disabled') {	
				$query_select_image=mysql_query("SELECT attachment_name FROM attachment_t WHERE post_id='$post_id'");
					
				
				//echo time();
				
			    ?>
<a onclick="item_click(<?php echo $post_id ?>)">
    <div class="item">
         <div class="post_m">
				   <?php
                   	$num=mysql_num_rows($query_select_image);
            		$n=0;
					
					
                    while($row_select_image=mysql_fetch_assoc($query_select_image)) {
                    		$image = $row_select_image['attachment_name'];
                             ?>
           		<?php 
				if ($num==1) { 
				?>
                        <table border="0" width="100%">
                        	<tr><td>
                        <div class="sample">
                            <img class="size" src="images/imgs_post/<?php echo $image; ?>" alt="">
                        </div>
                        	</td></tr>
                        </table>
				 
                		<table border="0" width="100%">
                			<tr>
				<?php 
				} else if ($num == 2) { 
				?> 
                <td>          
					<div class="sample"><img class="sizeof2" src="images/imgs_post/<?php echo $image; ?>"></div>
                </td>
				<?php  }  ?>
                </tr>
                </table>
				
                 <?php if ($num==3){
				
				 $get_image[]=$image; ?>
                 <div class="" style="display:inline-flex">
                            <table border="0" width="100%" style="max-width: 100px;">
                                <tr><td>
                                         
                            	<div class="sample"><img class="sizeof2" src="images/imgs_post/<?php echo $get_image[0]; ?>"></div>
                            	</td></tr>
                            </table>
                           
                            <table border="0">
                            <?php 
                            while($row_select_image=mysql_fetch_assoc($query_select_image)) {
                                $image = $row_select_image['img_name'];
                                 ?>
                            <tr>
                            
                            <td>
                            	<div class="sample"><img class="sizeof3" src="images/imgs_post/<?php echo $image; ?>"></div>
                            </td>
                          
                            </tr>
                              <?php 
                            }   // while row select img
                        ?>
                            </table>
                </div> <!-- inline flex -->
                
                
                
                
				<?php break; 
				 	}  // 3
	
		  		 } //select image top
		  
		    ?>
          
                <div class="content">

                	<div id="title"><?php echo strtoupper($post_title); ?></div>
                    <hr style="" /> 
                   
                    <?php echo $message_content; ?>

                    <br />
                    <br />
                    <span class="footer">Posted by: 
                
                     <?php 
                          echo footer($account_no, $identity, $date_of_post, $time_of_post);
                         
                    ?>
                    </span>
                   
                 
         </div>  <!-- content  -->
    </div> <!-- post  -->
</div> <!-- item  -->
</a>
	<?php  }
    	} // while

    }
}

if($count==0){
    echo "<center><p style='font-size: 30px;'>No Post Found</p></center>";
}
?>  
  