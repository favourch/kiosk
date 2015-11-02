<?php
include "actions/time_intervals.php"; //include the aray $times[] 
include "actions/class_functions.php";
include "actions/subject_functions.php";
include "actions/scheduling_functions.php";
include "db/db.php";
session_start(); # session not really needed, only used to prevent an error ... try it yourself
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BUCS Kiosk | Map</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ours.css" rel="stylesheet">
    <link href="css/schedules.css" rel="stylesheet">
    <link href="css/timetables.css" rel="stylesheet">

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
        #schedule_details th,
        #schedule_details>tr>th{
          line-height: 20px;
        }
        #mapContainer { 
            background: #f0000; 
            /*border: 1px solid #ccc; */
            height: 560px; 
            position: relative; 
            width: 960px; 
            overflow: hidden; 
            margin:auto;
        }
        #mapContainer #mapControls { 
            position: absolute;
            left: 0px;
            top: 10px;
            width: 300px;
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
            
            color: #363636;
            text-shadow: -2px -0px 3px rgba(0, 0, 0, 0.25);

            color: #FFFFFF;
            font-style: italic;
            text-shadow: -0px -0px 5px rgba(0, 0, 0, 1);
            font-weight: 800;
        }
        #map,
        #mapContainer{
            width:100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
        }
        
        #search_results{
            /*height: 445px;*/
            max-height: 400px;
            overflow-y:auto;
        }
        #search_results > ul{
            list-style: none;
            margin: 0;
            padding: 0 0px;
        }
        #search_results ul li{
            padding: 10px 5px;
            margin: 5px;
            background-color: #ECECEC;
            
            background-color: #FFFFFF;
            border: 1px solid #dadada;
            /*font-size: 20px;*/
            box-shadow: 0 10px 5px -10px #BDBDBD;

        }
        #search_results ul li:hover{
            background-color: #DCDCDC;

        }
        .cards{
            background-color: #fff;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px -2px #BDBDBD;

        }
        .cards h3{
            border-bottom: 1px solid #dadada;
            -webkit-backface-visibility: hidden;
        }
        #close_search_results{
            box-shadow: none;
            border: none;
            box-shadow: 0 2px 5px -2px #dadada;
            border-radius: 0;
            background-color: #D9534F;
            padding: 5px;
            margin: 0 5px;
            color: #fff;
            text-align: center;
        }
        #exit_map{
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1;
            font-size: 18px;
            width: 50px;height: 50px;
            border-bottom-left-radius: 45px;
            background-color: rgba(0, 0, 0, 0.44);
        }
        #exit_map>.glyphicon{
            right: 10px;
            position: absolute;
            top: 10px;
            color: #fff;
        }
        #floor_control{
            position: absolute;
            bottom: 10px;
            right: 10px;
            z-index: 1;
            font-size: 18px;
            width: 100px;
            /*height: 100px;*/
            background-color: rgba(255, 255, 255, 0.5);
            text-align:right;
        }
        #floor_control a{
            display: block;
        }
        #floor_no{
            height:100%;
            font-size:30px;
            vertical-align:middle; 
            display:inline;
        }
        #legends_panel .glyphicon{
            font-size: 30px;
            text-align: center;
            vertical-align: middle;
        }
        #legends_panel tr td:first-child{
            text-align:center;
        }
    </style>

