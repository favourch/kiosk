<?php 
	require_once('../../db/db.php');
	session_start();
	include "misc_functions.php";
	
	$type = getABC();
	echo $type;

	
	 $post_ID=$_GET['post_id'];
	
	
		 $query_delete=mysql_query("DELETE FROM posts_t WHERE post_id='$post_ID'") or die(mysql_error());
	
	if($type=='personnel') {
		echo $type;
	 	header ('Location: ../faculty_managepost.php');
	 } else if($type=='student'){
		header ('Location: ../faculty_managepost.php');
	}
	 else if($type=='admin'){
		header ('Location: ../admin_managepost.php');
		 
	 }
	
?>