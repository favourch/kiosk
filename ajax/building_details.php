<?php

$building_code = $_GET['building_code'];
include "../db/db.php";

$query_building_rooms = mysql_query("SELECT * FROM room_t WHERE building_code='{$building_code}'") or die(mysql_error());

$rooms = mysql_num_rows($query_building_rooms);

$query_building_floors =  mysql_query("SELECT * FROM room_t WHERE building_code='{$building_code}' GROUP BY floor_no") or die(mysql_error());

$floors = mysql_num_rows($query_building_floors);

$return_array = array(
	"rooms" => "$rooms",
	"floors" => "$floors"
);

echo json_encode($return_array);
?>