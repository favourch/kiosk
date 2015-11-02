<!DOCTYPE html>
<?php 

include '../db/db.php';

?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/ours.css" rel="stylesheet">
    <link href="../css/schedules.css" rel="stylesheet">
    <link href="../css/timetables.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    
     <style type="text/css">
        .post{
             background-color: rgba(255, 255, 0, 0.57);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
		
		
		.post_section {
			margin-left: auto;
			margin-right: auto;
			margin-top: 20px;
			width: 1042px;
			height: 87%;
			padding: 10px;
			overflow-y: overlay;
			transition: height 1s ease;
			
			}
		
		.post_show {
			height: 350px;
			}
		.headline {
			background-color: #CCFFCC;
            width: 309px;
            padding: 5px 10px 10px 10px;
            margin:5px;  
            word-wrap:break-word;
			display: inline-block;
			
			}
			
		.headline_section {
			margin:10px 1px 0px 25px; 
			width: 945px;
			height: 50px; 
			background-color:#FFF; 
			border:1px solid #DADADA; 
			padding: 5px;
			top: -10px;
		
			}
					
		.content {
			padding: 5px 10px 10px 10px;
			box-sizing: border-box;
			color: rgba(0,0,0,0.8);
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
			font-size: 18px;
			font-family: 'Roboto', sans-serif;
			}

        .post_column{
            
        }
        .post hr{
            margin: 0;
            border: 1px solid #9b59b6;
        }
		
		#title {
			font-weight:bold;
			font-size:20px;
			padding-bottom: 5px;
			}

        #column1 .post{
            background-color: #0099CC;
        }
        #column2 .post{
            background-color: #66CCFF;
        }
        #column3 .post{
            background-color: #003399;
        }
        
		.sidebar{
			margin:0px 10px 25px 12px;
			width: 356px; 
			padding: 10px; 
			overflow-y: overlay;
			height: 579px;
			position: relative;
			animation: fadein 2s;
			-moz-animation: fadein 2s;
			-webkit-animation: fadein 2s;
			-o-animation: fadein 2s;
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
			
		#grid[data-columns]{
			content: '4 .column.size-1of4';
			}
		
		/* These are the classes that are going to be applied: */
		.column { float: left; }
		.size-1of4 { width: 24.333% }
		
		.size {
			width: 239px;
			height: 125px;
			
			}
		.sizeof2 {
			width: 120px;
			height: 125px;
			
			
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
		
		.red {
			float:right;
			background-color:#F00; 
			width: 20px;
			height: 20px;
			margin: 0px 0px 0px 15px;
			}
		
		.yellow {
			float: left;
			background-color:#FF0; 
			width: 20px;
			height: 20px;
			margin: 0px 0px 0px 15px;
			}
			
		.btn-custom {
		  background-color: hsl(195, 79%, 43%) !important;
		  background-repeat: repeat-x;
		  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#56c5eb", endColorstr="#1798c4");
		  background-image: -khtml-gradient(linear, left top, left bottom, from(#56c5eb), to(#1798c4));
		  background-image: -moz-linear-gradient(top, #56c5eb, #1798c4);
		  background-image: -ms-linear-gradient(top, #56c5eb, #1798c4);
		  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #56c5eb), color-stop(100%, #1798c4));
		  background-image: -webkit-linear-gradient(top, #56c5eb, #1798c4);
		  background-image: -o-linear-gradient(top, #56c5eb, #1798c4);
		  background-image: linear-gradient(#56c5eb, #1798c4);
		  border-color: #1798c4 #1798c4 hsl(195, 79%, 38%);
		  color: #333 !important;
		  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
		  -webkit-font-smoothing: antialiased;
		  text-align: left;
		}
		
		.footer {
			font-style: italic;
			font-size: 14px;
			float: right;
			font-family: initial;
			
			}
		
	
    </style>
    
    
</head><!--/head-->
<body style="overflow:hidden; background: bisque;"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3><i class="icon-list" ></i> E-Bulletin</h3>
            </div>
        </div>
    </section><!--/#services-->


 
    <div class="post_section" id="viewport" style="">
    
       <div id="grid" data-columns>

            <div class="column size-1of4 ">
            <?php
			   

			if(isset($_GET['dept_id'])){
				$dept_id=$_GET['dept_id'];
				$query=mysql_query("SELECT * FROM dept_officer_t WHERE department_id='$dept_id'");
			} else if (isset($_GET['cunit_id'])) {
				$cunit_id=$_GET['cunit_id'];
				$query=mysql_query("SELECT * FROM cunit_officer_t WHERE cunit_id='$cunit_id'");
			} else if (isset($_GET['org_id'])) {
				$org_id=$_GET['org_id'];
				$query=mysql_query("SELECT * FROM org_officer_t WHERE org_id='$org_id'");
			}
				while ($row=mysql_fetch_assoc($query)) {
					$account_no=$row['account_no'];
					
					
					$query_events=mysql_query("SELECT * FROM post_events_t WHERE account_no='$account_no'");

					$count=0;
							$no_of_post=mysql_num_rows($query_events);
							$number=ceil($no_of_post/4);
					 while ($row_events=mysql_fetch_assoc($query_events)){
						   $event_id=$row_events['event_id'];
						   $event_title=$row_events['event_title'];
						   $event_venue=$row_events['venue'];
						   $time=$row_events['start_time'];
						   $date_start=$row_events['date_start'];
						   $date_end=$row_events['date_end'];
						   $theme=$row_events['theme'];
						   $reg_fee=$row_events['reg_fee'];
						   $account_no=$row_events['account_no'];
						   $time_of_post=$row_events['time_of_post'];
						   $date_of_post=$row_events['date_of_post'];
						   $identity=$row_events['identity'];
					
						$query_select_image=mysql_query("SELECT img_name FROM images_t WHERE post_id='$event_id' AND type_id='1'");
					
			   
			    ?>
             <div class="post">
           <?php
			    $num=mysql_num_rows($query_select_image);
				while($row_select_image=mysql_fetch_assoc($query_select_image)) {
			
					$image = $row_select_image['img_name'];
					 ?>
           		<?php 
				if ($num==1) { 
				?>
                <table border="0" width="100%">
                <tr>
                <td>
                        <div class="sample">
                                <img class="size" src="images/imgs_post/<?php echo $image; ?>" alt="">
                       
                        </div>
                </td>
                </tr>
                </table>
				 
                <table border="0" width="100%">
                <tr>
				<?php 
				} else if ($num == 2) { 
				?> 
                <td>
				             
						<div class="sample"><img class="sizeof2" src="images/imgs_post/<?php echo $image; ?>"></div>
              
                </td>
				<?php  }  ?>
                </tr>
                </table>
				
                 <?php if ($num==3){
				
				 $get_image[]=$image; ?>
                 <div class="" style="display:inline-flex">
                	<table border="0" width="100%" style="max-width: 100px;">
                	<tr>
                	<td>
				             
							<div class="sample"><img class="sizeof2" src="images/imgs_post/<?php echo $get_image[0]; ?>"></div>
                	</td>
                    </tr>
                	</table>
               
                	<table border="0">
               		<?php 
					while($row_select_image=mysql_fetch_assoc($query_select_image)) {
						$image = $row_select_image['img_name'];
					 ?>
                	<tr>
                         <td>
                                <div class="sample"><img class="sizeof3" src="images/imgs_post/<?php echo $image; ?>"></div>
                        </td>
                	</tr>
                  <?php 
					}  
					?>
                </table>
                </div> <!-- inline-flex -->
				<?php break; 
				 }  // num=3
		} //while row select image
				
		  ?>
                <div class="content">
                	<div id="title"><?php echo strtoupper($event_title); ?></div>
                    <hr style="" /> 
                    <b>Venue: </b><?php echo $event_venue; ?><br />
                    <?php $start_date = strtotime("$date_start");
						  $end_date = strtotime("$date_end");
						  $time_s = strtotime("$time");
					?>
                    <b>Date: </b><?php echo date("F j, Y <b>-</b>", $start_date); ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("F j, Y", $end_date); ?><br />
                    <b>Time: </b><?php echo date("g:i A", $time_s); ?><br />
                    <b>Theme: </b><?php echo $theme; ?><br />
                    <b>Fee: </b>P<?php printf('%.2f', $reg_fee); ?><br /><br />
					<span class="footer">Posted by: 
                    <?php 
					
						$query_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'");
						$row_acc=mysql_fetch_assoc($query_acc);
						$acc_type=$row_acc['type'];
						if ($acc_type=='student') {
							
							$query_student=mysql_query("SELECT * FROM student_t, org_officer_t, organization_t, position_t 
														WHERE org_officer_t.account_no='$account_no' AND 
														org_officer_t.student_id=student_t.student_id AND 
														org_officer_t.position_id=position_t.position_id AND 
														org_officer_t.org_id=organization_t.org_id");
														
							$row_student=mysql_fetch_assoc($query_student);
							$f_name=$row_student['f_name'];
							$l_name=$row_student['l_name'];
							$org_abbrev=$row_student['org_abbrev'];
							$org_name=$row_student['org_name'];
							$position_name=$row_student['position_title'];
						if ($identity == 'name') {
							echo '<b>';
							echo ucfirst($f_name).' '.ucfirst($l_name); 
							echo '</b>';
							echo '<br/>';
							echo $position_name;
							echo ', ';
							if ($org_abbrev==NULL) {
							echo '<b>';
							echo $org_name;
							echo '</b>';
								} else {
							echo '<b>';
							echo $org_abbrev;
							echo '</b>';
								}
						} // if identity
						else if ($identity=='unit') {
							if ($org_abbrev==NULL) {
							echo '<b>';
							echo $org_name;
							echo '</b>';
								} else {
							echo '<b>';
							echo $org_abbrev;
							echo '</b>';
								}
						} // unit
						else if ($identity=='anonymous') {
							echo '<b>';
							echo 'ANONYMOUS';
							echo '</b>';
								
							} // anonymous
								
						} // if acc
						else if ($acc_type=='personnel') {
							
							$query_personnel_cunit=mysql_query("SELECT * FROM personnel_t, cunit_officer_t, college_unit_t, position_t WHERE 
														  cunit_officer_t.account_no='$account_no' AND 
														  cunit_officer_t.personnel_id=personnel_t.personnel_id AND
														  cunit_officer_t.position_id=position_t.position_id AND 
														  cunit_officer_t.cunit_id=college_unit_t.cunit_id");
														  
										$num=mysql_num_rows($query_personnel_cunit);
										if ($num>0) {
												$row_personnel_cunit=mysql_fetch_assoc($query_personnel_cunit);
												$f_name=$row_personnel_cunit['f_name'];
												$l_name=$row_personnel_cunit['l_name'];
												$cunit_abbrev=$row_personnel_cunit['cunit_abbreviation'];
												$cunit_name=$row_personnel_cunit['cunit_name'];
												$position_name=$row_personnel_cunit['position_title'];
												
											if($identity=='name') {	
												echo '<b>';
												echo ucfirst($f_name).' '.ucfirst($l_name); 
												echo '</b>';
												echo '<br/>';
												echo $position_name;
												echo ', ';
												if ($cunit_abbrev==NULL) {
												echo '<b>';
												echo $cunit_name;
												echo '</b>';
													} else {
												echo '<b>';
												echo $cunit_abbrev;
												echo '</b>';
													}
											} // identity 
											else if ($identity=='unit') {
												if ($cunit_abbrev==NULL) {
												echo '<b>';
												echo $cunit_name;
												echo '</b>';
													} else {
												echo '<b>';
												echo $cunit_abbrev;
												echo '</b>';
													}
								
												} // else identity
											else if ($identity=='anonymous') {
												echo '<b>';
												echo 'ANONYMOUS';
												echo '</b>';
								
							} // anonymous
										} // num
							
							
										else {
										$query_personnel_dept=mysql_query("SELECT * FROM personnel_t, dept_officer_t, department_t, position_t WHERE 
														  dept_officer_t.account_no='$account_no' AND 
														  dept_officer_t.personnel_id=personnel_t.personnel_id AND
														  dept_officer_t.position_id=position_t.position_id AND
														  dept_officer_t.department_id=department_t.department_id");
										
										$num=mysql_num_rows($query_personnel_dept);	
													  
											$row_personnel_dept=mysql_fetch_assoc($query_personnel_dept);
											$f_name=$row_personnel_dept['f_name'];
											$l_name=$row_personnel_dept['l_name'];
											$dept_name=$row_personnel_dept['department_name'];
											$position_name=$row_personnel_dept['position_title'];					  
											
											if($identity=='name') {
												echo '<b>';
												echo ucfirst($f_name).' '.ucfirst($l_name); 
												echo '</b>';
												echo '<br/>';
												echo $position_name;
												echo ', ';
												echo '<b>';
												echo $dept_name;
												echo '</b>';
											} // identity
											else if ($identity=='unit') {
												echo '<b>';
												echo $dept_name;
												echo '</b>';
												
												} //else identity
											else if ($identity=='anonymous') {
												echo '<b>';
												echo 'ANONYMOUS';
												echo '</b>';
								
							} // anonymous
										}
						} //if personnel
				
						
						
						
					
					 ?>
                     <?php 
					 	  $date = strtotime("$date_of_post");
						  $time = strtotime("$time_of_post");
						  
					?>
                    
                     <br />
                	<?php echo date("g:i A", $time); ?>, <?php echo date("F j, Y", $date) ?></span>

                	</div> <!-- content -->
               
                </div><!-- post -->
              <?php 
			  $count++; 
			  
			   if($count==($number)){ ?>   
           		</div> <!-- column of 4 -->
                <div class="column size-1of4 ">
			   <?php 
               $count=0;
               		} //
			   } //row post
			
			   ?>
                
           
          
	<?php		
			
			$query_message=mysql_query("SELECT * FROM post_messages_t WHERE account_no = '$account_no'");
			while($row_messages=mysql_fetch_assoc($query_message)){
				   $message_id=$row_messages['message_id'];
				   $message_title=$row_messages['message_title'];
				   $message_content=$row_messages['message_content'];
				   $account_no=$row_messages['account_no'];
				   $time_of_post=$row_messages['time_of_post'];
				   $date_of_post=$row_messages['date_of_post'];
			
			
				$query_select_image=mysql_query("SELECT img_name FROM images_t WHERE post_id='$message_id' AND type_id='2'");
					
			   
			    ?>
          <div class="post">
           <?php
		    $num=mysql_num_rows($query_select_image);
	
		    while($row_select_image=mysql_fetch_assoc($query_select_image)) {
			
					$image = $row_select_image['img_name'];
					 ?>
           		<?php if ($num==1) { 
				
				?>
                <table border="0" width="100%">
                <tr><td>
                        <div class="sample">
                                     <img class="size" src="images/imgs_post/<?php echo $image; ?>" alt="">
                  
                        </div>
                </td></tr>
                </table>
				 
                <table border="0" width="100%">
                <tr>
				<?php 
				} else if ($num == 2) { 
				?> 
                <td>     
						<div class="sample"><img class="sizeof2" src="images/imgs_post/<?php echo $image; ?>"></div>
                </td>
				<?php  }  ?>
                </tr>
                </table>
				
                 <?php if ($num==3){
				
				 $get_image[]=$image; ?>
                 <div class="" style="display:inline-flex">
                            <table border="0" width="100%" style="max-width: 100px;">
                            <tr>
                            <td>         
                                <div class="sample"><img class="sizeof2" src="images/imgs_post/<?php echo $get_image[0]; ?>"></div>
                            </td>
                            </tr>
                            </table>
                           
                            <table border="0">
                            <?php 
                            while($row_select_image=mysql_fetch_assoc($query_select_image)) {
                                $image = $row_select_image['img_name'];
                                 ?>
                            <tr>
                            
                            <td>
                            	<div class="sample"><img class="sizeof3" src="images/imgs_post/<?php echo $image; ?>"></div>
                            </td>
                          
                            </tr>
                              <?php 
                            }  
                        ?>
                            </table>
                </div><!-- inline flex -->
				<?php break; 
				 } //if num=3
			} // row select_image
				
		?>
                <div class="content">
                	<div id="title"><?php echo strtoupper($message_title); ?></div>
                    <hr style="" /> 
                    	<?php echo $message_content; ?>
                    <br />    <br />
				<span class="footer">Posted by: 
                    <?php 
				
					
						$query_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'");
						$row_acc=mysql_fetch_assoc($query_acc);
						$acc_type=$row_acc['type'];
						if ($acc_type=='student') {
							
							$query_student=mysql_query("SELECT * FROM student_t, org_officer_t, organization_t, position_t 
														WHERE org_officer_t.account_no='$account_no' AND 
														org_officer_t.student_id=student_t.student_id AND 
														org_officer_t.position_id=position_t.position_id AND 
														org_officer_t.org_id=organization_t.org_id");
														
							$row_student=mysql_fetch_assoc($query_student);
							$f_name=$row_student['f_name'];
							$l_name=$row_student['l_name'];
							$org_abbrev=$row_student['org_abbrev'];
							$org_name=$row_student['org_name'];
							$position_name=$row_student['position_title'];
						if ($identity == 'name') {
							echo '<b>';
							echo ucfirst($f_name).' '.ucfirst($l_name); 
							echo '</b>';
							echo '<br/>';
							echo $position_name;
							echo ', ';
							if ($org_abbrev==NULL) {
							echo '<b>';
							echo $org_name;
							echo '</b>';
								} else {
							echo '<b>';
							echo $org_abbrev;
							echo '</b>';
								}
						} // if identity
						else if ($identity=='unit') {
							if ($org_abbrev==NULL) {
							echo '<b>';
							echo $org_name;
							echo '</b>';
								} else {
							echo '<b>';
							echo $org_abbrev;
							echo '</b>';
								}
						} // unit
						else if ($identity=='anonymous') {
							echo '<b>';
							echo 'ANONYMOUS';
							echo '</b>';
								
							} // anonymous
								
						} // if acc
						else if ($acc_type=='personnel') {
							
							$query_personnel_cunit=mysql_query("SELECT * FROM personnel_t, cunit_officer_t, college_unit_t, position_t WHERE 
														  cunit_officer_t.account_no='$account_no' AND 
														  cunit_officer_t.personnel_id=personnel_t.personnel_id AND
														  cunit_officer_t.position_id=position_t.position_id AND 
														  cunit_officer_t.cunit_id=college_unit_t.cunit_id");
														  
										$num=mysql_num_rows($query_personnel_cunit);
										if ($num>0) {
												$row_personnel_cunit=mysql_fetch_assoc($query_personnel_cunit);
												$f_name=$row_personnel_cunit['f_name'];
												$l_name=$row_personnel_cunit['l_name'];
												$cunit_abbrev=$row_personnel_cunit['cunit_abbreviation'];
												$cunit_name=$row_personnel_cunit['cunit_name'];
												$position_name=$row_personnel_cunit['position_title'];
												
											if($identity=='name') {	
												echo '<b>';
												echo ucfirst($f_name).' '.ucfirst($l_name); 
												echo '</b>';
												echo '<br/>';
												echo $position_name;
												echo ', ';
												if ($cunit_abbrev==NULL) {
												echo '<b>';
												echo $cunit_name;
												echo '</b>';
													} else {
												echo '<b>';
												echo $cunit_abbrev;
												echo '</b>';
													}
											} // identity 
											else if ($identity=='unit') {
												if ($cunit_abbrev==NULL) {
												echo '<b>';
												echo $cunit_name;
												echo '</b>';
													} else {
												echo '<b>';
												echo $cunit_abbrev;
												echo '</b>';
													}
								
												} // else identity
											else if ($identity=='anonymous') {
												echo '<b>';
												echo 'ANONYMOUS';
												echo '</b>';
								
							} // anonymous
										} // num
							
							
										else {
										$query_personnel_dept=mysql_query("SELECT * FROM personnel_t, dept_officer_t, department_t, position_t WHERE 
														  dept_officer_t.account_no='$account_no' AND 
														  dept_officer_t.personnel_id=personnel_t.personnel_id AND
														  dept_officer_t.position_id=position_t.position_id AND
														  dept_officer_t.department_id=department_t.department_id");
										
										$num=mysql_num_rows($query_personnel_dept);	
													  
											$row_personnel_dept=mysql_fetch_assoc($query_personnel_dept);
											$f_name=$row_personnel_dept['f_name'];
											$l_name=$row_personnel_dept['l_name'];
											$dept_name=$row_personnel_dept['department_name'];
											$position_name=$row_personnel_dept['position_title'];					  

											
											if($identity=='name') {
												echo '<b>';
												echo ucfirst($f_name).' '.ucfirst($l_name); 
												echo '</b>';
												echo '<br/>';
												echo $position_name;
												echo ', ';
												echo '<b>';
												echo $dept_name;
												echo '</b>';
											} // identity
											else if ($identity=='unit') {
												echo '<b>';
												echo $dept_name;
												echo '</b>';
												
												} //else identity
											else if ($identity=='anonymous') {
												echo '<b>';
												echo 'ANONYMOUS';
												echo '</b>';
								
							} // anonymous
										}
						} //if personnel

					 
					 ?>
                     <?php 
					 	  $date = strtotime("$date_of_post");
						  $time = strtotime("$time_of_post");
						  
					?>
                    
                     <br />
                	<?php echo date("g:i A", $time); ?>, <?php echo date("F j, Y", $date) ?></span>

                	</div> <!-- content -->
               
                </div><!--post -->
              <?php 
			  $count++; 
			  
			   if($count==($number)){ ?>   
           		</div> <!-- column of 4 -->
                <div class="column size-1of4 ">
			   <?php 
               $count=0;
               } //
			 } //post
			  
			   ?>
      
					   
			<?php	   
			
			   
					$select_post=mysql_query("SELECT * FROM post_t");
					
				
					$select_post=mysql_query("SELECT * FROM post_holidays_t");
					
				
			   
			  
			} // while 
	
		?>
          
            </div> <!-- grid data columns -->
           
    </div><!--post section-->
	
 
   
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script>
        function goBack(){
            window.history.go(-2);
        }
       
    </script>

</body>
</html>