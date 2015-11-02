<!DOCTYPE html>

<?php
include "../db/db.php";
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
    $account_no=$_SESSION['kiosk']['user_id'];

    $query=mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'") or die(mysql_error());
    $row=mysql_fetch_assoc($query);


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
    <link href="../css/style.css" rel="stylesheet">
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
        
    </style>

</head><!--/head-->
<body style="padding-top: 0px;">

 <?php 
        $type=$_GET['type'];
 		?>
 
          
					         
           <?php     
      if ($type=='event') { ?>
		<form id="event" class="center" role="form" action="actions/addpost_action.php" method="post" name="addpost_event" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 85%">
             <div id="error_event" class="alert hidden"></div>
            	<div class="form-group">
                    <input type="text" name="event_title" placeholder="Event Title" class="form-control" id="event_title">
                </div>
                	<input type="hidden" value="<?php echo $type; ?>" name="type_id" id="type_id">
                <div class="form-group">
                    <input type="text" name="event_venue" placeholder="Venue" class="form-control" id="event_venue">
                </div>
                <div class="form-group">
                    <input type="time" name="start_time" placeholder="Time" class="form-control" id="start_time">
                </div>
                  <div class="form-group">
                    <input type="time" name="end_time" placeholder="Time" class="form-control" id="end_time">
                </div>
                
                 <div class="form-group">
                    <input type="date" name="start_date" placeholder="Date" class="form-control" id="start_date">
                </div>
                 <div class="form-group">
                    <input type="date" name="end_date" placeholder="Date" class="form-control" id="end_date">
                </div>
                <div class="form-group">
                    <textarea name="event_theme" placeholder="Theme (optional)" class="form-control" style="height:150px" id="event_theme"></textarea>
                </div> 
                <div class="form-group">
                   
                    <select id="fee_option" name="fee_option" class="form-control">
                        <option value="">select...</option>
                        <option value="0">FREE</option>
                        <option value="i_fee">Input Fee</option>
                    </select>
                    <br>
                     <input type="text" name="event_fee" placeholder="Event Fee" class="form-control hidden" id="event_fee">
                </div>
                <p align="left"><b>Attachment</b></p>
                <div class="separate">
                	
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           		
                    <input type="button" id="add_more" class="" style="float: left; margin-bottom: 10px;" value="Add More Files"/>
                </div>

                <?php if($row['type']!="admin"){ ?>
                <p align="left"><b>Post as: </b></p>
              	<div class="form-group" style="float: left; margin-bottom: 10px;  position: relative;">
                	<select name="as">
                            <option value="anonymous">Anonymous</option>
                            <option value="name">Your Name</option>
                            <option value="unit">Your Department/Unit/Organization</option>
                    </select>
                </div>
               
                <?php } ?> 
                
                <div class="form-group">
                  <input type="submit" value="Post" name="submit" class="upload"/>
                </div>
            </fieldset>
        </form>
		
	<?php
     } // if events 
     else if ($type=='message') { ?>
         <form id="message" class="center" role="form" action="actions/addpost_action.php" method="post" name="addpost" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 85%">
               <div id="error_message" class="alert hidden"></div>
            	<div class="form-group">
                    <input type="text" name="post_title" placeholder="Post Title (optional)" class="form-control" id="msg_title"></textarea>
                </div>
                    <input type="hidden" value="<?php echo $type; ?>" name="type_id" id="type_id">
                <div class="form-group">
                    <textarea name="post" placeholder="Post" class="form-control" style="height:150px" id="msg_content"></textarea>
                </div>
                <p align="left"><b>Attachment</b></p>
                <div class="separate">
                	
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           		
                    <input type="button" id="add_more" class="" style="float: left; margin-bottom: 10px;" value="Add More Files"/>
                </div>
               <?php if($row['type']!="admin"){ ?>
                <p align="left"><b>Post as: </b></p>
                <div class="form-group" style="float: left; margin-bottom: 10px;  position: relative;">
                    <select name="as">
                            <option value="anonymous">Anonymous</option>
                            <option value="name">Your Name</option>
                            <option value="unit">Your Department/Unit/Organization</option>
                    </select>
                </div>
               
                <?php } ?> 
              	
                <div class="form-group">
                   <input type="submit" value="Post" name="submit" class="upload" onClick="post_msg()"/>
                </div>
            </fieldset>
        </form>
<?php } else if ($type=='announcement') { ?>
		<form id="announcement" class="center" role="form" action="actions/addpost_action.php" method="post" name="addpost" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 85%">
            	<div class="form-group">
                    <input type="text" name="post_title" placeholder="Post Title (optional)" class="form-control"></textarea>
                </div>
                	<input type="hidden" value="<?php echo $type; ?>" name="type_id" id="type_id">
                <div class="form-group">
                    <textarea name="post" placeholder="Post Description" class="form-control" style="height:150px"></textarea>
                </div>
                <p align="left"><b>Attachment</b></p>
                <div class="">
                	
                    <div id="filediv"><input name="file" type="file"/></div><br/>
           		
                   
                </div>
               <?php if($row['type']!="admin"){ ?>
                <p align="left"><b>Post as: </b></p>
                <div class="form-group" style="float: left; margin-bottom: 10px;  position: relative;">
                    <select name="as">
                            <option value="anonymous">Anonymous</option>
                            <option value="name">Your Name</option>
                            <option value="unit">Your Department/Unit/Organization</option>
                    </select>
                </div>
               
                <?php } ?> 
              	<br>
                <br>
                <div class="form-group">
                   <input style="width: 100%" type="submit" value="Post" name="submit" class="btn btn-info"/>
                </div>
            </fieldset>
        </form>
		
		
<?php } else if ($type=='holiday') { ?>
		
       <form id="holiday" class="center" role="form" action="actions/addpost_action.php" method="post" name="addpostevent" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 85%">
            
            <div id="error_holiday" class="alert hidden"></div>
            
            	<div class="form-group">
                    <input type="date" name="hol_date" placeholder="Date" class="form-control" id="holiday_date"></textarea>
                </div>
                    <input type="hidden" value="<?php echo $type; ?>" name="type_id" id="type_id">
                <div class="form-group">
                    <input type="text" name="holiday" placeholder="Occasion/Event" class="form-control" style="height:150px" id="occasion"></textarea>
                </div>
                
                <p align="left"><b>Attachment</b></p>
                <div class="separate">
                	
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           		
                    <input type="button" id="add_more" class="" style="float: left; margin-bottom: 10px;" value="Add More Files"/>
                </div>
               <?php if($row['type']!="admin"){ ?>
                <p align="left"><b>Post as: </b></p>
                <div class="form-group" style="float: left; margin-bottom: 10px;  position: relative;">
                    <select name="as">
                            <option value="anonymous">Anonymous</option>
                            <option value="name">Your Name</option>
                            <option value="unit">Your Department/Unit/Organization</option>
                    </select>
                </div>
               
                <?php } ?> 
              
                <div class="form-group">
                   <input type="submit" value="Post" name="submit" class="upload" onClick=""/>
                </div>
            </fieldset>
        </form>
        
	<?php }
	
	//if holiday ?>
    
    	

