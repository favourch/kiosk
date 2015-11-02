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
    <link href="css/fullcalendar.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->     
  
    <style type="text/css">
   
        .fc-view-container{
            background-color: #fff;
            color: #000;
        }
        .fc-unthemed .fc-today{
            background-color:#86A3FF;
            background-color:#FFB96B;
        }
        .fc-day-grid-event > .fc-content {
            cursor: pointer;

        }
        .modal.fade .modal-dialog {
            transform: translate(50%,0%);
        }
        .modal.in .modal-dialog {
            transform: translate(0,0);
        }
    </style>
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
                <h3> <i class="icon-calendar" ></i> Calendar of Activities</h3>
            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:20px; height:90%">
        <div id="panel" style="width: 70%; margin: 0 auto; border: 1px solid #dadada; border-radius: 4px; height:100%; background-color:#fafafa; padding-top:10px;background-color: #34495E;color: #fff;">
            <div class="container center">
               

                                <div id="calendar">
                                    
                                </div><!-- /.calendar -->



            </div>
        </div><!-- /#panel -->
    </section>


    <div id="modal_event" class="modal fade animated fadeInRightBig " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width:700px;height:500px;margin-top:100px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:2%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:98%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="padding: 0; margin: 0px 0px 0px 22px; color: #000; font-size: 40px;" id="title">Schedule Ticket</h3>
            
                
                <div class="modal-body" style="padding: 0px 0px 0px 22px;">
                      <h4 id="ticket-room" style="font-size:30px;"></h4>
                      <h6 id="ticket-building"></h6>
                      <hr>
                      <table id="schedule_details">
                        <tr>
                          <th width="150px" style="font-size: 20px;">Venue:</th>
                          <th id="event_venue" style="font-size: 28px;">BSIT 3c</th>
                        </tr>
                        <tr>
                          <th style="font-size: 20px;">Date:</th>
                          <th id="event_date" style="font-size: 28px;">Introduction to Computer Science</th>
                        </tr>
                        <tr>
                          <th style="font-size: 20px;">Time:</th>
                          <th id="event_time" style="font-size: 28px;">CS 11</th>
                        </tr>
                        <tr>
                          <th style="font-size: 20px;">Theme:</th>
                          <th id="event_theme" style="font-size: 28px;">Monday</th>
                        </tr>
                        <tr>
                          <th style="font-size: 20px;">Fee:</th>
                          <th id="event_fee" style="font-size: 28px;">7:00AM - 8:00AM</th>
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

 <div id="modal_holiday" class="modal fade animated fadeInRightBig " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width:700px; height: 270px; margin-top:100px;"> <!--modified-->
        
        <div class="modal-content " style="height:100%">  <!--modified-->
            <div style="width:2%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="width:98%;height:100%; display:inline-block; padding:20px;" > <!--modified-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="padding: 0; margin: 0px 0px 0px 22px; color: #000; font-size: 20px;" id="holidate">Schedule Ticket</h3>
            
                
                <div class="modal-body" style="padding: 0px 0px 0px 22px;">
                      <h4 id="ticket-room" style="font-size:30px;"></h4>
                      <h6 id="ticket-building"></h6>
                      <hr>
                      <table id="schedule_details">
                        <tr>
                          
                          <th id="occasion" style="font-size:30px;">BSIT 3c</th>
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

    <script src='lib/moment.min.js'></script>
    <script src="js/fullcalendar.js"></script>
    <script>
        function goBack(){
            window.history.go(-2);
        }
        $(document).ready(function() {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                contentHeight: 540,
                handleWindowResize: true,
                header:{
                    left:   '',
                    center: 'title',
                    right:  'today prev next'
                },
                windowResize: function(view) {
                    $('#calendar').fullCalendar('render');
                },
                events: [
     <?php 
            $query_post=mysql_query("SELECT * FROM posts_t WHERE type_of_post='event' OR type_of_post='holiday'");

            while ($row_post=mysql_fetch_assoc($query_post)) {
                $post_id=$row_post['post_id'];
                $type_of_post=$row_post['type_of_post'];
                $post_title=$row_post['post_title'];
                
                if($type_of_post=='event'){
                 
                 $query_event=mysql_query("SELECT * FROM post_events_t WHERE event_id='$post_id'");

                while($row_event=mysql_fetch_assoc($query_event)){
                    $start_date=$row_event['date_start'];
                    $end_date=$row_event['date_end'];
                    $end_date = date('Y-m-d', strtotime($end_date . ' + 1 day'));
                
                    
                    
                     ?> 


                    {
                        id      : "<?php echo $post_id ?>",
                        title   : "<?php echo $post_title; ?>",
                        start   : "<?php echo $start_date ?>",
                        end     : "<?php echo $end_date ?>",
                        color   : "#9465B0",
                    },

                <?php 
                    }
                }

                    if($type_of_post=='holiday'){
                    
                    $query_holiday=mysql_query("SELECT * FROM post_holidays_t WHERE holiday_id='$post_id'");
                    while($row_holiday=mysql_fetch_assoc($query_holiday)){
                        $holidate=$row_holiday['date_of_holiday'];
                   ?>
                    {
                        id      : "<?php echo $post_id ?>",
                        title   : "<?php echo $post_title; ?>",
                        start   : "<?php echo $holidate ?>",
                        color   : "#3a87ad",

                       
                    },
                    

                    <?php       }
                            }
                        } //query ?>    
                ],
                eventClick: function(event) {
                    if (event.url) {
                        window.open(event.url);
                        return false;
                    }
                    var post_id=event.id;
                    //alert(post_id);
                    console.log("eventClick funciton callback for eventes triggered");
                    
                    $.ajax({
                        url: "actions/calendar.php",
                        method: "GET",
                        data: {post_id:post_id},
                        async: false,

                        success: function(data){
                            //alert(data);
                            var details = jQuery.parseJSON(data);
                            var type_of_post=details['type'];
                           
                                if(type_of_post=='event'){
                                    var event_title=details['event_title'];
                                    var event_venue=details['event_venue'];
                                    var time=details['time'];
                                    var date=details['date'];
                                    var theme=details['event_theme'];
                                    var fee=details['fee'];


                                    $("#title").text(event_title);
                                    $("#event_venue").text(event_venue);
                                    $("#event_date").text(date);
                                    $("#event_time").text(time);
                                    $("#event_theme").text(theme);
                                    $("#event_fee").text(fee);
                                    $("#modal_event").modal("toggle");
                                     } //if event


                                 if (type_of_post=='holiday'){
                                    //alert("dito");
                                    var occasion=details['occasion'];
                                    var holidate=details['holidate'];

                                    $("#holidate").text(holidate);
                                    $("#occasion").text(occasion);
                                    $("#modal_holiday").modal("toggle");
                                }

                         } //success function



                    }) //ajax
                }


            })

        });

    </script>
    
    

</body>
</html>