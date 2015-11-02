<?php
session_start();
//session_destroy();
unset($_SESSION['kiosk']['student_id']);


header("location: ../index.php#lock");

?>