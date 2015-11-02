<?php
include '../../db/db.php';

$post_id=$_GET['post_id'];

$query=mysql_query("DELETE FROM image_slide_t WHERE post_id='$post_id'") or die(mysql_error());

header("location: {$_SERVER['HTTP_REFERER']}");
?>