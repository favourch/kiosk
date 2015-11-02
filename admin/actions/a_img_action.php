<?php
include_once '../../db/db.php';
if (isset($_POST['submit'])) {
    echo "here";
	$post_id=$_POST['img'];
   
    for($i=0; $i<sizeof($post_id); $i++){
	   $query_insertimage=mysql_query("INSERT INTO image_slide_t VALUES('', '{$post_id[$i]}')") or die(mysql_error());
	}
}

if (isset($_POST['remove'])) {
    echo "here";
	$post_id=$_POST['img'];
   
    for($i=0; $i<sizeof($post_id); $i++){
	   $query_insertimage=mysql_query("DELETE FROM image_slide_t WHERE post_id='{$post_id[$i]}'") or die(mysql_error());
	}
}

header("location: ../active_images.php");
?>