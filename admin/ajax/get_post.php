<?php
include '../../db/db.php';
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
  $account_no=$_SESSION['kiosk']['user_id'];
  $query_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'") or die(mysql_error());
      $row_acc=mysql_fetch_assoc($query_acc);
      $type=$row_acc['type'];
      //$type="personnel";

}
$tab_active=$_GET['tag'];

?>
          	<div class="tab-pane active" id="Event">
                    <div class="container" id="container_event">
            <form method="POST" action="ajax/disable.php">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed; margin-top: 50px;">
                        <thead>
                            <tr>
                                <th style="width: 25px"></th>
                                <th>Event Title</th>
                                <th>Event Theme</th>
                                <th>Event Venue</th>
                                <th>Event Time</th>
                                <th>Date</th>
                                <th style="width: 88px;">Fee</th>
                                 <th>Action</th>
                               
                                
                            </tr>
                        </thead>
              
      <?php
      if(($type=='personnel')||($type=='student')){
         $select_post_events=mysql_query("SELECT * FROM posts_t, post_events_t WHERE posts_t.post_id=post_events_t.event_id 
                                          AND posts_t.account_no='$account_no' AND posts_t.type_of_post='event' AND posts_t.status='disabled'") or die(mysql_error());
      } else if ($type=='admin'){
         $select_post_events=mysql_query("SELECT * FROM posts_t, post_events_t WHERE posts_t.post_id=post_events_t.event_id 
                                          AND posts_t.type_of_post='event' AND posts_t.status='disabled'") or die(mysql_error());
      } else {

      } 
 		$count_event=0;
      ?>
     
    <tbody>
  <?php  if(mysql_num_rows($select_post_events)>0){
         while ($row_post_events=mysql_fetch_assoc($select_post_events)){
                $post_id=$row_post_events['post_id'];
                $post_title=$row_post_events['post_title'];
                $event_venue=$row_post_events['venue'];
                $start_time=$row_post_events['start_time'];
                $end_time=$row_post_events['end_time'];
                $date_start=$row_post_events['date_start'];
                $date_end=$row_post_events['date_end'];
                $theme=$row_post_events['theme'];
                $reg_fee=$row_post_events['reg_fee'];
                $status=$row_post_events['status'];
                 if($date_end!=NULL){
                        $date_and_time= $date_end.' '.$start_time;
                       } else {
                        $date_and_time= $date_start.' '.$start_time;
                        }
      
         ?>
            <tr>
              <?php 
              $post_title=($post_title!="")? $post_title:"N/A";
              $theme=($theme!="")? $theme:"N/A";
              $event_venue=($event_venue!="")? $event_venue:"N/A";


              ?>
              <td><input type="checkbox" name="d_post[]" value="<?php echo $post_id ?>" /></td>
              <td><?php echo $post_title; ?></td>
              <td style="word-break: break-word;"><?php echo $theme; ?></td>
              <td><?php echo $event_venue; ?></td>
              <td><?php echo date("g:i A", strtotime($start_time)); ?>
              <?php
              if ($end_time!=NULL){
                 echo date(" <b>-</b> g:i A", strtotime($end_time)); 
              } else {


              }
              ?>
                            
              </td>
              <td><?php echo date("F j, Y", strtotime($date_start)); ?>
                <?php
                    if ($date_end!=NULL){
                 echo date(" <b>-</b> F j, Y", strtotime($date_end)); 
              } else {


              }
              ?>
                               
             </td>
              
               <?php 
                if($reg_fee!=0){
                  ?>
                    <td><?php printf('%.2f', $reg_fee); ?><br /><br /></td>
        
                <?php 
                } else { ?>
                   <td><?php echo 'FREE'; ?></td>
                <?php
                }
                  ?>
                <td>
                        <a class="btn btn-default btn-xs" onClick="show_post('<?php echo $post_id; ?>')"><i class="icon-eye-open"></i> </a>
                        <a class="btn btn-success btn-xs" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=enable" onClick="return confirm('Are you sure you want to enable this post?')"><i class="icon-check"></i></a>
                        <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=event','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i></a>
                        <a class="btn btn-danger btn-xs" href="actions/deletepost_action.php?post_id=<?php echo $post_id; ?>" onClick="return confirm('Are you sure you want to delete this post?')"><i class="icon-trash"></i></a>
                </td>
                </tr>
     <?php 	$count_event++;
 			}
 		
 } else if (mysql_num_rows($select_post_events)==0){ ?>
  
              <tr><td colspan="8" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
    <?php
          }  
          ?>
     </tbody>	
     
   </table> 
    <center><input type="submit" class="btn btn-danger" name="m_delete" onClick="return confirm('Are you sure you want to delete this?')" value="Multiple Delete"></center> 
  </form>
   		</div>		
   </div>    
				
		<?php $count_msg=0; ?>		
		<div class="tab-pane" id="Message">
                    <div class="container">
              <form method="POST" action="ajax/disable.php">          
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed; margin-top: 50px;">
                    <thead>
                        <tr>
                             <th style="width: 25px"></th>
                            <th>Message Title</th>
                            <th>Message Content</th>
                            <th>Action</th>
                          
                            
                        </tr>
                    </thead>
                    
        <tbody>
            <?php
             if(($type=='personnel')||($type=='student')){
                 $select_post_msgs=mysql_query("SELECT * FROM posts_t, post_messages_t WHERE posts_t.post_id=post_messages_t.message_id 
                                                AND posts_t.account_no='$account_no' AND posts_t.type_of_post='message' AND posts_t.status='disabled'");
            } else if($type=='admin'){
                 $select_post_msgs=mysql_query("SELECT * FROM posts_t, post_messages_t WHERE posts_t.post_id=post_messages_t.message_id 
                                                AND posts_t.type_of_post='message' AND posts_t.status='disabled'");
 
            } else {

            }
            if(mysql_num_rows($select_post_msgs)>0){
                 while ($row_post_msgs=mysql_fetch_assoc($select_post_msgs)){
                    $post_id=$row_post_msgs['post_id'];
                    $post_title=$row_post_msgs['post_title'];
                    $msg_content=$row_post_msgs['message_content']; 
                    $status=$row_post_msgs['status'];     
          
        ?>
       
            <tr>
			      <?php
                 $post_title=($post_title!="")? $post_title:"N/A";

                 ?>
                <td><input type="checkbox" name="d_post[]" value="<?php echo $post_id ?>" /></td>
                <td><?php echo $post_title; ?></td>
                <td style="word-break: break-word;"><?php echo $msg_content; ?></td>
         
           
                
       <td>
               <a class="btn btn-default btn-xs" onClick="show_post('<?php echo $post_id; ?>')"><i class="icon-eye-open"></i> View</a>
                <a class="btn btn-success btn-xs" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=enable" onClick="return confirm('Are you sure you want to enable this post?')"><i class="icon-check"></i> Enable</a>
                <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=message','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                 <a class="btn btn-danger btn-xs" href="actions/deletepost_action.php?post_id=<?php echo $post_id; ?>" onClick="return confirm('Are you sure you want to delete this post?')"><i class="icon-trash"></i> Delete</a>
      	</td>
      	
     	</tr>
        <?php 	$count_msg++;
    			} 
    		

         } else if (mysql_num_rows($select_post_msgs)==0){ ?>
              <tr><td colspan="4" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
    <?php
          }  
          ?>
     </tbody>
   </table>	
   <center><input type="submit" class="btn btn-danger" name="m_delete" onClick="return confirm('Are you sure you want to delete this?')" value="Multiple Delete"></center> 
  </form>
   		</div>		
  </div>           		
  <?php $count_ann=0; ?>
  	<div class="tab-pane" id="Announcement">
                    <div class="container">
          <form method="POST" action="ajax/disable.php">        
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed; margin-top: 50px;">
                    <thead>
                        <tr>
                             <th style="width: 25px"></th>
                            <th>Announcement Title</th>
                            <th>Announcement Description</th>
                            <th>Action</th>
                          
                            
                        </tr>
                    </thead>
                    
        <tbody>

          <?php
           if(($type=='personnel')||($type=='student')){
                $select_post_ann=mysql_query("SELECT * FROM posts_t, post_announcements_t, attachment_t 
                                        WHERE posts_t.post_id=post_announcements_t.announcement_id 
                                        AND posts_t.account_no='$account_no' AND posts_t.type_of_post='announcement'
                                        AND post_announcements_t.announcement_id=attachment_t.post_id AND posts_t.status='disabled'");
          }else if($type=='admin') {
               $select_post_ann=mysql_query("SELECT * FROM posts_t, post_announcements_t, attachment_t 
                                        WHERE posts_t.post_id=post_announcements_t.announcement_id 
                                        AND posts_t.type_of_post='announcement'
                                        AND post_announcements_t.announcement_id=attachment_t.post_id AND posts_t.status='disabled'");

          } else {

          }
           if(mysql_num_rows($select_post_ann)>0){
                 while ($row_post_ann=mysql_fetch_assoc($select_post_ann)){
                    $post_id=$row_post_ann['post_id'];
                    $post_title=$row_post_ann['post_title'];
                    $ann_desc=$row_post_ann['announcement_desc']; 
                    $attachment_name=$row_post_ann['attachment_name'];     
          			     $status=$row_post_ann['status'];

        ?>
            <tr>
			
                <td><input type="checkbox" name="d_post[]" value="<?php echo $post_id ?>" /></td>
                <td><?php echo $post_title; ?></td>
                <td style="word-break: break-word;"><?php echo $ann_desc; ?></td>
         
           
                
       <td>
                <a onclick="window.open('../e-bulletin/actions/view_pdf.php?filename=<?php echo $attachment_name ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=3000, height=3000,position=center')" class="btn btn-default btn-xs" style="width: 110px;"><i class="icon-eye-open"></i> View Post</a>
               <a class="btn btn-success btn-xs" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=enable" onClick="return confirm('Are you sure you want to enable this post?')"><i class="icon-check"></i> Enable</a>
                <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=announcement','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                 <a class="btn btn-danger btn-xs" href="actions/deletepost_action.php?post_id=<?php echo $post_id; ?>" onClick="return confirm('Are you sure you want to delete this post?')"><i class="icon-trash"></i> Delete</a>
      	</td>
      			
     	</tr>
      <?php 	$count_ann++;
  				}
  			
    } else if (mysql_num_rows($select_post_ann)==0){ ?>
              <tr><td colspan="4" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
    <?php
          }  
          ?>

     </tbody>
   </table>	
    <center><input type="submit" class="btn btn-danger" name="m_delete" onClick="return confirm('Are you sure you want to delete this?')" value="Multiple Delete"></center> 
  </form>
   		</div>		
  </div>           		
  
    <?php $count_hol=0; ?>
	<div class="tab-pane" id="Holiday">
      <div class="container">	
        <form method="POST" action="ajax/disable.php">     
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed; margin-top: 50px;">
          <thead>
            <tr>
                <th style="width: 25px"></th>
                <th>Holiday Event</th>
                <th>Date</th>
                <th>Action</th>
              
                
            </tr>
        </thead>
        
          <tbody>
           <?php
       if(($type=='personnel')||($type=='student')){
         $select_post_hol=mysql_query("SELECT * FROM posts_t, post_holidays_t WHERE posts_t.post_id=post_holidays_t.holiday_id 
                                      AND posts_t.account_no='$account_no' AND posts_t.type_of_post='holiday' AND posts_t.status='disabled'");
       } else if($type=='admin'){
          $select_post_hol=mysql_query("SELECT * FROM posts_t, post_holidays_t WHERE posts_t.post_id=post_holidays_t.holiday_id 
                                      AND posts_t.type_of_post='holiday' AND posts_t.status='disabled'");
       }
       if(mysql_num_rows($select_post_hol)>0){
         while ($row_post_hol=mysql_fetch_assoc($select_post_hol)){
             $post_id=$row_post_hol['post_id'];
             $occasion=$row_post_hol['post_title'];
             $date_of_hol=$row_post_hol['date_of_holiday'];
             $date_of_holiday= date("F j, Y", strtotime($date_of_hol));
             $status=$row_post_hol['status'];
        
        ?>
            <tr>
       
                  <td><input type="checkbox" name="d_post[]" value="<?php echo $post_id ?>" /></td>
                <td><?php echo $occasion; ?></td>
                <td><?php echo $date_of_holiday; ?></td>
         		<td>
                  <a class="btn btn-default btn-xs" onClick="show_post('<?php echo $post_id; ?>')"><i class="icon-eye-open"></i> View</a>
                 <a class="btn btn-success btn-xs" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=enable" onClick="return confirm('Are you sure you want to enable this post?')"><i class="icon-check"></i> Enable</a>
                  <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=holiday','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                  <a class="btn btn-danger btn-xs" href="actions/deletepost_action.php?post_id=<?php echo $post_id; ?>" onClick="return confirm('Are you sure you want to delete this post?')"><i class="icon-trash"></i> Delete</a>
      			</td>
              
      	 </tr>
   <?php 	$count_hol++;
			}
   		 //holiday query  

 } else if (mysql_num_rows($select_post_hol)==0){ ?>
              <tr><td colspan="4" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
    <?php
          }  
          ?>
 
         
     </tbody>
   </table>	
    <center><input type="submit" class="btn btn-danger" name="m_delete" onClick="return confirm('Are you sure you want to delete this?')" value="Multiple Delete"></center> 
  </form>
           </div>   
    </div> <!--tab-pane-->    
 <script>       	
 var tab_active="<?php echo $tab_active; ?>";
     if(tab_active=='event_tab'){
          $("#Event").removeClass("active");
          $("#Message").removeClass("active");
          $("#Announcement").removeClass("active");
          $("#Holiday").removeClass("active");

          $("#Event").addClass("active");

    }
     if(tab_active=='msg_tab'){
          $("#Event").removeClass("active");
          $("#Message").removeClass("active");
          $("#Announcement").removeClass("active");
          $("#Holiday").removeClass("active");

          $("#Message").addClass("active");

    }

  if(tab_active=='ann_tab'){
          $("#Event").removeClass("active");
          $("#Message").removeClass("active");
          $("#Announcement").removeClass("active");
          $("#Holiday").removeClass("active");

          $("#Announcement").addClass("active");

    }

   if(tab_active=='hol_tab'){
          $("#Event").removeClass("active");
          $("#Message").removeClass("active");
          $("#Announcement").removeClass("active");
          $("#Holiday").removeClass("active");

          $("#Holiday").addClass("active");

    }


   </script>