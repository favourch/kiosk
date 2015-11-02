<!DOCTYPE html>



<?php
session_start();
if(!isset($_SESSION['kiosk']['student_id'])){
    header("location: student-verification.php");
}
include "db/db.php";

include "actions/misc_functions.php";
$sem = semester();
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
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
            /*width: 150px;*/
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
        .box-panel{
            width:100%;
            height:200px; 
            background-color:#ddd;

        }
        .box-panel> div{
            width:100%;
            height:100%; 
            background-color:#FFF; 
            transition:width 1s ease;
            float:left;
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
        #bulletin_box_cover{
            width:100%;
            height:100%;
            background-color:#FFD364;
            position:absolute;
            z-index:30;
            top:0;
            transition:top 1s ease;
        }
        #bulletin_box_cover.open_cover{
            top:-90%;
        }
    </style>

</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-user" ></i> Student | HOME</h3>
                <h5>Semester : <?php echo sem_name(semester());?></h5>

            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:20px; height:85%;margin:0 auto;">
        <div id="panel" class="" style="width: 90%; margin: 0 auto; border: 1px solid #dadada; border-radius: 4px; height:100%; background-color:#fafafa;padding:60px;">
            <div id="sis_menu" class="container" style="width: 60%; margin: 0;display:inline-block">
            <div class="row">
                <div class="col-md-6">
                    <div class="box-option">
                        <div style="background-color:#6ECDEB"></div>
                        <a href="student-grades.php#profile" style="">
                                <span class="glyphicon glyphicon-user"></span>
                                <h1>PROFILE</h1>
                                <p>View your Certificate of Registration.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-option">
                        <div style="background-color:#FFAB6A"></div>
                        <a href="student-grades.php#schedule" style="">
                                <span class="glyphicon icon icon-time"></span>
                                <h1>SCHEDULE</h1>
                                <p>View your grades last sem.</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box-option">
                        <div style="background-color:#7AC363"></div>
                        <a href="student-grades.php#payments" style="">
                                <span class="glyphicon icon-money"></span>
                                <h1>PAYMENTS</h1>
                                <p>View your grades last sem.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-option">
                        <div style="background-color:#daaaff"></div>
                        <a href="student-grades.php#grades" style="">
                                <span class="glyphicon icon icon-pencil"></span>
                                <h1>GRADES</h1>
                                <p>View your grades last sem.</p>
                        </a>
                    </div>
                </div>
            </div>
            </div>
            

            <div id="" class="container" style="width:100%%; margin: 0;display:inline-block;width: 39%;margin: 0;display: inline-block;vertical-align: top;height: 430px;">
            <div class="" style="height: 100%;">
                <div class="col-md-12" style="height: 100%;padding:0;margin:15px;overflow:hidden;">
                    <div class="box-panel" style="height: 100%; ">
                        <div id="bulletin_box_cover" class="open_cover" style="">
                            <p style="height:100%;"></p>
                        </div>
                        <div style="text-align:left;">
                            <span class="glyphicon glyphicon-user"></span>
                            <h1>Faculty Bulletin</h1>
                            <ul class="list_group">
                            <?php       
                            $query_class = mysqli_query ($db_con, "SELECT class_t.faculty_id FROM class_t, student_load_t, student_registration_t
                                                                          WHERE class_t.class_id = student_load_t.class_id
                                                                            AND student_load_t.reg_no = student_registration_t.reg_no
                                                                            AND student_registration_t.student_id='{$student_id}'
                                                                            AND student_registration_t.sem_id = '{$sem_id}'
                                                                            GROUP BY class_t.faculty_id
                                                                    ") or die(trigger_error(mysqli_error($db_con)));
                            while($row_class = mysqli_fetch_array($query_class)){
                                $faculty_id = $row_class['faculty_id'];
                                $query_faculty = mysqli_query($db_con, "SELECT * FROM personnel_t WHERE personnel_id = '$faculty_id'") or die(trigger_error(mysqli_error($db_con)));
                                $row_faculty = mysqli_fetch_array($query_faculty);
                                $f_name = $row_faculty['f_name'];
                                $m_name = $row_faculty['m_name'];
                                $l_name = $row_faculty['l_name'];
                            ?>
                                <li class="list-group-item"><a href="e-bulletin/bulletin.php?personnel_id=<?php echo $faculty_id;?>#Event"><?php echo $f_name." ".$l_name;?></a></li>
                               
                                
                            <?php
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            </div><!-- /bulletin -->
            
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
        $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        });
        $('#sis_menu a').click(function() {
            return true;
        });
        $("#bulletin_box_cover").click(function(){
            $(this).toggleClass("open_cover");
        });
       
    </script>

</body>
</html>