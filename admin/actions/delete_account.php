<?php
    $account_no = $_GET['account_no'];

    include "../../db/db.php";

    //disable account ; not actually deleting it from the database...
    mysql_query("UPDATE account_t SET status='0' WHERE account_no='{$account_no}'") or die(mysql_error());

    mysql_query("UPDATE student_members_t set account_no=NULL WHERE account_no=$account_no") or die("Error at delete_account.php : line 9 :: ".mysql_error());
    mysql_query("UPDATE personnel_members_t set account_no=NULL WHERE account_no=$account_no") or die("Error at delete_account.php : line 10 :: ".mysql_error());

    header("location: {$_SERVER['HTTP_REFERER']}");
?>