</body>
		 <script src="js/jquery.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <script src="js/jquery.prettyPhoto.js"></script>
        <script src="../js/script.js"></script>
        
        <script>
           $("#event").submit(function(e) {
             
               
                var event_title=$("#event_title").val();
                var event_venue=$("#event_venue").val();
                var start_time=$("#start_time").val();
                var end_time=$("#end_time").val();
                var date_start=$("#start_date").val();
                var date_end=$("#end_date").val();
                var fee_option=$("#fee_option").val();
                
    
                console.log(event_title);
                $.ajax({
                
                    url: "actions/validation_actions.php",
                    type: "GET",
                    data: { event_title:event_title, 
                            event_venue:event_venue, 
                            start_time:start_time,
                            end_time:end_time,
                            date_start:date_start,
                            date_end:date_end,
                            fee_option:fee_option, 
                            type_id:"e"  },
            
                    async: false,
                    success: function(data){
                        console.log(data);
                        if(data=="successfully posted"){
                            
                            $("#error_event").removeClass("alert-danger").addClass("alert alert-success").text(data);

                            //return;

                            
                        } else {
                            //alert(data);
                            $("#error_event").addClass("alert-danger").text(data);
                            e.preventDefault();
                            }
                        
                        
                        $("#error_event").removeClass("hidden");
                        
                        
                        }
                
                
                
                    })
                
            });

    $("#message").submit(function(e) {
             
            var msg_content=$("#msg_content").val();
           
            
            $.ajax({
                url: "actions/validation_actions.php",
                type: "GET",
                data: {msg_content:msg_content, type_id:"m"},
                async: false,
                success: function(data){
                    if(data=="successfully posted"){
                        
            
                        $("#error_message").removeClass("alert-danger").addClass("alert alert-success").text(data);
    
                    
                        
                    } else {
                        $("#error_message").addClass("alert-danger").text(data);
                         e.preventDefault();
                        }
                        
                        
                        $("#error_message").removeClass("hidden");
                    
                    }
                
                })
               
             
            });



       /*  $("#announcement").submit(function(e) {

               
                var event_title=$("#event_title").val();
                var event_venue=$("#event_venue").val();
                var event_time=$("#event_time").val();
                var date_start=$("#start_date").val();
                var type_id=$("#type_id").val();
            
    
                $.ajax({
                
                    url: "actions/validation_actions.php",
                    type: "GET",
                    data: { event_title:event_title, 
                            event_venue:event_venue, 
                            event_time:event_time,
                            date_start:date_start,
                            type_id:"a"  },
            
                    async: false,
                    success: function(data){
                        if(data=="successfully posted"){
                            
                            
                            $("#error_event").removeClass("alert-danger").addClass("alert alert-success").text(data);
                            document.forms['addpost_event'].submit();
                            
                        } else {
                            $("#error_event").addClass("alert-danger").text(data);
                              e.preventDefault();
                            }
                        
                        
                        $("#error_event").removeClass("hidden");
                        
                        
                        }
                
                
                
                    })
                
            }); */

    $("#holiday").submit(function(e) {
             
            var holiday_date=$("#holiday_date").val();
            var occasion=$("#occasion").val();
            var type_id=$("#type_id").val();
            
            $.ajax({
                url: "actions/validation_actions.php",
                type: "GET",
                data: {holiday_date:holiday_date, occasion:occasion, type_id:"h"},
                async: false,
                success: function(data){
                    if(data=="successfully posted"){
                        
            
                        $("#error_holiday").removeClass("alert-danger").addClass("alert alert-success").text(data);
    
                     
                        
                    } else {
                        $("#error_holiday").addClass("alert-danger").text(data);
                         e.preventDefault();
                        }
                        
                        
                        $("#error_holiday").removeClass("hidden");
                    
                    }
                
                })
               
                
            });

    $("#fee_option").change(function(){
        var fee_value=$("#fee_option").val();
        //alert(fee_value);
        if(fee_value=="i_fee"){
            $("#event_fee").removeClass("hidden").addClass("show");

        } else if(fee_value=="0"){
            $("#event_fee").removeClass("show").addClass("hidden");
        }

    }) 
       </script>
       
      
</html>