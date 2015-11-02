<?php


include "../../db/db.php";


$query_personnel = mysql_query("SELECT * FROM `personnel_t` WHERE personnel_id IN (SELECT personnel_id FROM personnel_members_t WHERE account_no IS NULL)") or die("Error at: account_personnel_member_selection.php :: ".mysql_error());

while($row_personnel = mysql_fetch_assoc($query_personnel)){
	$personnel_id = $row_personnel['personnel_id'];
	$personnel_name = $row_personnel['f_name']." ".$row_personnel['m_name']." ".$row_personnel['l_name'];
	echo "<option value='".$personnel_id."'>";
	echo $personnel_id." - ".$personnel_name ;
	echo "</option>";
}


?>