</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php";?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="glyphicon glyphicon-map-marker" ></i> <!-- The Maps that leads to youuu ♪♫ -->BUCS MAP</h3>
            </div>
        </div>
    </section><!--/#services-->


    <section class="" style="padding-bottom:0; padding-top:20px; height:90%">
      <div id="panel" class="panel ">
        <div id="left_pane" class="col-sm-9" style="height:100%; width:75%;padding:0;"><!-- modified -->
            <div id="mapContainer">
                <div id="map"></div>

                <div id="exit_map" style="">
                    <span class="glyphicon glyphicon-remove"></span> 
                </div><!-- /#exit_map -->

                <div id="floor_control" style="">
                    <div id="floor_no" style>
                        1F
                    </div>
                    <div class="btn-group-vertical" >
                        <button id="floor_up" class="btn btn-default">
                            <span class="glyphicon icon-chevron-up"></span> 
                        </button>
                        <button id="floor_down" class="btn btn-default">
                            <span class="glyphicon icon-chevron-down"></span> 
                        </button>
                    </div>
                </div><!-- /#floor_control -->

                <div id="mapControls">
                <div class="input-group" style ="padding: 10px;display: flex;"><!-- modified -->
                    <input id="search_location" type="text" class="form-control" autocomplete="off" placeholder="Search" style="box-shadow: none;border: none;box-shadow: 0 2px 5px -2px #BDBDBD;border-radius: 0;">
                    <span class="input-group-btn" style="left:-38px;">
                        <button id="search-button" class="btn" type="button" style="color: #737373;background-color: rgba(255, 255, 255, 0);border-left: none;height:35px;"><i class="icon-search"></i></button>
                    </span>
                </div>

                <div id="search_results" class="hidden">
                  <ul>
                  </ul>
                </div>
                <div id="close_search_results" class="hidden" >
                    <span class="glyphicon glyphicon-remove"></span> Close
                </div>
                <!-- <a id="map_name" href="javascript:;" style="color: #FFE141;">BUCS</span></a>
                <a id="up" href="javascript:;"><span class="glyphicon icon-zoom-in"></span></a>
                <a id="down" href="javascript:;"><span class="glyphicon icon-zoom-out"></span></a>
                <a id="home" href="javascript:;"><span class="glyphicon icon-home"></span></a>
                <a id="floor4" href="javascript:;">4F</a>
                <a id="floor3" href="javascript:;">3F</a>
                <a id="floor2" href="javascript:;">2F</a>
                <a id="floor1" href="javascript:;">1F</a> -->
                </div><!-- /#mapControls -->
            </div>
        </div>
        <div id="rigth_pane" class="col-sm-3" style=" height:100%; padding:0px; overflow-y:auto; overflow-x:hidden"><!-- modified -->
            <div id="info_panel" class="cards">
                <h3>Info</h3>
                <p id="info_1">College of Science</p>
                <p id="info_2">4 Buildings</p >
                <p id="info_3" class="hidden">3 floor</p>
                <p id="info_4">78 Rooms</p>
                <a class="btn btn-sm btn-success hidden">Open Map</a>

            </div>
            <div id="legends_panel" class="cards">
                <h3>Legends</h3>
                <table style="width: 100%; line-height:40px;">
                  <colgroup>
                    <col width="25%" align="center" />
                    <col width="75%"/>
                  </colgroup>
                  <tr>
                    <td ><span class="glyphicon icon-home" style="color: #5A80C1;"></span></td>
                    <td> CS Buildings</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon icon-home"  style="color: #BCBCBC;"></span></td>
                    <td> None-CS Buildings</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon icon-minus"  style="color: #636464;"></span></td>
                    <td> Road</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-tree-deciduous"  style="color: #84B27F;"></span></td>
                    <td> Trees / Grass / Plants</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon icon-circle"  style="color: #e09918;"></span></td>
                    <td> Selected Building</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon icon-female"  style="color: #EA7EAF;"></span></td>
                    <td> Female CR</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon icon-male"  style="color: #5A92C1;"></span></td>
                    <td> Male CR</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-arrow-right"  style="color: #D64E4D;"></span></td>
                    <td> Waypoint</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-comment"  style="color: #D64E4D;"></span></td>
                    <td> Labels</td>
                  </tr>
                </table>
            </div>
                <!-- <div class="input-group" style ="padding: 10px;border-bottom: 1px solid #dadada;box-shadow: 0 10px 20px -20px #3a3a3a;">
                    <input id="search_location" type="text" class="form-control" autocomplete="off" placeholder="Search">
                    <span class="input-group-btn" >
                        <button id="search-button" class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                    </span>
                </div> -->

            
            

        </div><!--/#main-->
      </div><!--/#panel-->
      
    </section>
    
    <div id="virtualKeyboard" class="virtualKeyboard hide-keyboard"></div>

     <!-- MODAL for Schedule Ticket -->
    <div id="ticket_modal" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width:700px;height:500px;margin-top:100px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:20%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:80%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="padding:0;margin:0;color: rgba(159, 116, 160, 0.22);" >Schedule Ticket</h3>
            
                
                <div class="modal-body">
                      <h4 id="ticket-room" style="font-size:30px;"><?php echo $faculty_name; ?></h4>
                      <h6 id="ticket-building"><?php echo $faculty_position; ?></h6>
                      <hr>
                      <table id="schedule_details">
                        <tr>
                          <th width="150px">Course Block</th>
                          <th id="ticket-block">BSIT 3c</th>
                        </tr>
                        <tr>
                          <th>Course Title</th>
                          <th id="ticket-subject_title">Introduction to Computer Science</th>
                        </tr>
                        <tr>
                          <th>Course Code</th>
                          <th id="ticket-subject_code">CS 11</th>
                        </tr>
                        <tr>
                          <th>Day</th>
                          <th id="ticket-day">Monday</th>
                        </tr>
                        <tr>
                          <th>Time</th>
                          <th id="ticket-time">7:00AM - 8:00AM</th>
                        </tr>
                        <tr>
                          <th>Faculty</th>
                          <th id="ticket-faculty">CSB2 201</th>
                        </tr>
                      </table>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                </div>
            </div>
                

        </div>
    </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <!-- scripts for the maps that leads to you -->
    <!-- 
    <script type="text/javascript" src="js/raphael-pan-zoom/vendor/raphael-min.js"></script>
    <script type="text/javascript" src="js/raphael-pan-zoom/src/raphael.pan-zoom.js"></script>
     -->
    <script src="js/raphael-pan-zoom/vendor/raphael.min.js"></script>   
    <script src="js/raphael-pan-zoom/vendor/hammer.js"></script>
    <script src="js/raphael-pan-zoom/vendor/raphael.pan-zoom.js"></script>

    <script type="text/javascript" src="js/svg-maps/map.paths.js"></script>
    <script type="text/javascript" src="js/svg-maps/maps.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_cs.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b11f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b12f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b13f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b21f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b22f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b31f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b32f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b41f.js"></script>
    <script type="text/javascript" src="js/svg-maps/svg_b42f.js"></script>
    <script type="text/javascript" src="js/svg-maps/map.init.js"></script><!-- has document.ready -->


    <!-- scripts for keyboard -->
    <script type="text/javascript" src="js/keyboard/jsKeyboard.js"></script>
    <script type="text/javascript" src="js/keyboard/main.js"></script>
    

    <script>
        var CLICK_SOUND = "water_droplet_3";
        var locations = [
            {id:'csb1', name:'csb1'}, 
            {id:'csb2',name:'csb2'}, 
            {id:'csb3',name:'csb3'}, 
            {id:'csb4',name:'csb4'}, 
            {id:'csb2_201',name:'csb2 201'}, 
            {id:'csb2_205',name:'csb2 205'}
            <?php 
            $query_cunit = mysql_query("SELECT * FROM unit_t ") or die("alert('".mysql_error()."')");
            while($row_cunit = mysql_fetch_assoc($query_cunit)){
                echo ',{id:"'.$row_cunit['unit_id'].'",name:"'.$row_cunit['unit_name'].'"}';


            }
            $query_room = mysql_query("SELECT * FROM room_t ") or die("alert('".mysql_error()."')");
            while($row_room = mysql_fetch_assoc($query_room)){
                echo ',{id:"'.$row_room['room_code'].'",name:"'.$row_room['room_name'].'"}';


            }
            ?>

        ];
        var locationID = ['csb1', 'csb2', 'csb3', 'csb4' , 'csb2_201', 'csb2_205'
            <?php 
            $query_cunit = mysql_query("SELECT * FROM unit_t ") or die("alert('".mysql_error()."')");
            while($row_cunit = mysql_fetch_assoc($query_cunit)){
                echo ',"'.$row_cunit['unit_id'].'"';
            }
            ?>

        ];


        searchLocation("");
        $("#search-button").click(function(){
            var value = $("#search_location").val();
            searchLocation(value);
        });
        $("#search_location").change(function (){
            var value = this.value;
            searchLocation(value);
            
        });
        $("#close_search_results").click(function(){
            $("#search_results").addClass("hidden");
            $("#close_search_results").addClass("hidden");

        });
        //function to fill search results with a list of data
        function fillList(results){
            var list = [];
            for(i=0;i<results.id.length;i++){
                var location = results.name[i];
                list += "<li onclick='highlight("+'"'+results.id[i]+'"'+")'>";
                list += results.name[i];
                list += "</li>";
            }

            $("#search_results ul").html(
                list

            );
            $("#search_results").removeClass("hidden");
            $("#close_search_results").removeClass("hidden");
        }
        //generates new list of data from searched value
        function searchLocation(value){
            var results = "";
            // results.id = [];
            // results.name = [];
            // //searching array of location names 
            // for(i=0;i<locations.length;i++){
            //     var check = locations[i].name.toLowerCase().indexOf(value);
            //     console.log("check value = "+check);
            //     if(check>=0){
            //         results.name.push(locations[i].name);
            //         results.id.push(locations[i].id);
            //     }
            // }
            $.ajax({
                url: "ajax/search_location.php",
                type: "GET",
                data: {search:value},
                async : false,
                success: function(data){
                    //alert(data);
                    
                    $("#search_results ul").html(data);
                    $("#search_results").removeClass("hidden");
                    $("#close_search_results").removeClass("hidden");

                }
            });

            //filling search results with new list 
            //fillList(results);
            //return results;
        }
        


        
        function toggleSize(){
            var timetable = $("#timetable");
            timetable.toggleClass("compact-table");
        }
        function show_ticket(schedule_id){
            if(schedule_id!=""){
                $.ajax({
                    url: "ajax/schedule_details.php",
                    type: "GET",
                    data: {schedule_id:schedule_id},
                    async : false,
                    success: function(data){
                        ///'alert(data);
                        var details = jQuery.parseJSON(data);
                        var block = details['course_code']+" "+details['block'];
                        var subject_title = details['subject_title'];
                        var subject_code = details['subject_code'];
                        var day = details['day'];
                        var time = details['start_time']+" - "+details['end_time'];
                        var room = details['room'];
                        var faculty = details['faculty_name'];
                        $("#schedule_details").removeClass("hidden");

                        $("#ticket-block").text(block);
                        $("#ticket-subject_title").text(subject_title);
                        $("#ticket-subject_code").text(subject_code);
                        $("#ticket-day").text(day);
                        $("#ticket-time").text(time);
                        $("#ticket-room").text(room);
                        $("#ticket-building").text(room);
                        $("#ticket-faculty").text(faculty);


                    }
                });
            }
            else{
                $("#schedule_details").addClass("hidden");
                $("#ticket-room").text("No Schedule as of the moment");
                $("#ticket-building").text("vacant");
                
            }

            $("#ticket_modal").modal("toggle");
        }
    </script>

</body>
</html>