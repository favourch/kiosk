<?php
	
include "../db/db.php";
$value = $_GET['search'];
$query_room = mysql_query("SELECT * FROM room_t WHERE room_name LIKE '%$value%'") or die(trigger_error(mysql_error()));
$query_building = mysql_query("SELECT * FROM building_t WHERE building_name LIKE '%$value%'") or die(trigger_error(mysql_error()));

if(mysql_num_rows($query_room)>0 || mysql_num_rows($query_building)>0){
	while($row_room = mysql_fetch_assoc($query_building)){
		
		$building = strtoupper($row_room['building_code']);
		
	?>

		<li onclick="highlight('<?php echo $building ?>')">
	     	<strong style="margin:5px;font-size:16px; font-weight:200;"><?php echo $building;?></strong>
	     	<p style="margin:5px;font-size:12px;font-style:italic;color:#9a9a9a;"><?php echo "College of Science" ?></p>
	    </li>
	<?php
	}
	
	while($row_room = mysql_fetch_assoc($query_room)){
		$floor = $row_room['floor_no'];
		$building = strtoupper($row_room['building_code']);
		switch ($floor) {
			case '1':
			case 1:
				$floor = "1st Floor";
				break;
			case '2':
			case 2:
				$floor = "2nd Floor";
				break;
			case '3':
			case 3:
				$floor = "3rd Floor";
				break;
			default:
				$floor = "unknown floor";
				break;
		}
	?>

		<li onclick="highlight('<?php echo $row_room['room_code'] ?>')">
	     	<strong style="margin:5px;font-size:16px; font-weight:200;"><?php echo $row_room['room_name'];?></strong>
	     	<p style="margin:5px;font-size:12px;font-style:italic;color:#9a9a9a;"><?php echo $floor." ♦ ".$building; ?></p>
	    </li>
	<?php
	}
}
else{
?>
	<li>
     	<strong style="margin:5px;font-size:16px; font-weight:200;font-style:italic;">We can't find what you're looking for.</strong>
     	<p style="margin:5px;font-size:12px;font-style:italic;color:#9a9a9a;"></p>
    </li>
<?php
}
?>