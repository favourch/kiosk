<!DOCTYPE html>



<?php
include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
//include "actions/sched_functions.php";
include "actions/subject_functions.php";
//include "actions/load_schedule.php"; //to pre-load schedule on the time table.
include "admin/actions/cms_functions.php";
include "db/db.php";

$block_id = 1;
$faculty_id="2009-43346";



if(isset($faculty_id)){
    $query_faculty = mysql_query(" SELECT * FROM personnel_t WHERE personnel_id='{$faculty_id}' ") or die(mysql_error());
    $row_faculty = mysql_fetch_assoc($query_faculty);

    $faculty_name       = $row_faculty['f_name']." ".$row_faculty['m_name']." ".$row_faculty['l_name'];
    $faculty_position   = "Professor II";
    $faculty_department = "CS/IT Department";

}


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
    <link href="css/schedules.css" rel="stylesheet">
    <link href="css/timetables.css" rel="stylesheet">


    <link href="css/keyboard/jsKeyboard.css" rel="stylesheet">
    <link href="css/keyboard/main.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
        #schedule_details th,
        #schedule_details>tr>th{
          line-height: 20px;
        }

        #mapContainer { 
            background: #f0000; 
            border: 1px solid #ccc; 
            height: 560px; 
            position: relative; 
            width: 960px; 
            overflow: hidden; 
            margin:auto;
        }
        #mapContainer #mapControls { 
            position: absolute; 
            left: 15px; 
            top: 15px; 
            width: 29px; 
        }
        #mapContainer #mapControls #up,
        #mapContainer #mapControls #down, 
        #mapContainer #mapControls #home,
        #mapContainer #mapControls a { 
            display: block; 
            height: 26px; 
            width: 29px;   
            font-size: 30px;
            margin: 20px 5px;
            width: 29px;
            
            color: #fff;
            text-shadow: -2px -0px 3px rgba(0, 0, 0, 0.25);
        }
        
        #map,
        #mapContainer{
            width:100%;
            height: 100%;
        }
        #search_results{
            height: 445px;
            overflow-y:auto;
        }
        #search_results > ul{
            list-style: none;
            margin: 0;
            padding: 0 0px;
        }
        #search_results ul li{
            padding: 15px 20px;
            margin: 5px;
            background-color: #ECECEC;

        }
        #search_results ul li:hover{
            background-color: #DCDCDC;

        }
    </style>

</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php";?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
            <?php
            $time = get_time_set("7:00-8:30");


            ?>
                <h3> <i class="icon-map-marker" ></i> I'm the MAP!!!<?php echo $time["time-start"]." - ".$time["time-end"];?></h3>
            </div>
        </div>
    </section><!--/#services-->

    <div id="viewport" class="hidden" style="margin:20px; background-color:#FFF; height:460px; border:1px solid #DADADA; padding: 10px;">
        <h1>This is it</h1>
        <i class="icon-linux "></i>
    </div><!--/#main-->

    <section class="" style="padding-bottom:0; padding-top:20px; height:90%">
      <div id="panel" class="panel ">
        <div id="virtualKeyboard"></div>
        <div id="test"></div>
      </div><!--/#panel-->
      
    </section>
    <?php 
    $a = "8:00";
    $b = "2:20";

    

    ?>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript" src="js/raphael-pan-zoom/vendor/raphael-min.js"></script>
    <script type="text/javascript" src="js/raphael-pan-zoom/src/raphael.pan-zoom.js"></script>
    <script type="text/javascript" src="js/svg-maps/map.paths.js"></script>
    <script type="text/javascript" src="js/svg-maps/maps.js"></script>
    <script type="text/javascript" src="js/svg-maps/map.init.js"></script>

    <script type="text/javascript" src="js/keyboard/jsKeyboard.js"></script>
    <script type="text/javascript" src="js/keyboard/main.js"></script>
    

    <script>
        var arr = [{'data': 0}, {'data':1}];
        testing();
        function testing(){
            $("#test").html(
                arr
            );
        }
        function highlight(location){
            alert(location);
        }


        function goBack(){
            window.history.go(-2);
        }
        
    </script>

</body>
</html>