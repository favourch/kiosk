<?php
include '../../db/db.php';

if (isset($_POST['add'])) {
	$trans_name=mysql_real_escape_string($_POST['trans_name']);
	$unit_id=$_POST['unit_id'];
	$query_add=mysql_query("INSERT INTO service_t VALUES ('', '$unit_id', '$trans_name', null)") or die(mysql_error());
	
	header ("Location: ../manage_transaction.php?unit_id=$unit_id");
}


if (isset($_POST['edit'])) {
	
	$trans_name=mysql_real_escape_string($_POST['trans_name']);
	$trans_id=$_POST['trans_id'];
	$unit_id=$_POST['unit_id'];
	$query_edit=mysql_query("UPDATE service_t SET service_title='$trans_name' WHERE unit_id='$unit_id' AND service_id=$trans_id") or die(mysql_error());
	
	header ("Location: ../manage_transaction.php?unit_id=$unit_id");
	}
	
if (isset($_GET['action'])=='delete'){
	echo "dgdi";
	$unit_id=$_GET['unit_id'];
	$service_id=$_GET['service_id'];
	$query_delete=mysql_query("DELETE FROM service_t WHERE service_id='$service_id' AND unit_id='$unit_id'");
	
	header ("Location: ../manage_transaction.php?unit_id=$unit_id");

	
	}
	
if (isset($_POST['update_procedures'])) {
	$service_id=$_POST['service_id'];
	$image_name=$_FILES["image"]["name"];
	if($_FILES["image"]["size"]<10000000000000){
		if(move_uploaded_file($_FILES['image']['tmp_name'], '../images/transaction_flow_imgs/'.$image_name)){
			$query_edit=mysql_query("UPDATE service_t SET transaction_flow='$image_name' WHERE service_id='$service_id'") or die(mysql_error());
		}

	header ("Location: ../manage_procedure.php?trans_id=$service_id");
	}


	}
	


?>
