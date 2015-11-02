<!DOCTYPE html>
<html lang="en" style="padding:0;" ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Start Here</title>


    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">

    <!-- Screensaver stylesheets -->
    <link rel="stylesheet" href="e-bulletin/s_saver/scr_saver/css_S/jquery.animateSlider.css">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <link href="css/ours.css" rel="stylesheet">

    <style type="text/css">

        .post1, .post2, .post3, .post4{
            background-color: rgba(255, 255, 130, 1);
            width: 315px;
            margin: 35px 10px 10px 10px;
            /*background-color: #fff*/;
            word-wrap: break-word;
            display: inline-block;
            vertical-align: top;
        }

        .post{
            background-color: rgba(255, 255, 130, 1);
            width: 240px;
            margin: 5px;
            word-wrap: break-word;
            display: inline-block;
            vertical-align: top;
        }
        .post_m{
            background-color: rgba(239, 0, 255, 0.57);
            width: 240px;
            margin: 5px;
            word-wrap: break-word;
            display: inline-block;
            vertical-align: top;
        }
        .post_a{
            background-color: rgba(79, 154, 239, 0.57);
            width: 240px;
            margin: 5px;
            word-wrap: break-word;
            display: inline-block;
            vertical-align: top;
        }
        .post_h{
            background-color: rgba(5, 255, 8, 0.68);
            width: 240px;
            margin: 5px;
            word-wrap: break-word;
            display: inline-block;
            vertical-align: top;
        }
        
        
        .post_section {
            margin: 0 auto;
            margin-right: 150px;
            margin-top: 20px;
            width: 1066px;
            height: 87%;
            padding: 0px 10px 10px 10px;
            transition: width 1s ease, margin-right 1s ease;
            }
        
        .post_adjust {
            margin-right: 45px;
            width: 1045px;
            
            }
        
    
                    
        .content {
            padding: 5px 10px 10px 10px;
            box-sizing: border-box;
            color: rgba(0,0,0,0.8);
            font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
            font-size: 25px;
            font-family: 'Roboto', sans-serif;
            text-align: left;
            }

       
        .post hr{
            margin: 0;
            border: 1px solid #9b59b6;
        }
        
        #title {
            font-weight:bold;
            font-size:26px;
            padding-bottom: 5px;
            }

       
        .button {
            margin: 0 0 10px 0; 
            width: 305px; 
            height: 50px;
            font-size: 24px;
            
            }
        .section{
            margin-top: -10px;
            }
            
        
        
        .size {
            width: 315px;
            height: 200px;
            
            }
        .sizeof2 {
            width: 157.5px;
            height: 200px;
            
            
            }
        .sizeof3 {
            width: 117px;
            height: 62px;
        }
        .sample{
            width:100px;
            display: table-cell;
            }

            
        .side {
            margin: 10px 10px 0px 10px; 
            color: #FFF; 
            font-size: 20px; 
            padding: 10px;
            
            }
    
        
        .footer {
            font-style: italic;
            font-size: 12px;
            float: right;
            font-family: Arial
                        
            }
            

    
        .tab-up {
            height: 50px;
            padding-top: 15px;
            transition: height 1s ease, padding-top 1s ease;

        }
        .tab-down {
            height: 88px; 
            padding-top: 35px;

        }
        
        .heading {
            height: 55px;
            transition: height 1s ease;
        }

        .heading-adjust {
            height: 93px;
        }

        .unit_checkbox {
            margin: 21px 5px 21px 100px;
        }

        .unit_adjust{
            margin: 21px 5px 21px 300px;
        }





