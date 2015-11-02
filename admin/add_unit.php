<!DOCTYPE html>

<?php
include '../db/db.php';
session_start();
if(isset($_SESSION['kiosk']['user_id'])){


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
	if(empty($_GET['unit_id'])){
	?>
		<form class="center" role="form" action="actions/manage_position.php" method="post" id="addpost_event" name="addpost_event" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 85%">
             <div id="error_event" class="alert hidden"></div>
            	<div class="form-group">
                    <input type="text" name="unit_name" placeholder="Unit Name" class="form-control" id="unit_name">
                </div>
               
                    <div class="form-group">
                        <input type="text" name="abbrev" placeholder="Abbreviation (If any)" class="form-control" id="abbrev">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="unit_type">
                        	<option value="department">by department</option>
                            <option value="course">by course</option>
                            <option value="college">by college</option>
                        </select>
                    </div>
                    
           	<input type="submit" value="Add" name="submit" class="upload"/>

                <hr />
         <?php } else if(isset($_GET['unit_id'])) { 
		 $unit_id=$_GET['unit_id'];
		 $query_select=mysql_query("SELECT * FROM unit_t WHERE unit_id='$unit_id'");
		 while($row_select=mysql_fetch_assoc($query_select)){
		 	$unit_name=$row_select['unit_name'];
			$unit_abbrev=$row_select['unit_abbrev'];
			$unit_type=$row_select['type'];
		 
		 ?>
         <form class="center" role="form" action="actions/manage_position.php" method="post" id="addpost_event" name="addpost_event" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 85%">
             <div id="error_event" class="alert hidden"></div>
            	<div class="form-group">
                    <input type="text" name="unit_name" value="<?php echo $unit_name; ?>" class="form-control" id="unit_name">
                </div>
               	   <input type="hidden" name="unit_id" value="<?php echo $unit_id; ?>" class="form-control" id="unit_id">
                    <div class="form-group">
                    <input type="text" name="abbrev" value="<?php echo $unit_abbrev ?>" class="form-control" id="abbrev">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="unit_type">
                        	<option value="department">by department</option>
                            <option value="course">by course</option>
                            <option value="college">by college</option>
                        </select>
                    </div>
                    
           		<input type="submit" value="Update" name="update" class="upload"/>

              
        </form>
         <?php } 
		}
		  ?>
               
	
    	

</body>
		 <script src="js/jquery.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <script src="js/jquery.prettyPhoto.js"></script>
         <script src="../js/script.js"></script>
		   <script>
		   
		   		var icon_count=1;
				var table_count=1;
				var unit_count=1;
				var member_count=1;
				var check_count=1;
				var minus_count=1;
				var unit_iden=<?php echo $unit_id ?>;
				//alert (unit_id);
				
           		function add(){
				
		
							
							var sample='<table id="table'+ table_count +'">'+
								'<tr>' +
								'<td style="width: 215px;">' +
								'<div class="form-group" style="margin:0px">'+
									
										'<input class="form-control" type="text" name="position" id="unit_type'+ unit_count +'">'+
								'</div>'+
							 '</td>'+
							 '<td style="width:144px">'+
								 '<div class="form-group" style="margin:0px">'+
									 '<select class="form-control" name="member_type" id="member_type'+ member_count +'">'+
										
											'<option value="student">student</option>'+
											'<option value="personnel">personnel</option>'+
										'</select>'+
								'</div>'+
								'</td>'+
							 '<td>'+
							    '<a onClick="minus(\'minus'+icon_count+'\', \'member_type'+member_count+'\', \'unit_type'+ unit_count +'\')"> <i id="minus'+ icon_count +'" class="icon-minus-sign" style="font-size:25px"></i></a>'+
                        	'</td>'+
							'</tr>'+
							'</table>';
							
						
							
								
								
							//console.log(option+''+u_id);
							
							
							var unit_id='#unit_type'+(unit_count);
							var member_id='#member_type'+(member_count);
							

							icon_count++;
							table_count++;
							unit_count++;
							member_count++;
							check_count++;
							minus_count++;
							console.log(unit_id, member_id);
							//$(id).addClass('hidden');
							//$(minus_id).removeClass("hidden");
							//$(check_id).removeClass("hidden");
							$("#fields").append(sample);
							
						
							
						
									
				
				}
				
	
			
	
				
			function minus(id, member_id, position_id){
				var position_ID='#'+position_id;
				var member_type='#'+member_id;
				var minus_id='#'+id;


				$(position_ID).remove();
				$(member_type).remove();
				$(minus_id).remove();		
				
					
				//alert(id);
				
			}
			
		/*	function check(unit_id, member_id, check_id, minus_id){
				var unit_ID='#'+(unit_id);	
				var member_ID='#'+(member_id);	
				var check_ID='#'+(check_id);
				var minus_ID='#'+(minus_id);
				//var unit_id=unit_id;
				//alert(unit_id);
				
				
				var unit_value=$(unit_ID).val();
				var member_value=$(member_ID).val();
				//alert(unit_iden);
				//alert (unit_value+''+member_value)
				$.ajax({	
					url: "actions/manage_position.php",
					type: "GET",
					data: {unit_value:unit_value, member_value:member_value, unit_iden:unit_iden, action: "add"},
					async: false,
					success: function(data){
					//alert ("-"+data+"-");
						if(data=="success"){
							alert ("-"+data+"-");
							$(unit_ID).prop( "disabled", true );
							$(member_ID).prop( "disabled", true );
							$("#add_button").removeAttr("disabled");
							$(check_ID).addClass("hidden");
							$(minus_ID).removeClass("hidden").addClass("show");
							//alert ("amo");
						} else {
							//alert(data);
							//console.log(data);
							$("#warning").text(data).removeClass("hidden");
							
							}
					}
					
					});
				
				
			} */
			
			function ok(){
				//alert(unit_count);

				var i;

				for(i=1;i<unit_count;i++){
					var position_ID='#unit_type'+i;
					var member_type='#member_type'+i;

					position=$(position_ID).val();
					member_type=$(member_type).val();
					console.log(position, member_type);
					
					
					$.ajax({
						url: "actions/manage_position.php",
						method: "GET",
						data: {position:position, member_type:member_type, unit_iden:unit_iden, action:"ok"},
						async: false,
						success: function(data){
							alert(data);

						}

					})

				}

				
				
				//alert("success");
				
				//window.close();
				
				}
			
           </script>
       
      
</html>