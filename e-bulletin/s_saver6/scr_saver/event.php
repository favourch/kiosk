<?php
include "../../../db/db.php";
include "../../actions/misc_functions.php";

$posts=$_POST['posts'];
//$account_no=$_POST['account_no'];
//print_r($posts);

//print_r($posts);

//echo $no_of_events;
$count = 0;
$total_count=count($posts);
$i=1; ?>
 <li class="anim-slide">
<?php
foreach ($posts as $key=>$value) {
     $count++;


    $post_id=$value["post_id"];
    $type_of_post=$value["types"];
    $post_title=$value["post_title"];
    $time_of_post=$value["time_of_post"];
    $date_of_post=$value["date_of_post"];
    $identity=$value["identity"];
    $account_no=$value["account_no"];
    $status=$value['status'];
                   
    //echo $post_id."<br />"; 
    $post_title=($post_title!="")? $post_title:"N/A";

    if ($value ["types"] == 'event') {
       
        //echo $key;
   
//echo $count;
//echo $count;

      
        $select_post_events=mysql_query("SELECT * FROM post_events_t WHERE event_id='$post_id'");
        
              while($row_post_events=mysql_fetch_assoc($select_post_events)) {
                        //echo "dito";
                        $event_venue=$row_post_events['venue'];
                        $start_time=$row_post_events['start_time'];
                        $end_time=$row_post_events['end_time'];
                        $date_start=$row_post_events['date_start'];
                        $date_end=$row_post_events['date_end'];
                        $theme=$row_post_events['theme'];
                        $fee=$row_post_events['reg_fee'];
                       
                        $theme=($theme!="")? $theme:"N/A";
                        $event_venue=($event_venue!="")? $event_venue:"N/A";
                        
                       if($date_end!=NULL){
                        $date_and_time= $date_end.' '.$start_time;
                       } else {
                        $date_and_time= $date_start.' '.$start_time;
                           }
                    //echo $date_and_time;
           if($status!='disabled') {   
                $query_select_image=mysql_query("SELECT attachment_name FROM attachment_t WHERE post_id='$post_id'") or die(mysql_error());
                    
                 $DandT = strtotime($date_and_time);
                 $time = time() - $DandT;

              
                ?>
       
         <div class="post<?php echo $i ?>">
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
                            <img class="size" src="e-bulletin/images/imgs_post/<?php echo $image; ?>" alt="">
                        </div>
                            </td></tr>
                        </table>
                 
                        <table border="0" width="100%">
                            <tr>
                <?php 
                } else if ($num == 2) { 
                ?> 
                <td>          
                    <div class="sample"><img class="sizeof2" src="e-bulletin/images/imgs_post/<?php echo $image; ?>"></div>
                </td>
                <?php  }  ?>
                </tr>
                </table>
                
                 <?php if ($num==3){
                
                 $get_image[]=$image; ?>
                 <div class="" style="display:inline-flex">
                            <table border="0" width="100%" style="max-width: 100px;">
                                <tr><td>
                                         
                                <div class="sample"><img class="sizeof2" src="e-bulletin/images/imgs_post/<?php echo $get_image[0]; ?>"></div>
                                </td></tr>
                            </table>
                           
                            <table border="0">
                            <?php 
                            while($row_select_image=mysql_fetch_assoc($query_select_image)) {
                                $image = $row_select_image['attachment_name'];
                                 ?>
                            <tr>
                            
                            <td>
                                <div class="sample"><img class="sizeof3" src="e-bulletin/images/imgs_post/<?php echo $image; ?>"></div>
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
                    <hr style="margin: 0px 0px 10px;" /> 
                    <b>Venue: </b><?php echo $event_venue; ?><br />
                    <?php 
                          $start_date = strtotime("$date_start");
                    if ($date_end!=NULL){
                          $end_date = strtotime("$date_end");
                        } else {
                            $end_date="";
                        }
                         
                        
                    ?>
                    <b>Date: </b><?php echo date("F j, Y", $start_date); ?>
                    
                    <?php
                    if($end_date!=""){
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
                        echo date(" <b>-</b> F j, Y", $end_date); 
                        echo '<br />';
                    } else {


                    }

                         $time_s = date("g:i A", strtotime("$start_time"));
                    if ($end_time!=NULL){
                        $time_e=date("g:i A", strtotime("$end_time"));
                          $time = $time_s.' - '.$time_e;
                        } else {
                          $time=$time_s;
                        }
                         
                        

                    
                    ?>
                    <br>
                    <b>Time: </b><?php echo $time; ?><br />
                    <b>Theme: </b><?php echo $theme; ?><br />
                    <?php 
                        if($fee!=0){
                    ?>
                        <b>Fee: </b>P<?php printf('%.2f', $fee); ?><br /><br />

                    <?php 
                    } else { ?>
                        <b>Fee: </b>FREE<br /><br />
                    <?php
                    }

                   
                ?>


                    <span class="footer">Posted by: 
                
                     <?php 
                          echo footer($account_no, $identity, $date_of_post, $time_of_post);
                       
                    ?>
                    
                     <br />
                 

         </div>  <!-- content  -->
   </div>

    <?php  

            }// while
              $i++;

               if($i>4){
                    echo "</li>";
                if($count<$total_count){
                    echo "<li class='anim-slide'>";
                    $i=1;
                    }
                }

        } //if time()


     } else if($value['types']=='message'){
                   
                    $select_post_msg=mysql_query("SELECT * FROM post_messages_t WHERE message_id='$post_id'");
              while($row_post_msg=mysql_fetch_assoc($select_post_msg)) {
                        //echo "dito";
                        $message_content=$row_post_msg['message_content'];
                        
                    
          if($status!='disabled') { 
                $query_select_image=mysql_query("SELECT attachment_name FROM attachment_t WHERE post_id='$post_id'");
                    
                
                //echo time();
                
                ?>
         <div class="post<?php echo $i ?>">
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
                            <img class="size" src="e-bulletin/images/imgs_post/<?php echo $image; ?>" alt="">
                        </div>
                            </td></tr>
                        </table>
                 
                        <table border="0" width="100%">
                            <tr>
                <?php 
                } else if ($num == 2) { 
                ?> 
                <td>          
                    <div class="sample"><img class="sizeof2" src="e-bulletin/images/imgs_post/<?php echo $image; ?>"></div>
                </td>
                <?php  }  ?>
                </tr>
                </table>
                
                 <?php if ($num==3){
                
                 $get_image[]=$image; ?>
                 <div class="" style="display:inline-flex">
                            <table border="0" width="100%" style="max-width: 100px;">
                                <tr><td>
                                         
                                <div class="sample"><img class="sizeof2" src="e-bulletin/images/imgs_post/<?php echo $get_image[0]; ?>"></div>
                                </td></tr>
                            </table>
                           
                            <table border="0">
                            <?php 
                            while($row_select_image=mysql_fetch_assoc($query_select_image)) {
                                $image = $row_select_image['img_name'];
                                 ?>
                            <tr>
                            
                            <td>
                                <div class="sample"><img class="sizeof3" src="e-bulletin/images/imgs_post/<?php echo $image; ?>"></div>
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

   
    <?php  
            $i++;
    //echo $count;
             if($i>4){
                    echo "</li>";
                if($count<$total_count){
                    echo "<li class='anim-slide'>";
                    $i=1;
                    }
                }
            }
    
        } // while


     } else if($value['types']=='announcement') {


     }

} ?>

<?php
if($count==0){
    echo "<center><p style='font-size: 30px;'>No Post Found</p></center>";
}
?>

       