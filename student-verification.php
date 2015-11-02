<!DOCTYPE html>

 

<?php
session_start();

if(isset($_SESSION['kiosk']['student_id'])){
    header("location: student-home.php");
}

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

    <!-- stylesheets for keyboard design -->
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
        #error_msg{
            position:relative;
            -webkit-animation:fadeIn 500ms;
            -moz-animation:fadeIn 500ms;
            animation:fadeIn 500ms;
        }
        .registration-form, .login_form, .registration{
            transition:height 500ms ease;
        }
    </style>
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river animated fadeInDown" style="padding:50px 0;" >
        <div class="container">
            <div id="title" class="row center" >
                <h1  style="margin:50px;"> Student Verification</h1>
            </div>
        </div>
    </section><!--/#services-->

    
    <section id="registration" class="container animated fadeInUp">
        <form id="login_form" class="center" role="form" action="none" method="post">
            <fieldset class="registration-form" style="position:relative; top:-100px; width:400px;">
                <div class="form-group">
                    <input type="text" id="student_id" name="student_id" placeholder="Student ID" class="form-control">
                </div>
               
                <div class="form-group">
                    <input type="password" id="l_name" name="l_name" placeholder="Password" class="form-control">
                </div>
               
                <div class="form-group">
                    <button type="button" id="verify" name="verify" onclick="enter()" class="btn btn-info btn-md btn-block">Okay</button>
                </div>
                <div id="error_msg" class="alert hidden"></div>
            </fieldset>
        </form>
    </section><!--/#registration-->


    <div id="virtualKeyboard" class="virtualKeyboard hide-keyboard"></div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <!-- scripts for keyboard -->
    <script type="text/javascript" src="js/keyboard/jsKeyboard.js"></script>
    <script type="text/javascript" src="js/keyboard/main.js"></script>


    <script>
        function goBack(){
            window.history.go(-2);
        }
        function enter(){
            //alert("go this way.");
            var student_id = $("#student_id").val();
            var l_name = $("#l_name").val();
            $.ajax({
            url: "actions/verify-student.php",
            type: "GET",
            data: {stud_id:student_id, l_name:l_name},
            async : false,
            success: function(data){
                if(data=="success"){
                    $("#error_msg").removeClass("alert-danger").addClass("alert alert-success").text("Success");
                    $.ajax({
                        url: "actions/student_set_session.php",
                        data: {stud_id:student_id},
                        type: "GET",
                        success:function(){
                            console.log("student # "+student_id+" has logged in to the system.");
                        }
                    });

                    setTimeout((function(){
                        window.location = "student-home.php";
                    }), 1000);
                }else{
                    $("#error_msg").addClass("alert-danger").text(data);
                }
                $("#error_msg").removeClass("hidden");
            }
            });
        }
    </script>

</body>
</html>