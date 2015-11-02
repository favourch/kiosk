<?php
$file = 'file_templates/list_personnel.xlsx';
header('Content-Disposition: attachment; filename='.basename($file));

header('Content-type: application/vnd.ms-excel');

readfile($file);

?>