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
    if ($value ["types"] == 'announcement') {
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
     
        $select_post_ann=mysql_query("SELECT * FROM post_announcements_t WHERE announcement_id='$post_id'");
              while($row_post_ann=mysql_fetch_assoc($select_post_ann)) {
                        //echo "dito";
                        $announcement_desc=$row_post_ann['announcement_desc'];
                        
         if($status!='disabled') {            
            
                $query_select_image=mysql_query("SELECT attachment_name FROM attachment_t WHERE post_id='$post_id'");
                    
                
                //echo time();
                
                ?>
    <div class="item">
         <div class="post_a">
                   <?php
                    
                    
                    
                   $row_select_image=mysql_fetch_assoc($query_select_image);
                            $att_name = $row_select_image['attachment_name'];
                             ?>
               
                        <table border="0" width="100%">
                            <tr><td>
                        <div class="">
                            <a onclick="window.open('actions/view_pdf.php?filename=<?php echo $att_name ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=3000, height=3000,position=center')" alt="">
                                <img src="images/pdfimage.png" style="width: 240px; height: 135px;">
                            </a>
                       
                        </div>
                            </td></tr>
                        </table>
                 
          
                <div class="content">

                    <div id="title"><?php echo strtoupper($post_title); ?></div>
                    <hr style="" /> 
                   
                    <?php echo $announcement_desc; ?>

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
    <?php   }
        } // while

    }
}
if($count==0){
    echo "<center><p style='font-size: 30px;'>No Post Found</p></center>";
}
?>  
  