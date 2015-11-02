<?php 
include '../../db/db.php';

if($_GET['action']=='disable'){
	$post_id=$_GET['post_id'];
	$query_disable=mysql_query("UPDATE posts_t SET status='disabled' WHERE post_id='$post_id'") or die(mysql_error());
	echo "successfully disabled post";

	header("location: {$_SERVER['HTTP_REFERER']}");

}

if(isset($_POST['m_delete'])){

			$name=$_POST['d_post'];
	for($i=0; $i<sizeof($name); $i++){
			$query_delete=mysql_query("DELETE FROM posts_t WHERE post_id={$name[$i]}");
			echo "{$name[$i]}";
			}
		header("location: {$_SERVER['HTTP_REFERER']}");
}

if(isset($_POST['m_disable'])){

	$name=$_POST['dis_post'];
	for($i=0; $i<sizeof($name); $i++){
			$query_disable=mysql_query("UPDATE posts_t SET status='disabled' WHERE post_id={$name[$i]}") or die(mysql_error());
			echo "{$name[$i]}";
			}
		header("location: {$_SERVER['HTTP_REFERER']}");
}

if($_GET['action']=='enable'){
	$post_id=$_GET['post_id'];
	$query_enable=mysql_query("UPDATE posts_t SET status='active' WHERE post_id='$post_id'") or die(mysql_error());
	echo "successfully enabled post";

	header("location: {$_SERVER['HTTP_REFERER']}");

}

?>