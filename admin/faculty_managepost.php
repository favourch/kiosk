<!DOCTYPE html>
<?php
include "../db/db.php"; 
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
  $account_no=$_SESSION['kiosk']['user_id'];
   $query_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'");
      $row_acc=mysql_fetch_assoc($query_acc);
      $type=$row_acc['type'];

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
     <link href="js/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />  
    
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


	
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="e-bulletin" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="padding:0;">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section>

         <div id="panel" style="width: 79%;
								margin: 0 auto;
								margin-right: 20px;
								border: 1px solid #dadada;
								border-radius: 4px;
								height: 100%;">
    
                <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" style="border-bottom:1;">
             
					  <li class="active" id="event_tab">
                        	<a id="tabEvent" href="#Event" data-toggle="tab">Events</a>
            </li>
           	<li class="" id="msg_tab">
                        	<a id="tabMessage" href="#Message" data-toggle="tab">Messages</a>
            </li>
            <li class="" id="ann_tab">
                        	<a id="tabAnnouncement" href="#Announcement" data-toggle="tab">Announcements</a>
            </li>
            <li class="" id="hol_tab">
                        	<a id="tabHoliday" href="#Holiday" data-toggle="tab">Holidays</a>
            </li>
                  
           
         
             
         <div class="sample">
          
             
              <div class="s active" id="sEvent">  
                  
                    <a onclick="window.open('add_post.php?type=event','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info" style="float: right; margin-top: 10px; right: 10px; position: relative;"><i class="icon-plus"></i> Add Event </a>
    
                </div>
               <div class="s" id="sMessage">  
                  
                    <a onclick="window.open('add_post.php?type=message','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info" style="float: right; margin-top: 10px; right: 10px; position: relative;"><i class="icon-plus"></i> Add Message </a>
    
                </div>
                <div class="s" id="sAnnouncement">  
                  
                    <a onclick="window.open('add_post.php?type=announcement','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info" style="float: right; margin-top: 10px; right: 10px; position: relative;"><i class="icon-plus"></i> Add Announcement </a>
    
                </div>
                <div class="s" id="sHoliday">  
                  
                    <a onclick="window.open('add_post.php?type=holiday','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info" style="float: right; margin-top: 10px; right: 10px; position: relative;"><i class="icon-plus"></i> Add Holiday </a>
    
                </div>
        
         </div> <!--sample -->
                
                
			
                </ul>
          <div class="btn-group pull-right" id="" style="position: absolute; margin-top: 8px; right: 16px;">
              <a id="a_post" class="btn btn-default active">Active Posts</a>
              <a id="e_post" class="btn btn-default">Disabled Post</a>
          </div>
          
          
                <!-- Tab panes -->
          <div class="tab-content" id="t_content" style="height:90%;height: 86%;overflow-y: auto;">
        
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
                                          AND posts_t.account_no='$account_no' AND posts_t.type_of_post='event'") or die(mysql_error());
      } else if ($type=='admin'){
         $select_post_events=mysql_query("SELECT * FROM posts_t, post_events_t WHERE posts_t.post_id=post_events_t.event_id 
                                          AND posts_t.type_of_post='event'") or die(mysql_error());
      } else {

      }
       if(mysql_num_rows($select_post_events)>0){
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

          $DandT = strtotime($date_and_time);
                 $time = time() - $DandT;

                if(($time-(60*60*24)) > $date_and_time) {
                    $query_update_disable=mysql_query("UPDATE posts_t SET status='disabled' WHERE post_id='$post_id'");
                }

          if($status!='disabled'){
          ?>
          <tbody>
            <tr>
              <?php 
              $post_title=($post_title!="")? $post_title:"N/A";
              $theme=($theme!="")? $theme:"N/A";
              $event_venue=($event_venue!="")? $event_venue:"N/A";


              ?>
              <td><input type="checkbox" name="dis_post[]" value="<?php echo $post_id ?>" /></td>
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
                        <a class="btn btn-default btn-xs" style="width: 110px;" onClick="show_post('<?php echo $post_id; ?>')"><i class="icon-eye-open"></i> View Post</a>
                        <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=event','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                        <a class="btn btn-warning btn-xs" id="d_event" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=disable" onClick="return confirm('Are you sure you want to disable this post?')"><i class="icon-ban-circle"></i> Disable</a>
                </td>
                </tr>
   
     </tbody> 
     <?php 
        } 
      }
   }else { ?>
              <tr><td colspan="8" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
    <?php
          }  
          ?>
   </table> 
     <center><input type="submit" class="btn btn-warning" name="m_disable" value="Multiple Disable"></center> 
  </form>                   
					 
   		</div>		
   </div>    
				
				
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
                                                AND posts_t.account_no='$account_no' AND posts_t.type_of_post='message'");
            } else if($type=='admin'){
                 $select_post_msgs=mysql_query("SELECT * FROM posts_t, post_messages_t WHERE posts_t.post_id=post_messages_t.message_id 
                                                AND posts_t.type_of_post='message'");
 
            } else {

            }
            if(mysql_num_rows($select_post_msgs)>0){
                 while ($row_post_msgs=mysql_fetch_assoc($select_post_msgs)){
                   
                    $post_id=$row_post_msgs['post_id'];
                    $post_title=$row_post_msgs['post_title'];
                    $msg_content=$row_post_msgs['message_content'];      
                    $status=$row_post_msgs['status'];

                    if($status!='disabled'){
        ?>
       
            <tr>
			           <?php
                 $post_title=($post_title!="")? $post_title:"N/A";

                 ?>
                <td><input type="checkbox" name="dis_post[]" value="<?php echo $post_id ?>" /></td>
                <td><?php echo $post_title; ?></td>
                <td style="word-break: break-word;"><?php echo $msg_content; ?></td>
             
         
           
                
       <td>
                <a class="btn btn-default btn-xs" style="width: 110px;" onClick="show_post('<?php echo $post_id; ?>')"><i class="icon-eye-open"></i> View Post</a>
                <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=message','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                 <a class="btn btn-warning btn-xs" id="d_event" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=disable" onClick="return confirm('Are you sure you want to disable this post?')"><i class="icon-ban-circle"></i> Disable</a>
      	</td>
      	
     	</tr>
        <?php }
            }

         } else { ?>
               <tr><td colspan="4" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
        <?php } ?>
     </tbody>
   </table>
   <center><input type="submit" class="btn btn-warning" name="m_disable" value="Multiple Disable"></center> 
  </form>  
   		</div>		
  </div>           		
  
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
                                        AND post_announcements_t.announcement_id=attachment_t.post_id");
          }else if($type=='admin') {
               $select_post_ann=mysql_query("SELECT * FROM posts_t, post_announcements_t, attachment_t WHERE posts_t.post_id=post_announcements_t.announcement_id
                                             AND posts_t.type_of_post='announcement'
                                             AND post_announcements_t.announcement_id=attachment_t.post_id") or die(mysql_error());

          } else {

          }
           if(mysql_num_rows($select_post_ann)>0){
                 while ($row_post_ann=mysql_fetch_assoc($select_post_ann)){
                  
                    $post_id=$row_post_ann['post_id'];
                    $post_title=$row_post_ann['post_title'];
                    $ann_desc=$row_post_ann['announcement_desc']; 
                    $attachment_name=$row_post_ann['attachment_name'];     
                    $status=$row_post_ann['status'];

                     $post_title=($post_title!="")? $post_title:"N/A";
                    if($status!='disabled'){
        ?>
            <tr>
			
                 <td><input type="checkbox" name="dis_post[]" value="<?php echo $post_id ?>" /></td>
                <td><?php echo $post_title; ?></td>
                <td style="word-break: break-word;"><?php echo $ann_desc; ?></td>
               
           
                
       <td>
                <a onclick="window.open('../e-bulletin/actions/view_pdf.php?filename=<?php echo $attachment_name ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=3000, height=3000,position=center')" class="btn btn-default btn-xs" style="width: 110px;"><i class="icon-eye-open"></i> View Post</a>
                <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=announcement','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                <a class="btn btn-warning btn-xs" id="d_event" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=disable" onClick="return confirm('Are you sure you want to disable this post?')"><i class="icon-ban-circle"></i> Disable</a>
      	</td>
      			
     	</tr>
      <?php   }
        } 
    } else { ?>
         <tr><td colspan="4" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
  <?php
 } ?>
     </tbody>
   </table>	
   <center><input type="submit" class="btn btn-warning" name="m_disable" value="Multiple Disable"></center> 
  </form>  
   		</div>		
  </div>           		
  
      
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
                                      AND posts_t.account_no='$account_no' AND posts_t.type_of_post='holiday'");
       } else if($type=='admin'){
          $select_post_hol=mysql_query("SELECT * FROM posts_t, post_holidays_t WHERE posts_t.post_id=post_holidays_t.holiday_id 
                                        AND posts_t.type_of_post='holiday'");
       }
       if(mysql_num_rows($select_post_hol)>0){
         while ($row_post_hol=mysql_fetch_assoc($select_post_hol)){
         
             $post_id=$row_post_hol['post_id'];
             $occasion=$row_post_hol['post_title'];
             $date_of_hol=$row_post_hol['date_of_holiday'];
             $date_of_holiday= date("F j, Y", strtotime($date_of_hol));
             $status=$row_post_hol['status'];

             if($status!='disabled'){
        ?>
            <tr>
       
                 <td><input type="checkbox" name="dis_post[]" value="<?php echo $post_id ?>" /></td>
                <td><?php echo $occasion; ?></td>
                <td><?php echo $date_of_holiday; ?></td>
               
         		<td>
                    <a class="btn btn-default btn-xs" style="width: 110px;" onClick="show_post('<?php echo $post_id; ?>')"><i class="icon-eye-open"></i> View Post</a>
                    <a onclick="window.open('admin_editpost.php?post_id=<?php echo $post_id; ?>&&type=holiday','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=525, height=612,position=center')" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                     <a class="btn btn-warning btn-xs" id="d_event" href="ajax/disable.php?post_id=<?php echo $post_id ?>&&action=disable" onClick="return confirm('Are you sure you want to disable this post?')"><i class="icon-ban-circle"></i> Disable</a>

      			</td>
              
      	 </tr>
   <?php  }
    } //holiday query  

 } else { ?>
         <tr><td colspan="4" style="color: red; font-size: 20px;"><center> No Post Found </center></td></tr>
  <?php
 }?>
   
         
     </tbody>
   </table>	
   <center><input type="submit" class="btn btn-warning" name="m_disable" value="Multiple Disable"></center> 
  </form>  
           </div>   
    </div> <!--tab-pane-->           
</div>	<!--tab-contents-->			
                       
            
     		
        </div><!-- /#panel -->
    </section>
<!-- modal event -->
 <div id="ticket_modal_event" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width: 700px; height: 515px;; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="height: 550px;">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>

                <td>
                <div id="event_modal" style="">
                <img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" width="111px" height: "114px">

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
    <div class="modal-dialog" style="width: 700px; height: 640px; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="height:65%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>
                <td>
                <div id="msg_modal">
                  <img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" width="489px" height="227px"></td>
                </div>
                </tr>
                
                </table>
            
                
                <div class="modal-body">
                      <b><h4 id="msg_title" style="font-size: 28px">sample</h4></b>
                      <hr style="">
                      <table id="post_details">
                        <tr>
                          <th id="msg_content" style="font-size: 25px">BSIT 3c</th>
                        </tr>
                       
                      </table>
                    
                    
                </div>
                <div class="modal-footer" style="margin-top: 0px">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                </div>
            </div>
                

        </div>
    </div>
    </div>


 <!-- modal holidays -->
 <div id="ticket_modal_hol" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width: 700px; height: 640px; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="height:53%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table> 
                <tr>
                <td>
                <div id="holiday_modal">
                  <img src="../e-bulletin/images/imgs_post/24268_433288620098338_2085915303_n.jpg" width="489px" height="227px"></td>
                </div>
                </tr>
                
                </table>
            
                
                <div class="modal-body" style="height: 90px">
                 
                     
                      <table id="post_details">
                       <tr>
                          <th id="holidate" style="font-size: 30px">BSIT 3c</th>
                        </tr>
                       </table>
                 
                       <table>
                        <tr>
                          <th id="hol_occasion" style="font-size: 25px">BSIT 3c</th>
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



    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="js/Application.js"></script>
    <script src="js/lightbox/jquery.lightbox.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
   
    <script>
   

   	window.show_post = function show_post(post_id){
			//alert(post_id);
  
			$.ajax({
                url: "ajax/post_details.php",
                type: "GET",
                data: {post_id:post_id},
					  
                async : false,
                success: function(data){
                      //alert(data);
				              
                      var details = jQuery.parseJSON(data);
                      var type=details['type'];
                  if(type=="event"){
            					var event_title=details['event_title'];
            					var event_venue=details['event_venue'];
            					var event_time =details['event_time'];
                      var event_date = details['event_date'];
            					var event_theme=details['event_theme'];
                      if(details['fee']=="FREE") {
                        var fee=details['fee'];
                      } else {
                        var fee = "P"+details['fee'];
                      }
                      var imgs=details['img'];

                   
            				  $("#post_title").text(event_title);
            					$("#event_venue").text(event_venue);
                      $("#event_time").text(event_time);
                      $("#event_date").text(event_date);
                      $("#event_theme").text(event_theme);
                      $("#event_fee").text(fee);
                      $("#event_modal").html(imgs);
  				            
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

   
        function goBack(){
            window.history.go(-2);
        }
        function toggleSize(){
            var timetable = $("#timetable");
            timetable.toggleClass("compact-table");
		}
 
   
   </script>
   
   
   <script>
   			$("#tabEvent").click(function(){
				
				var post_type="Event";
				//alert (post_type);
				$("[id^=s]").removeClass("active");
				
				
				$("#sEvent").addClass("active");
				
				
			});
			
			$("#tabMessage").click(function(){
				
				var post_type="Message";
				//alert (post_type);
				$("[id^=s]").removeClass("active");
				
				
				$("#sMessage").addClass("active");
				
				
			});
			$("#tabAnnouncement").click(function(){
				
				var post_type="Announcement";
				//alert (post_type);
				$("[id^=s]").removeClass("active");
				
				
				$("#sAnnouncement").addClass("active");
				
				
			});
			$("#tabHoliday").click(function(){
				
				var post_type="Holiday";
				//alert (post_type);
				$("[id^=s]").removeClass("active");
				
				
				$("#sHoliday").addClass("active");
				
				
			});
    
		
	   $("#e_post").click(function(){
          $("#a_post").removeClass("active");
          $("#e_post").addClass("active");

         var active = $("ul.nav.nav-tabs li.active").attr("id");
          //alert(active);

          $.ajax({
            url: "ajax/get_post.php",
            method: "GET",
            data: {tag:active},
            async: false,
            success: function(data){
                $("#t_content").html(data);
            }
          })


     })

      $("#a_post").click(function(){
          $("#a_post").addClass("active");
          $("#e_post").removeClass("active");

          var active = $("ul.nav.nav-tabs li.active").attr("id");
          $.ajax({
            url: "ajax/get_post_active.php",
            method: "GET",
            data: {tag:active},
            async: false,
            success: function(data){
                $("#t_content").html(data);
            }
          })


     })

    
    </script>
   

</body>
</html>