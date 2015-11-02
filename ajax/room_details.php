<?php

$room_code = $_GET['room_code'];
include "../db/db.php";

$query_room = mysql_query("SELECT * FROM room_t WHERE room_code='{$room_code}'") or die(mysql_error());
$row_room = mysql_fetch_assoc($query_room);


/*
$return_array = array(
	"room_name" => "$room_name",
	"floor" => "$floor"
);
*/
echo json_encode($row_room);
?>