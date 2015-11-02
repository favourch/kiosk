<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['kiosk']['user_id'])){


}
else{
    header("location: login.php");
}

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
     
        <style type="text/css">
        .box-option{
            width:100%;
            height:200px; 
            background-color:#ddd;

        }
        .box-option > div{
            width:5px;
            height:100%; 
            background-color:#F00; 
            transition:width 1s ease;
            float:left;
        }
        .box-option:hover > div{
            width:30px;
        }
        .box-option > a {
            text-align:right;
            padding:20px;
            width:100%;
            height: 100%;
            display:block;
            background-color:#fff;
            transition:background-color 1s ease;

            border: 1px solid #ddd;
            box-shadow: -1px 5px 10px #ddd;
        }
        .box-option > a:hover, .box-option > a:active {
            /*
            color:white;
            background-color:#333;
            */
        }
        .box-option .glyphicon{
            font-size: 36px;
        }
    </style>
      
</head><!--/head-->
<body>


    <?php include "../db/db.php"; ?>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="service_guide" ?>
    <?php include "admin_left_pane.php";?>

    <section id="banner" class="" style="padding:0;">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->
   

   <section style="padding-bottom:0; padding-top:20px; height:85%">
        <div id="panel" style="width: 79%; border: 0px;">
            
               
                <div id="">
                    <?php
                    $query_select_cunit=mysql_query("SELECT * FROM unit_t ORDER BY type");
                    while($row_select_cunit=mysql_fetch_assoc($query_select_cunit)){
                        $unit_name=$row_select_cunit['unit_name'];
                        $unit_id=$row_select_cunit['unit_id'];
                        
                      ?>
                    <div class="search-item-box" style="">
                    <div style="float:left;width:5px;height:100%;background-color:#EDB82A"></div>
                       
                        <a href="manage_transaction.php?unit_id=<?php echo $unit_id; ?>" style="vertical-align: middle;
                                                              display: block;
                                                              margin-top: 30px;">
                            <section ><?php echo $unit_name; ?></section>
                            <p>
                               **description here
                            </p>
                        </a>
                        
                    </div><!-- /#search-item -->
                    <?php } ?>
                   
                </div><!-- /#search-results -->
           
            
        </div><!-- /#panel -->
    </section>
    
      <!-- modal add trans -->
        <div id="add_trans" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
                            <div class="modal-dialog" style="width: 533px; height: 640px; margin-top: 32px;"> <!--modified-->
                                
                                <div class="modal-content " style="height: 51%; width: 92%;">  <!--modified-->
                                    <div style="width:2%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
                                    </div>
                                    <div class="modal-" style="height: 100%; display: inline-block; padding: 20px;" > <!--modified-->
                                       <div class="modal-body" style="width: 420px;">
                                        
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 id="post_title">Add Service</h4>
                                                <hr>
                                               <form action="actions/addEdit_trans_action.php" method="post">
                                                    <?php 
                                                    if (isset($cunit_id)) {
                                                        echo '<input type="hidden" value="'.$cunit_id.'" name="cunit_id">'; 
                                                    } else if (isset($dept_id)){
                                                        echo '<input type="hidden" value="'.$dept_id.'" name="dept_id">';
                                                        }
                                                        ?>
                                                    <div class="form-group">
                                                       <textarea style="width: 100%; height: 100%;" name="trans_name" placeholder="Service Title"></textarea>
                                                    </div>
                                              
                                          
                                        </div>
                                        <div class="modal-footer">
                                          <input type="submit" class="btn btn-info" value="ADD" name="add" />
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                                        </div>
                                         </form>
                                    </div>
                                        
                        
                                </div>
                            </div>
                            </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
   <script>

   
        function goBack(){
            window.history.go(-2);
        }
       
   
   </script>
  
</body>
</html>