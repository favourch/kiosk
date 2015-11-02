<?php
session_start();
unset($_SESSION['kiosk']['user_id']);
header("location: ../login.php");
?>