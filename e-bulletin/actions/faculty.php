<!-- php for faculty dropdown -->
<?php include "../../db/db.php"; ?>


		<select>
             <?php $query_faculty=mysql_query("SELECT * FROM personnel_t"); 
					while($row_faculty=mysql_fetch_assoc($query_faculty)){
						$fname=$row_faculty['f_name'];
						$lname=$row_faculty['l_name'];
						$full_name=ucfirst($fname).' '.ucfirst($lname);
						
			?>
            	<option><?php echo $full_name; ?>
           <?php } ?>
            </select> 
