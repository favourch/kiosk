<?php
session_start();
//session_destroy();
unset($_SESSION['kiosk']['student_id']);


header("location: {$_SERVER['HTTP_REFERER']}");

?>