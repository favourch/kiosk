<?php 

include "../db/db.php";
include "../actions/misc_functions.php";

$sem_id = semester();
$search = $_GET['search'];
$query_personnel=mysql_query("SELECT * 
								  FROM personnel_t 
								 WHERE (f_name LIKE '%$search%'
								 	OR m_name LIKE '%$search%'
								 	OR l_name LIKE '%$search%')
								   AND personnel_id IN (SELECT faculty_id FROM class_t WHERE sem_id = '$sem_id' )
							  ") or die (mysql_error());
if(mysql_num_rows($query_personnel)<1){
?>
	<div class="search-item" style="overflow:hidden">     	
		<a href="#">
		    <img class="pull-left" src="images/default.png"  />
		    <section >No results found.</section>
		    <p> </p>
		</a>

	</div><!-- /#search-item -->

 
<?php
}
while($row_personnel=mysql_fetch_assoc($query_personnel)){
	$personnel_id=$row_personnel['personnel_id'];
	$personnel_fname=$row_personnel['f_name'];
	$personnel_mname=$row_personnel['m_name'];
	$personnel_lname=$row_personnel['l_name'];
	$personnel_image=$row_personnel['image'];
	$personnel_status=$row_personnel['academic_rank'];


    $personnel_image = ($personnel_image!="")? $personnel_image:"f3.png";
			
?>
	<div class="search-item" style="overflow:hidden">     	
		<a href="faculty-schedule.php?p_id=<?php echo $personnel_id?>">
		    <img class="pull-left" src="admin/images/personnel_image/<?php echo $personnel_image ?>"  />
		    <section ><?php echo ucfirst($personnel_fname).' '.ucfirst($personnel_mname).' '.ucfirst($personnel_lname) ?></section>
		    <p>
		        <?php echo $personnel_status;  ?>
		    </p>
		</a>

	</div><!-- /#search-item -->
<?php 
} 
?>