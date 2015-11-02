<!DOCTYPE html>



<?php

include "../db/db.php";


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/ours.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
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
            width: 150px;
            box-shadow: inset -100px 0 100px -100px rgba(0, 0, 0, 0.31);
            border-right: 5px solid transparent;
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
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-user" ></i> E-Bulletin Board</h3>
            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:18px; height:85%">
        <div id="panel" class="hidden" style="width: 90%; margin: 0 auto; border: 1px solid #dadada; border-radius: 4px; height:100%; background-color:#fafafa">
            
                <!-- Nav tabs -->
            <div class="col-sm-2" style="height:100%; padding:0; background-color:#3498db;">
                <ul class="nav nav-tabs nav-stacked" role="tablist" style="border-bottom:0;">
                  <li class="active"><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
                  <li><a href="#registration" role="tab" data-toggle="tab">Registration</a></li>
                  <li><a href="#schedule" role="tab" data-toggle="tab">Schedule</a></li>
                  <li><a href="#grades" role="tab" data-toggle="tab">Grades</a></li>
                </ul>
            </div><!--.col-sm-2-->
                <!-- Tab panes -->
            <div class="col-sm-10" style="height:100%; padding:0" >
                <div class="tab-content">
                  <div class="tab-pane active" id="profile">

                  </div> <!-- /#home-->
                  <div class="tab-pane" id="registration">

                      ds
                  </div> <!-- /#profile-->
                  <div class="tab-pane" id="schedule">

                      ss
                  </div> <!-- /#home-->
                  <div class="tab-pane" id="grades">
                  
                      12
                  </div> <!-- /#home-->
                </div>
            </div><!--.col-sm-8-->
            
        </div><!-- /#panel -->
        <div class="container" style="width: 60%; margin: 0 auto;">
            <div class="row">
        <?php
		$query_department=mysql_query("SELECT * FROM department_t, icons_t WHERE department_t.icon_id=icons_t.icon_id");
		$count=0;
		while($row_department=mysql_fetch_assoc($query_department)){
			$department_name=$row_department['department_name'];
			$department_id=$row_department['department_id'];
			$icon_class=$row_department['icon_name'];
		
		  ?>
            
                
                <div class="col-md-6">
                    <div class="box-option">
                        <div style="background-color:#6ECDEB"></div>
                        <a href="faculty_list.php?type_id=<?php echo $type_id; ?>" style="">
                                <span class="icon <?php echo $icon_class ?>"></span>
                                <h1 style="font-size:20px;"><?php echo $department_name; ?></h1>
                                <p>View post of a faculty</p>
                        </a>
                    </div>
                </div>
            <?php
			$count++;
			if ($count==2){
				echo "</div><div class='row'>";
				}
			}
			 ?>
             
         <center><button type="button" name="faculty_button" class="btn btn-info btn-lg">View Posts of a Faculty</button></center>
           </div>
            
        </div>
    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script>
        function goBack(){
            window.history.go(-2);
        }
        $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
       
    </script>

</body>
</html>