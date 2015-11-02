<!DOCTYPE html>
<?php
session_start();
$unit_id=$_GET['unit_id'];
if(isset($_SESSION['kiosk']['user_id'])){
  $account_no=$_SESSION['kiosk']['user_id'];

}
else{

    header("location: login.php");
}
//echo $user_id;
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

    <section id="banner" class="" style="padding:0;">
         <div class="panel-menu-item" style="">
              <a href="#" class="menu-toggle" style="color:white;">
              <span class="glyphicon glyphicon-list-alt" > </span> Admin Panel
              </a>
        </div>
    </section><!--/#services-->

    <section style="padding: 25px;">
                <!-- Nav tabs -->
            
                 <div class="panel panel-default" style="width: 925px;
                                                        margin: 0 auto;
                                                        margin-right: 67px;
                                                        border: 1px solid #dadada;
                                                        border-radius: 4px;
                                                        height: 100%;">
                                                        
                      <div class="panel-heading" style="line-height: 33px;">Positions
                      
                      <div style="float:right">
                      		<a class="btn btn-default" onclick="window.open('add_position.php?unit_id=<?php echo $unit_id ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=700, height=612,position=center')"><i class="icon-plus"></i> Add</a>
                      </div>
      
                      </div>
                      
                      <div class="panel-body" style="max-height: 100%;">
         <form action="actions/manage_position.php" method="POST">
					  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout:fixed">
                      <colgroup>
                            <col width="4">
                            <col width="30">
                            <col width="40">
                             <col width="10">
                            <col width="16">

                      </colgroup>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Position Name</th>
                                <th>Position Description</th>
                                <th>Type</th>
                                <th>Action</th>
                               
                                
                            </tr>
                        </thead>
                      
        <?php
         $unit_id=$_GET['unit_id'];
         $count=0;
         $query_unit=mysql_query("SELECT * FROM member_t, position_t WHERE member_t.unit_id='$unit_id' AND member_t.position_id=position_t.position_id");
         while($row_unit=mysql_fetch_assoc($query_unit)){
              $position_id=$row_unit['position_id'];
              $position_name=$row_unit['position_name'];
              $member_id=$row_unit['member_id'];
              $member_type=$row_unit['member_type'];
              $position_desc=$row_unit['position_description'];
        
              $position_desc=($position_desc!="")? $position_desc:"N/A";
          ?>
        
					<tbody>
						<tr>
                     	      <td align="center"><input type="checkbox" name="name[]" value="<?php echo $position_id; ?>"> </td>
                            <td id="position_name<?php echo $count ?>"><?php echo $position_name; ?></td>
                            <td id="position_desc<?php echo $count ?>"><?php echo $position_desc ?></td>
                             <td id="position_desc<?php echo $count ?>"><?php echo $row_unit['quantity'] ?></td>
							
                			<td>
                               
                                <a id="edit<?php echo $count; ?>" onclick="edit_position(<?php echo $count; ?>,<?php echo $position_id ?>)" class="btn btn-info btn-xs"><i class="icon-edit"></i> Edit</a>
                                <a href="" id="ok<?php echo $count ?>" onclick="update(<?php echo $count; ?>,<?php echo $position_id ?>)" class="btn btn-success btn-xs hidden"><i class="icon-edit"></i> OK</a>
                                <a class="btn btn-danger btn-xs" href="actions/manage_position.php?position_id=<?php echo $position_id; ?>&&toDo='delete_position'&&u_id=<?php echo $unit_id ?>" onClick="return confirm('Are you sure you want to delete this post?')"><i class="icon-trash"></i> Delete</a>
                			</td>

						   
				
				 <?php
          $count++;
          }  //post_events_query  ?>
   				
	 	</tr>
 
     </tbody>
   </table>		
   		  <center><input type="submit" class="btn btn-success" value="Delete" name="multi_delete" onClick="return confirm('Are you sure you want to delete this?')"></center>
  </form>
   			</div>  	
        </div><!-- /#panel -->
    </section>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
   
      function edit_position(count, position_id){
            var position_name = $("#position_name"+count).html();
            var position_desc = $("#position_desc"+count).html();

            //alert(position_name);
            var input_name='<input type="text" id="p_name'+count+'" value="'+position_name+'" class="form-control" />';
            var input_desc='<input type="text" id="p_desc'+count+'" value="'+position_desc+'" class="form-control" />';
      
            $("#position_name"+count).html(input_name);
            $("#position_desc"+count).html(input_desc);

            $("#edit"+count).addClass("hidden");
            $("#ok"+count).removeClass("hidden");
            //$("#th_ok").removeClass("hidden");
            //$("#update"+count).removeClass("hidden");
      }
  
   
        function update(count, position_id){
          var position_name=$("#p_name"+count).val();
          var position_desc=$("#p_desc"+count).val();

            $.ajax({
                url: "actions/manage_position.php",
                method: "GET",
                data: {p_name:position_name, p_desc:position_desc, position_id:position_id, action: "update"},
                async: false,
                success: function(){

                    alert(data);
                }

            })

        }

        function goBack(){
            window.history.go(-2);
        }
       
 
   
   </script>
   
   
  

</body>
</html>