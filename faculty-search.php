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

    <!-- stylesheets for keyboard design -->
    <link href="css/keyboard/jsKeyboard.css" rel="stylesheet">
    <link href="css/keyboard/main.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <style rel="stylesheet" type="text/css">
        
    </style>



</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3 style=""> <i class="icon-calendar" ></i> Faculty Schedule</h3>
                <h5 style="">Semester : <?php echo sem_name(semester());?></h5>
            </div>
        </div>
    </section><!--/#page-title-->

    
    <section style="padding-bottom:0; padding-top:20px; height:85%">
        <div id="panel" style="">
            <div id="search-pane" class="col-sm-7not " style="">
                
                    <div class="input-group">
                        <input name="search_value" id="search_value" type="text" class="form-control" autocomplete="off" placeholder="Search" style="border-radius:0; height:56px; font-size:18px;">
                        <span class="input-group-btn" >
                            <button id="search_btn" class="btn btn-danger" type="button" style="border-radius:0; font-size:30px;"><i class="icon-search"></i></button>
                        </span>
                    </div>
                
                
                
            </div><!--/#search_pane-->
                <div id="search-results" style="width:70%;margin:0 auto;height:85%;">
                
                
                 
                </div><!-- /#search-results -->
        </div><!-- /#panel -->
    </section>
    
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
        $(document).ready(function(){
            $('#search_btn').click(function(){
                var searchstr = $("#search_value").val();
                console.log("requesting search for faculty");
                fillList(searchstr);
                
            });
        });
        function fillList(searchstr){
            console.log("filling list :  : value = "+searchstr);
            $.ajax({
                url: "ajax/search_faculty.php",
                data:{search:searchstr},
                type:"GET",
                async:false,
                success:function(data){
                    $("#search-results").html(data);
                }

            });
        }
        fillList("");
    </script>

</body>
</html>