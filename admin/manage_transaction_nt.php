<!DOCTYPE html>
<?php session_start(); 
if(isset($_SESSION['kiosk']['user_id'])){
  $account_no=$_SESSION['kiosk']['user_id'];

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
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
   <style>
	
		.size {
			width: 80px; 
			height: 80px;
		}
		
		.sample>.s {
		display: none;	
		}
		
		.sample>.active{
			display: block;
		}
		
	</style>

</head><!--/head-->
<body>


	<?php include "../db/db.php"; ?>
    <!-- to display navbar -->
    <?php include "admin_navbar.php"; ?>
    <!-- to display left pane -->
    <?php $active_page="unit_management" ?>
    <?php include "admin_left_pane.php";?>

    <section id="" class="torquiose peter-river" style="padding:0;">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->
    
     <?php
		
		$unit_id=$_GET['unit_id'];
		$query=mysql_query("SELECT * FROM unit_t WHERE unit_id='$unit_id'");
		$row=mysql_fetch_assoc($query);
		$unit_name=$row['unit_name'];
				
						 ?>
    
    

  <section style="padding-bottom:0; padding-top:20px; height:90%">
        <div id="panel" style="width: 79%;
                                margin-left: 266px;
                                border: 1px solid #dadada;
                                border-radius: 4px;
                                height: 100%;
                                background-color: #fafafa;
                                padding-top: 20px;">
            <div class="container">

                <div class="" style="height: 74px;">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3 style="margin: 0px;"><?php 
						
							echo $unit_name; 
						
						?></h3>
            <a class="btn btn-info" href="position_list.php?unit_id=<?php echo $unit_id; ?>" style="position:absolute; margin-top: -30px; margin-left: 890px;"><i class="icon-list"></i> Positions</a>
                      </div>
                    </div>
                </div>
                <div class="col-md-6" style="height:300px; padding: 0px 10px 0px 0px; margin:0  auto; float:none;">
                    <div class="panel panel-default" style="width:100%">
                      <div class="panel-heading" style="line-height: 33px;">List of Members
                      
                      <div style="float:right">
                      <a class="btn btn-default" data-toggle="modal" href="#edit_officer<?php echo $unit_id ?>"><i class="icon-plus"></i> Add</a>
                      </div>
      
                      </div>
                      
                      <div class="panel-body" style="max-height: 100%;">
                        
                         
                        <?php
					     $count_p=0;
                $count_s=0;
						  $query_trans=mysql_query("SELECT * FROM member_t where unit_id='$unit_id'") or die (mysql_error());
						  if(mysql_num_rows($query_trans) != 0) {
							  while($row_trans=mysql_fetch_assoc($query_trans)) { 
								  $member_id=$row_trans['member_id'];
                  				  $member_type=$row_trans['member_type'];
									if($row_trans['member_type']=='personnel'){
										$query_member=mysql_query("SELECT * FROM personnel_members_t, personnel_t, member_t, position_t WHERE personnel_members_t.member_id=member_t.member_id 
                                              AND member_t.position_id=position_t.position_id AND personnel_members_t.member_id='$member_id' 
                                              AND personnel_members_t.personnel_id=personnel_t.personnel_id");
									
									
                    	while($row_member=mysql_fetch_assoc($query_member)){
                    		$pm_id=$row_member['pm_id'];
												$personnel_id=$row_member['personnel_id'];
                       	$position_name=$row_member['position_name'];
												$fname=$row_member['f_name'];
												$lname=$row_member['l_name'];
												$full_name =$fname.' '. $lname; ?>
												
											  	<tr>
					<form method="POST" action="actions/manage_position.php" style="padding: 0px; box-shadow: none">
						  <input type="hidden" name="pm_id" value="<?php echo $pm_id ?>">
						
						  <li class="list-group-item container" style="width:100%;">
                        <div style="float:left;">
                          <strong id="officer<?php echo $count_p ?>"><?php echo $full_name  ?></strong><br />
                          <p style="margin-bottom: 0px; font-size: 12px;"><?php echo $position_name ?></p>
                          </div>
                          <a style="float:right;" class="btn btn-default btn-xs" id="edit<?php echo $count_p ?>" onclick="edit_officer('<?php echo $personnel_id ?>','<?php echo $count_p ?>')"><i class="icon-pencil"></i> Edit</a>
                          <input style="float:right;" type="submit" name="ok_edit" class="btn btn-success btn-xs hidden" id="ok<?php echo $count_p ?>" value="OK" />
                          <a style="float:right;" class="btn btn-danger btn-xs" href="actions/manage_position.php?action=delete_officer&&pm_id=<?php echo $pm_id ?>" onclick="return confirm('Are you sure you want to delete this officer?')"><i class="icon-trash"></i> Delete</a>
                          </li>
                    </form>
 
												</tr>
                                                
                                                
                                                
                    <?php $count_p++;
                                 }
									} else if ($row_trans['member_type']=='student'){
                   
										$query_member=mysql_query("SELECT * FROM student_members_t, student_t, member_t, position_t WHERE student_members_t.member_id=member_t.member_id 
                                               AND member_t.position_id=position_t.position_id AND student_members_t.member_id='$member_id' 
                                               AND student_members_t.student_id=student_t.student_id") or die(mysql_error());
									
											while($row_member=mysql_fetch_assoc($query_member)){
                        $sm_id=$row_member['sm_id'];
												$student_id=$row_member['student_id'];
                        $position_name=$row_member['position_name'];
												$fname=$row_member['f_name'];
												$lname=$row_member['l_name'];
												$full_name =$fname.' '. $lname; ?>
												
												<tr>
                  <form method="POST" action="actions/manage_position.php" style="padding: 0px; box-shadow: none">
                       <input type="hidden" name="sm_id" value="<?php echo $sm_id ?>">

						            <li class="list-group-item"><strong id="officer_s<?php echo $count_s ?>"><?php echo $full_name  ?></strong><br />
                          <p style="margin-bottom: 0px; font-size: 12px;"><?php echo $position_name ?></p>
                          <a class="btn btn-default btn-xs" id="edit_s<?php echo $count_s ?>" onclick="edit_s_officer('<?php echo $student_id ?>','<?php echo $count_s ?>')"><i class="icon-pencil"></i> Edit</a>
                          <input type="submit" name="ok_edit_s" class="btn btn-success btn-xs hidden" id="ok_s<?php echo $count_s ?>" value="OK" />
                          <a class="btn btn-danger btn-xs"><i class="icon-trash"></i> Delete</a>
                          </li>
                      </form>
												</tr>


								<?php
                     $count_s++;
                 } ?>
                      
                       
                          <?php 		}		
									}
								
						} ?>
 <div id="edit_officer<?php echo $unit_id; ?>" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
    <div class="modal-dialog" style="width: 50%; height: 640px; margin-top: 32px;"> <!--modified-->
        
        <div class="modal-content " style="height: 85%; width: 92%;">  <!--modified-->
            <div style="width:2%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
            </div>
            <div class="modal-" style="height: 100%; display: inline-block; padding: 20px; overflow-y: auto;" > <!--modified-->
               <div class="modal-body" style="width: 555px;">
                
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 id="post_title">Set Officer</h4>
                        <hr>
                
         <form class="center" style="padding: 0px; padding: 0px; box-shadow: none" role="form" action="actions/manage_position.php" method="post" id="addpost_event" name="addpost_event" enctype="multipart/form-data" >
            <fieldset class="registration-form" style="width: 100%; padding: 0px;">
             <div id="error_event" class="alert hidden"></div>
               <div style="" id="fields">
          
              
                </div> 
                <br /> 
                <div class="alert-warning form-control hidden" id="warning"><i class="icon-warning-sign"></i> </div>
              
                <br />
                <center>  
                   <a class="btn btn-info" onClick="add()" id="add_button"> <i class="icon-plus" style="font-size:15px"></i> Add</a>
                </center>
                <br />
                <br />
                <br />
                     <a class="btn btn-info upload" onClick="ok_insert()"> OK</a>

                <div class="form-group">
                </div>
          
            </fieldset>
        </form>
  


       
                <div class="modal-footer">
              <input type="submit" class="btn btn-info" value="Save" name="submit" />
          <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
        </div>
    </form>
          
                 </div> <!-- modal body -->
                                               	
                </div><!-- modal -->
                    
    		
            </div><!-- modal content -->
          </div><!-- modal  dialog-->
        </div><!-- edit officer_modal -->
                        
                            
           
                      </div>
                    </div>
                </div><!-- /#panel -->
                
                
               
            </div>
        </div>     
    </section>
    
    
    
    
      <!-- modal add trans -->
        <div id="add_trans" class="modal fade " style=" overflow-y:hidden;" ><!--modified-->
                            <div class="modal-dialog" style="width: 533px; height: 640px; margin-top: 32px;"> <!--modified-->
                                
                                <div class="modal-content " style="height: 51%; width: 92%;">  <!--modified-->
                                    <div style="width:2%; height:100%; background-color:#9F74A0; float:left;"> <!--modified-->
                                    </div>
                                    <div class="modal-" style="height: 100%; display: inline-block; padding: 20px;" > <!--modified-->
                                       <div class="modal-body" style="width: 420px;">
                                        
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 id="post_title">Add Service</h4>
                     						 	<hr>
                                               <form action="actions/addEdit_trans_action.php" method="post">
                                               		<input type="hidden" value="<?php echo $unit_id ?>" name="unit_id" />
                                                    
													
                                                    <div class="form-group">
                                                       <textarea style="width: 100%; height: 100%;" name="trans_name" placeholder="Service Title"></textarea>
                                                    </div>
                                              
                                          
                                        </div>
                                        <div class="modal-footer">
                                          <input type="submit" class="btn btn-info" value="ADD" name="add" />
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"> CLOSE</button>
                                        </div>
                                         </form>
                                    </div>
                                        
                        
                                </div>
                            </div>
                            </div>
                            
                            
    <?php
	function name($unit_id){
		
		  $query_student=mysql_query("SELECT * FROM course_unit_t, student_registration_t, student_t WHERE course_unit_t.org_id='$unit_id' AND 
													course_unit_t.course_code=student_registration_t.course_code AND student_registration_t.student_id=student_t.student_id") or die (mysql_error());
						  if(mysql_num_rows($query_student) != 0) {
							  	$students["id"]=array();
								$students["name"]=array();
							  	while($row_student=mysql_fetch_assoc($query_student)) { 
							
												$student_id=$row_student['student_id'];
												$fname=$row_student['f_name'];
												$lname=$row_student['l_name'];
												$full_name =$fname.' '. $lname; 
                                
								
                      			$students["id"][]=$student_id;
								$students["name"][]=$full_name;
								}
								return $students;
						  }
			
		}
	


	 ?>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
   <script>

   
        function goBack(){
            window.history.go(-2);
        }
       
       
      $("#edit").click(function(){
      //alert("adi");
          $("#registrar").addClass("hidden")

    })
   

        var icon_count=1;
        var table_count=1;
        var unit_count=1;
        var member_count=1;
        var check_count=1;
        var minus_count=1;
        var unit_iden=<?php echo $unit_id ?>;
        var member_type="<?php echo $member_type ?>";

      
            
        function add(){
              
              var sample='<table id="table'+ table_count +'">'+
                '<tr>' +
                '<td style="width: 215px;">' +
                '<div class="form-group" style="margin:0px">'+
                   '<select class="form-control" onchange="change('+ table_count +')" style="width: 240px" name="unit_type" id="unit_type'+ unit_count +'">'+
                        
                    '</select>'+
                '</div>'+
               '</td>'+
               '<td style="width:144px">'+
                 '<div class="form-group" style="margin:0px">'+
                   '<select class="form-control" style="width: 265px" name="member_type" id="member_type'+ member_count +'">'+
                        
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
              

             
              //$(id).addClass('hidden');
              //$(minus_id).removeClass("hidden");
              //$(check_id).removeClass("hidden");
              $("#fields").append(sample);
              
            
              $.ajax({
                url: "actions/manage_position.php",
                method: "GET",
                data: {unit_ID:unit_iden, action:"set_position"},
                async: false,
                success: function(data){

                      //console.log(data);
                      $("#unit_type"+unit_count).html(data);
                      //alert(unit_count);
                  }

              })
              $.ajax({
                url: "actions/manage_position.php",
                method: "GET",
                data: {u_ID:unit_iden, m_type:member_type, action:"set_names"},
                async: false,
                success: function(data){

                      //console.log(data);
                      $("#member_type"+member_count).html(data);
                      //alert(unit_count);
                  }

              })
                  
              icon_count++;
              table_count++;
              unit_count++;
              member_count++;
              check_count++;
              minus_count++;
              console.log(unit_id, member_id);
        }
        

        function ok_insert(){
        //alert(unit_count);

        var i;

        for(i=1;i<unit_count;i++){

          var position_ID='#unit_type'+i;
          var member_name='#member_type'+i;

          position=$(position_ID).val();
          member_name=$(member_name).val();
          console.log(position, member_name);
          

          $.ajax({
            url: "actions/manage_position.php",
            method: "GET",
            data: {position_ID:position, member_ID:member_name, UNIT_id:unit_iden, action:"ok_setmembers"},
            async: false,
            success: function(data){
              alert(data);

            }

          })

        }
        
        //alert("success");
        
        //window.close();
        
        }

    function change(count){
        //alert(count);
        var position_value=$("#unit_type"+count).val();

        //alert(position_value);
        $.ajax({
            url: "actions/manage_position.php",
            method: "GET",
            data: {p_ID:position_value, action:"onchange"},
            async: false,
            success: function(data){
              $("#member_type"+count).html(data);

            }

          })
    }

    function edit_officer(personnel_id, count){
    	//alert(personnel_id);
    	$.ajax({
    		url: "actions/manage_position.php",
    		method: "GET",
    		data: {personnel_id:personnel_id, action:"edit_officer"},
    		async: false,
    		success: function(data){
    				//alert(data);
    				$("#officer"+count).html(data);
    				$("#edit"+count).addClass("hidden");
    				$("#ok"+count).removeClass("hidden");
    		}

    	})
    }

    function edit_s_officer(student_id, count){
      //alert(personnel_id);
        
      $.ajax({
        url: "actions/manage_position.php",
        method: "GET",
        data: {student_id:student_id, action:"edit_s_officer"},
        async: false,
        success: function(data){
            //alert(data);
            $("#officer_s"+count).html(data);

            $("#edit_s"+count).addClass("hidden");
            $("#ok_s"+count).removeClass("hidden");
        }

      })
    }
      

   </script>
    
    
  
</body>
</html>