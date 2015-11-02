<?php
    $personnel_id = $_GET['personnel_id'];

    include "../../db/db.php";

    mysql_query("DELETE FROM personnel_t WHERE personnel_id='{$personnel_id}'") or die(mysql_error());
    echo "Success";
    //header("location: {$_SERVER['HTTP_REFERER']}");
?>