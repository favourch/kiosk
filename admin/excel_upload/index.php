<?php
	/*
This script is use to upload any Excel file into database.
Here, you can browse your Excel file and upload it into 
your database.

Download Link: http://www.discussdesk.com/import-excel-file-data-in-mysql-database-using-PHP.htm

Website URL: http://www.discussdesk.com
*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Demo - Import Excel file data in mysql database using PHP, Upload Excel file data in database</title>
<meta name="description" content="This tutorial will learn how to import excel sheet data in mysql database using php. Here, first upload an excel sheet into your server and then click to import it into database. All column of excel sheet will store into your corrosponding database table."/>
<meta name="keywords" content="import excel file data in mysql, upload ecxel file in mysql, upload data, code to import excel data in mysql database, php, Mysql, Ajax, Jquery, Javascript, download, upload, upload excel file,mysql"/>
</head>
<body>

<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/


	mysql_connect("localhost","root","");
	mysql_select_db("sample");



$databasetable = "table_t";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = 'excel/student_list.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

$query = "insert into table_t  values";
for($i=2;$i<=$arrayCount;$i++){
$id = trim($allDataInSheet[$i]["A"]);
$num = trim($allDataInSheet[$i]["B"]);
$name = trim($allDataInSheet[$i]["C"]);
$email = trim($allDataInSheet[$i]["D"]);
$age = trim($allDataInSheet[$i]["E"]);
$unit = trim($allDataInSheet[$i]["F"]);
$yr_level = trim($allDataInSheet[$i]["G"]);

/*
$query = "SELECT name FROM table_t WHERE name = '".$userName."' and email = '".$userMobile."'";
$sql = mysql_query($query);
$recResult = mysql_fetch_array($sql);
$existName = $recResult["name"];
*/
if($i!=2){
	$query = $query.",";	
}
	$query = $query.'("'.$id.'",
														   "'.$num.'", 
														   "'.$name.'", 
														   "'.$email.'", 
														   "'.$age.'", 
														   "'.$unit.'", 
														   "'.$yr_level.'")';
	
	
}
mysql_query($query) or die(mysql_error());
//echo mysql_real_escape_string($query);
	
	$msg = 'Record has been added. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';

	//$msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';

echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div>";
 

?>
<body>
</html>