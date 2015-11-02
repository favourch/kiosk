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
    <?php $active_page="screensaver" ?>
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
                                                        
                      <div class="panel-heading" style="line-height: 33px;">Images
                      
                     
                      </div>
                      
                      <div class="panel-body" style="max-height: 100%;">
         <form method="post" action="actions/a_img_action.php">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                      <colgroup>
                            <col width="8">
                            <col width="100">
                            <col width="25">
                            

                      </colgroup>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Post Title</th>
                                <th>Post Image</th>
                                
                               
                                
                            </tr>
                        </thead>
                          <tbody>
                      
           <?php
        $select_img=mysql_query("SELECT * FROM attachment_t, posts_t WHERE posts_t.post_id=attachment_t.post_id AND posts_t.type_of_post<>'announcement'
                                AND posts_t.post_id NOT IN(SELECT post_id FROM image_slide_t)") or die(mysql_error());
        if(mysql_num_rows($select_img)>0){
        while ($row_img=mysql_fetch_assoc($select_img)){
          $post_title=$row_img['post_title'];
          $post_id=$row_img['post_id'];
          $img_id=$row_img['attachment_id'];
          $img_name=$row_img['attachment_name'];
          //$img_abbrev=$row_img['unit_abbrev'];
        
          ?>
        
            <tr>
                            <td><input type="checkbox" name="img[]" value="<?php echo $post_id ?>"></td>
                            <td><?php echo $post_title; ?></td>
                            <td><img src="../e-bulletin/images/imgs_post/<?php echo $img_name ?>" width="70" height="70"></td>
              
                   
               
           </tr>
         <?php }  //post_events_query  ?>
             
           
     </tbody>
<?php   } else { ?>
      <tbody>
            <tr>
                        
                            <td colspan="3">No Image Found</td>
                        
             
            </tr>
     </tbody>

     <center></center>

<?php } ?>
   </table>   
    <center><input type="submit" class="btn btn-success" name="submit" value="Add" style="width: 50%"></center>
  </form>    
        </div>    
        </div><!-- /#panel -->
    </section>

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
   <script>
   

  
   
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