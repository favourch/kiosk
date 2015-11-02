<?php 
	require_once('../../db/db.php');

	 $post_ID=$_GET['post_id'];
	 echo $post_ID;
	 
	 $query_delete=mysql_query("DELETE FROM posts_t WHERE post_id='$post_ID'") or die(mysql_error());


	 header ('Location: ../manage_post.php');
?>