  <?php 
  include '../../db/db.php';
  
  	//$positions=array();
			
			
			$query_position=mysql_query("SELECT * FROM position_t");
			while($row_position=mysql_fetch_assoc($query_position)){
				$position_id=$row_position['position_id'];
				$position_title=$row_position['position_title'];
				
				//echo $position_title;
				//echo $position_id;
				
				$positions["id"][]=$position_id;
				$positions["title"][]=$position_title;
				
				
			}
			
			
			echo json_encode($positions);
								