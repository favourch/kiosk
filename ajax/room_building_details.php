<?php

$room_code = $_GET['room_code'];
include "../db/db.php";

$query_room = mysql_query("SELECT * FROM room_t WHERE room_code='{$room_code}'") or die(mysql_error());
$row_room = mysql_fetch_assoc($query_room);

$building_code = $row_room['building_code'];
$floor_no = $row_room['floor_no'];

$return_array = array(
	"building_code" => "$building_code",
	"floor_no" => "$floor_no"
);

echo json_encode($return_array);
?>