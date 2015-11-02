
<?php 
	if(isset($_POST['submit'])){
		$allowedExts = array("gif", "jpeg", "jpg", "png", "docx", "odt", "pdf", "txt");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "application/pdf")
		|| ($_FILES["file"]["type"] == "text/plain")
		|| ($_FILES["file"]["type"] == "application/msword")
		|| ($_FILES["file"]["type"] == "application/vnd.oasis.opendocument.text"))
		
		&& in_array($extension, $allowedExts))
		  {
		  if ($_FILES["file"]["error"] > 0)
			{
			echo "Feilmelding: " . $_FILES["file"]["error"] . "<br>";
			}
		  else
			{
			$file=$_FILES["file"]["name"];
			echo $file;
			echo "<br>";
			echo "File name: " . $_FILES["file"]["name"] . "<br>";
			echo "Type of File:: " . $_FILES["file"]["type"] . "<br>";
			echo "Size of File: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		
			if (file_exists("upload/" . $_FILES["file"]["name"]))
			  {
			  echo $_FILES["file"]["name"] . " exists";
			  }
			else
			  {
			  move_uploaded_file($_FILES["file"]["tmp_name"],
			  "upload/" . $_FILES["file"]["name"]);

			  $query_insert=mysql_query("INSERT INTO attachment_t VALUES('', '$post_id', '$file')") or die (mysql_error());
			  
			  echo "target path: " . "upload/" . $file ;
			  $targetpath="upload/".$file;
			  
			  }
			  //header('Location: sample.php?filename='.$file);
			}

		  }
		else
		  {
		  echo "Feil Filtype";
		  }
		  
	} //isset

?>


