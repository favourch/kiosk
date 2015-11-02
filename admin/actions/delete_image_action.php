<?php
include "../../db/db.php";

$img_id=$_GET['img_id'];
$query_delete=mysql_query("DELETE FROM attachment_t WHERE attachment_id='$img_id'");


if($_GET['action']=="delete_att"){
	$att_id=$_GET['att_id'];
	$query=mysql_query("DELETE FROM attachment_t WHERE attachment_id='$att_id'");
}
?>