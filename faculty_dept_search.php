<!DOCTYPE html>



<?php

include "db/db.php";


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-coffee" ></i> Office Information System</h3>
            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:20px; height:85%">
        <div id="panel" >
            <div class="container">
                <div id="search-pane" class="col-sm-7not " style="padding:20px 0; border:0;">
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Search" style="border-radius:0; height:56px; font-size:18px;">
                            <span class="input-group-btn" >
                                <button class="btn btn-danger" type="button" style="border-radius:0; font-size:30px;"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </form>
                    
                </div><!--/#search_pane-->
                <div id="search-results">
              
                    <?php
					$query_select_dept=mysql_query("SELECT * FROM department_t");
					while($row_select_dept=mysql_fetch_assoc($query_select_dept)){
						$dept_name=$row_select_dept['department_name'];
						$dept_id=$row_select_dept['department_id'];
						
					  ?>
                    
                     <div class="search-item" style="overflow:hidden;
                                                    width: 33%;
                                                    display: inline-block;
                                                    min-height: 150px;
                                                    border: 1px solid #dadada;
                                                    text-align:center;">
                     <a href="faculty-search.php?dept_id=<?php echo $dept_id; ?>" style="vertical-align: middle;
                                                              display: block;
                                                              margin-top: 30px;">
                            <section ><?php echo $dept_name; ?></section>
                            <p>
                               **description here
                            </p>
                        </a>
                   </div>
                   <?php } ?>
                </div><!-- /#search-results -->
            </div><!-- /#conatiner -->
            
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
       
    </script>

</body>
</html>