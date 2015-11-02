<?php 
		 require_once('../../db/db.php');
		 $img_id=$_GET['img_id'];
		 $query_delete=mysql_query("DELETE FROM images_t where img_id='$img_id'");
		
		 ?>