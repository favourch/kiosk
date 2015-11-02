<?php

include "../../db/db.php";

$query_member = mysql_query("SELECT * FROM dept_officer_t") or die(mysql_error());
while($row_member = mysql_fetch_assoc($query_member)){
	echo "<option value='".$row_member['personnel_id']."'>";
	echo $row_member['personnel_id'];
	echo "</option>";
}

?>