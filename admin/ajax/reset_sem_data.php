<?php
include "../../db/db.php";

$sem_id = $_GET['sem_id'];
if($sem_id!=0){


mysqli_query($db_con, "DELETE FROM student_block_t WHERE sem_id='$sem_id'") or die(trigger_error(mysqli_error($db_con)));
mysqli_query($db_con, "DELETE FROM student_registration_t WHERE sem_id='$sem_id'") or die(trigger_error(mysqli_error($db_con)));
mysqli_query($db_con, "DELETE FROM class_t WHERE sem_id='$sem_id'") or die(trigger_error(mysqli_error($db_con)));
mysqli_query($db_con, "DELETE FROM class_schedule_t WHERE class_id IN (SELECT class_id FROM class_t WHERE sem_id='$sem_id')") or die(trigger_error(mysqli_error($db_con)));
echo "success";
}
else{
mysqli_query($db_con, "DELETE FROM student_block_t") or die(trigger_error(mysqli_error($db_con)));
mysqli_query($db_con, "DELETE FROM student_registration_t") or die(trigger_error(mysqli_error($db_con)));
mysqli_query($db_con, "DELETE FROM class_t ") or die(trigger_error(mysqli_error($db_con)));
mysqli_query($db_con, "DELETE FROM class_schedule_t WHERE class_id IN (SELECT class_id FROM class_t)") or die(trigger_error(mysqli_error($db_con)));

echo "successfully deleted all data on all semester.";
}

?>