/**********************************************/




      #viewport, #panel{
          position:relative;
          animation: fadeIn 2s;
          -moz-animation: fadeIn 2s; /* Firefox */
          -webkit-animation: fadeIn 1.8s; /* Safari and Chrome */
          -o-animation: fadeIn 2s; /* Opera */
      }
      .screen-footer{

        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #404040;
        height: 50px;
      }
      .cover-screen{
        position:fixed;
        width:100%;
        height:100%;
        top:0;
        left:0;
        background-color: #fff;
          
        transition: top 1s ease;
        z-index: 100;

        background: #606c88; /* Old browsers */
        background: -moz-linear-gradient(top,  #606c88 0%, #3f4c6b 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#606c88), color-stop(100%,#3f4c6b)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #606c88 0%,#3f4c6b 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #606c88 0%,#3f4c6b 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #606c88 0%,#3f4c6b 100%); /* IE10+ */
        background: linear-gradient(to bottom,  #606c88 0%,#3f4c6b 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#606c88', endColorstr='#3f4c6b',GradientType=0 ); /* IE6-9 */
        background-image: url("img/kioskcolor.jpg");
        background-size:cover;
         -webkit-backface-visibility: hidden;

      }
      .home-screen{
        position:fixed;
        width:100%;
        height:100%;
        background-image: url("img/kioskcolor.jpg");
        background-size:cover;
         -webkit-backface-visibility: hidden;

      }
      .hide-cover{
        top:-100%;
      }
      .cover-text{
        overflow-y: hidden;
        width: 50%;
        margin: auto;
        margin-top: 130px;
        background-color: rgba(33, 33, 33, 0.49);
        border-radius: 10px;
        padding: 30px;


      }

      #buttons{

        height: 100%;
        padding: 5px;
      }
      #buttons > a{
        border: 2px solid white;
        padding: 8px;
        border-radius: 100%;
        font-size: 15px;
        display: inline-block;
        width: 40px;
        margin:0 15px;
      }
      #buttons > a:hover,
      #buttons > a:active{
        color:#dadada;
        border-color:#dadada;
      }


      #menu {
        position:fixed;
        height: 92%;
        width: 100%;
      }
      .menu-panel{
        top:0;
        left:0;
        z-index: 10;
        transition:left 1s ease;
      }
      .hide-menu{
        left: 100%;
      }
    </style>
    

  <body style=" margin:0; padding:0;">

    <div class="cover-screen hide-cover">
          
       <!--    <div class="cover-text" style="overflow-y:hidden;">
            <h3 id="time" style="margin:0;">time</h3>
            <h6 id="date">date</h6>
            <?php 
            include "db/db.php";
            $query_message = mysqli_query($db_con,"SELECT * FROM message_board_t ") or die(trigger_error(mysqli_error($db_con)));
            $row_message = mysqli_fetch_array($query_message);
            $title = $row_message['title'];
            $message = $row_message['message'];
            ?>
            <h1 class="cover-heading"><?php echo $title?></h1>
            <p id="greetings" class="lead "><?php echo $message;?></p>
            <hr>
            <p>Tap anywhere to continue...</p>
          </div>
 -->

            <ul class="anim-slider" id="post_content" style="background-color:#0484C8;position:absolute;"> <!-- A93B41 -->

                <?php 
                    $c=0;
                    $query_img=mysql_query("SELECT * FROM image_slide_t, attachment_t, posts_t WHERE image_slide_t.post_id=posts_t.post_id
                                            AND attachment_t.post_id=posts_t.post_id");
                
                ?>
                <!-- Slide No1 -->
            
            
                     
                    <?php   while($row_img=mysql_fetch_assoc($query_img)){
                             
                                $account_no=$row_img['account_no'];
                                $post_id=$row_img['post_id'];
                                $post_title=$row_img['post_title'];
                                $time_of_post=$row_img['time_of_post'];
                                $date_of_post=$row_img['date_of_post'];
                                $identity=$row_img['identity'];
                                $type_of_post=$row_img['type_of_post'];
                                $status=$row_img['status'];
                               //echo "$post_title";
                                $posts[$c]["post_id"]=$post_id;
                                $posts[$c]["types"]=$type_of_post;
                                $posts[$c]["post_title"]=$post_title;
                                $posts[$c]["time_of_post"]=$time_of_post;
                                $posts[$c]["date_of_post"]=$date_of_post;
                                $posts[$c]["identity"]=$identity;
                                $posts[$c]["account_no"]=$account_no;
                                $posts[$c]["status"]=$status;
                                $c++; 

                                
                            
                            } ?>
                        
                
                
                
                <!-- Slide No2 -->
                


                <!-- Slide No3 -->
            
                <!-- Arrows -->
                
                <!-- Dynamically created dots -->
                
            </ul>



    </div><!--/.cover-screen-->

    <div id="viewport" class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container" style="position:relative; top:0px;">

          

          <div id="app-panel" class="inner cover" style="overflow-y:hidden;">
            
            
            <div id="apps" class="apps-panels " style="">
                <div class="box-shortcut" style="background-color:#2d89ef">
                    <a href="faculty-search.php" style="">
                    <span class="icon-user" ></span>

                    <h4>Faculty Schedule</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#7e3878">
                    <a href="student-verification.php" style="">
                    <span class="icon-book" ></span>

                    <h4>Student Info.</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#ee1111">
                    <a href="map.php" style="">
                    <span class="icon-map-marker" ></span>

                    <h4>Locator Map</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#2b5797">
                    <a href="office-search.php" style="">
                    <span class="icon-coffee" ></span>

                    <h4>Office Info.</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#2d89ef">
                    <a href="e-bulletin/bulletin_option.php" style="">
                    <span class="icon-info" ></span>

                    <h4>E - Bulletin</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#7e3878">
                    <a href="calendar-of-activities.php" style="">
                    <span class="icon-calendar" ></span>

                    <h4>Activities</h4>
                    </a>
                </div>
                
                
            </div> <!--/apps-panel-->

            
          </div>
        



        <div id="menu" class="menu-panel hide-menu" style="padding:20px;background-color: rgba(0, 0, 0, 0.75);">
            <div class="col-lg-12" style="height: 100%;overflow-y: auto;">
                
                <div class="row">
                    <div class="menu-item">
                        <div class="media" onclick="select_option(1)">
                            <div class="pull-left">
                                <i class="icon-columns icon-md" style="background-color:rgba(166, 2, 247, 0.61)"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">E - Bulletin</h3>
                                <p>View the latest announcements and updates here. Scientia Bullein, CSC Bulletin, CS/IT Department Bulletin, etc..</p>
                            </div>
                        </div>
                    </div><!--/.menu-item-->
                    <div class="menu-item">
                        <div class="media" onclick="select_option(2)">
                            <div class="pull-left">
                                <i class="icon-map-marker icon-md" style="background-color:rgba(255, 203, 0, 0.95)"></i><!--  -->
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">BU Digital Map</h3>
                                <p>Find your classroom, locate your teacher, or simply just look for places to go within BU main campus.</p>
                            </div>
                        </div>
                    </div><!--/.menu-item-->
                    <div class="menu-item">
                        <div class="media" onclick="select_option(3)">
                            <div class="pull-left">
                                <i class="icon-info icon-md" style="background-color:rgba(119, 252, 13, 0.6)"></i><!-- rgba(119, 252, 13, 0.6) -->
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Office Information</h3>
                                <p>Having trouble with our services? Visit the office information o see what your looking for. We provide the procedures to choo choo.</p>
                            </div>
                        </div>
                    </div><!--/.menu-item-->
                </div><!--/.row-->
                <div class="row">

                    <div class="col-md-4 col-sm-6">

                        <div class="media" onclick="select_option(4)">
                            <div class="pull-left">
                                <i class="icon-user icon-md" style="background-color:rgba(13, 179, 252, 0.6)"></i><!--  -->
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Faculty Info</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(5)">
                            <div class="pull-left">
                                <i class="icon-sitemap icon-md" style="background-color:rgba(252, 13, 13, 0.6)"></i><!--  -->
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Organizations and Offices</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(6)">
                            <div class="pull-left">
                                <i class="icon-edit icon-md" style="background-color:rgba(255, 169, 13, 0.6)"></i><!--  -->
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading" >Registration Information</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
                <div class="gap">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(7)">
                            <div class="pull-left">
                                <i class="icon-bar-chart icon-md" style="background-color:rgba(13, 80, 255, 0.6)"></i> <!--  -->
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Student Grades</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(8)">
                            <div class="pull-left">
                                <i class="icon-calendar icon-md" ></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Student Schedule</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(9)">
                            <div class="pull-left">
                                <i class="icon-tags icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Student Payment Info.</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
                <div class="gap">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(10)">
                            <div class="pull-left">
                                <i class="icon-calendar icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Calendar of Activities</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(11)">
                            <div class="pull-left">
                                <i class="icon-calendar icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Room Vacancy</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media" onclick="select_option(12)">
                            <div class="pull-left">
                                <i class="icon-tags icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Another Feature</h3>
                                <p></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
                


            </div><!--/.col-->
        </div><!--/#menu-->


          <div class="mastfoot screen-footer">
          <!--
            <div class="" style="padding: 10px 20px;float: left;">
              <p>Developed by Team 10 BUCS BSIT 4th Year A.Y. 2014-2015</p>
            </div>
          -->
            <div id="buttons">
<!-- 
              <a href="#"><span class="glyphicon glyphicon-home"></span></a>
              <a href="#" onclick="toggleMenu()"><span class="icon-th"></span></a>
               -->
              <a href="#" onclick="toggleLock()"><span class="icon-lock"></span></a>
            </div>
          </div>

        </div>

      </div>

    </div>









    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>

    <script src="e-bulletin/s_saver/dist/modernizr.js"></script>
    <script>
        startTime();
        (function(){
            var greetings = $("#greetings"); 
            var apps = $("#apps");
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                apps.toggleClass("show-apps");
                greetings.toggleClass("show-greetings");
            });

        })();
        $('.cover-screen').click(function(){
          toggleLock();

        });
        function toggleLock(){
          $(".cover-screen").toggleClass("hide-cover");
        }
        function toggleMenu(){
          $(".menu-panel").toggleClass("hide-menu");
          $("#apps").toggleClass("hide-cover");
        }

        function startTime() {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            var dd = "AM";
            if (h >= 12) {
                h = h-12;
                dd = "PM";
            }
            if (h == 0) {
                h = 12;
            }


            year = today.getFullYear();
            month = today.getMonth();
            months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
            d = today.getDate();
            day = today.getDay();
            days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');



            m = checkTime(m);
            s = checkTime(s);
            $("#time").text( h+":"+m+" "+dd);
            $("#date").text( months[month]+" "+d+", "+year);
            var t = setTimeout(function(){startTime()},500);
        }

        function checkTime(i) {
            if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


    <!-- bulletin scripts -->

    <script>
         var posts=<?php echo json_encode(isset($posts)?$posts:""); ?>;
       
        if(posts==""){
            //alert("here");
            $("#content").html("<h1>No Post Found</h1>")
        }
        
        $.ajax({
            url: "e-bulletin/s_saver/scr_saver/event.php",
            type: "POST",
            data: {posts:posts},
            async: false,
            success: function(data){
                    //alert("here");
                    //console.log(data);
                    $("#post_content").html(data);


            }

        })

    </script>


    <script src="e-bulletin/s_saver/src/jquery.animateSlider.js"></script>
        <script src="js/masonry.pkgd.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script>
         $(".anim-slider").animateSlider(
            {
                autoplay    :true,
                interval    :10000,
                animations  : 
                {
                    0   :   //Slide No1
                    {
                        ".home-screen":
                        {
                            show      :"fadeIn",
                            hide      :"fadeOut",
                            delayShow :"delay0-5s"

                        },
                        ".cover-text":
                        {
                            show      :"fadeInDown",
                            hide      :"fadeOutUp",
                            delayShow :"delay1-5s"
                        }

                    },
                    1   :   //Slide No1
                    {
                        ".post1"    : 
                        {
                            show      : "bounceIn",
                            hide      : "flipOutX",
                            delayShow : "delay1s"
                        },
                        ".post2":
                        {
                            show      : "fadeInUpBig",
                            hide      : "fadeOutDownBig",
                            delayShow : "delay1-5s"
                        },
                        ".post3"    :
                        {
                            show      : "bounceInRight",
                            hide      : "fadeOutRightBig",
                            delayShow : "delay1-5s"
                        },
                        ".post4":
                        {
                            show      : "bounceInUp",
                            hide      : "fadeOutLeftBig",
                            delayShow : "delay2s"
                        }   
                    },
                    2   : //Slide No2
                    {   
                        ".post1":
                        {
                            show        : "fadeIn",
                            hide        : "fadeOut",
                            delayShow   : "delay0-5s"
                        },
                        ".post2"    :
                        {
                            show        : "bounceIn",
                            hide        : "bounceOut",
                            delayShow   : "delay2s"
                        },
                        ".post3":
                        {
                            show        : "bounceInDown",
                            hide        : "bounceOutLeft",
                            delayShow   : "delay2-5s"
                        },
                        ".post4":
                        {
                            show        : "bounceInRight",
                            hide        : "bounceOutRight",
                            delayShow   : "delay3s"
                        },



                    },
                    
                }
            });
    </script>


    <!-- scripts for sound effects -->
    <script src="js/ion.sound-master/js/ion.sound.min.js"></script>
    <script type="text/javascript">
        ion.sound({
            sounds: [
                {name: "snap"},
                {name: "branch_break"},
                {name: "tap"},
                {name: "water_droplet_3"},
                {name: "pop_cork"}
                
            ],
            volume: 0.5,
            path: "js/ion.sound-master/sounds/",
            preload: true
        });
        $("a").click(function(e){
            var url = $(this).attr('href');
            e.preventDefault();
            ion.sound.play("branch_break");
            setTimeout(function(){
                window.location = url;
            },200);
            //alert("this");
        });
        var url = window.location;
        var array = String(url).split("#");
        
        if(array.length>1){
            action = array[1];
            if(action=="lock"){
                $(".cover-screen").removeClass("hide-cover");
            }
        }
        
    </script>

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" title="" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1409845180835">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1409845180835" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object>
</div>
  </body>
</html>