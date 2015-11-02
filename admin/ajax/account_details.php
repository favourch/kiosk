<?php

$account_no = $_GET['account_no'];

include "../../db/db.php";


$query_account = mysql_query("SELECT * FROM account_t WHERE account_no={$account_no}") or die(mysql_error());
$row_account = mysql_fetch_assoc($query_account);

$account_type = $row_account['type'];

$priv_1 = $row_account['priv_admin'];
$priv_2 = $row_account['priv_bull'];
$priv_3 = $row_account['priv_cms1'];
$priv_4 = $row_account['priv_cms2'];
$priv_5 = $row_account['priv_cms3'];
$priv_6 = $row_account['priv_ois1'];
$priv_7 = $row_account['priv_ois2'];



$name = "";
$id = "";


if($account_type=="student"){
	$query_student = mysql_query("SELECT * FROM student_t, student_members_t WHERE student_t.student_id = student_members_t.student_id AND student_members_t.account_no='$account_no'") or die("Error at accout_details.php : line 19 :: ".mysql_error());
	$row_student = mysql_fetch_assoc($query_student);
	$id = $row_student['student_id'];
	$name = $row_student['f_name']." ".$row_student['m_name']." ".$row_student['l_name'];

}
elseif($account_type=="personnel"){
	$query_personnel = mysql_query("SELECT * FROM personnel_t, personnel_members_t WHERE personnel_t.personnel_id = personnel_members_t.personnel_id AND personnel_members_t.account_no='$account_no'") or die("Error at accout_details.php : line 19 :: ".mysql_error());
	$row_personnel = mysql_fetch_assoc($query_personnel);
	$id = $row_personnel['personnel_id'];
	$name = $row_personnel['f_name']." ".$row_personnel['m_name']." ".$row_personnel['l_name'];
}
else{

}

//$query_org   = mysql_query("SELECT * FROM `org_officer_t`, `student_t` WHERE student_t.student_id = org_officer_t.student_id AND org_officer_t.account_no={$account_no}") or die("Error at accout_details.php : line 11 :: ".mysql_error());
//$query_dept  = mysql_query("SELECT * FROM `dept_officer_t`, `personnel_t` WHERE personnel_t.personnel_id = dept_officer_t.personnel_id AND dept_officer_t.account_no={$account_no}") or die("Error at accout_details.php : line 12 :: ".mysql_error());
//$query_cunit = mysql_query("SELECT * FROM `cunit_officer_t`, `personnel_t` WHERE personnel_t.personnel_id = cunit_officer_t.personnel_id AND cunit_officer_t.account_no={$account_no}") or die("Error at accout_details.php : line 13 :: ".mysql_error());




$row_account['id'] = $id;
$row_account['name'] = $name;

echo json_encode($row_account);
?>