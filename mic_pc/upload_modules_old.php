<html>
<head>
	<title>Rezult</title>
</head>
<body>
	<h1> <a href="upload.html?status=1">BACK</a></h1>
	<h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

<?php
   if($_FILES["filename"]["size"] > 1024*100*1024)
   {
		echo ("Large size file!");
		exit;
   }

	if (isset($_FILES['filename']) && $_FILES['filename']['error'] === UPLOAD_ERR_OK) 
	{
		   // Проверяем загружен ли файл
		   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
		   {
			// Если файл загружен успешно, перемещаем его
			// из временной директории в конечную
			if(move_uploaded_file($_FILES["filename"]["tmp_name"], "/lib/modules/2.6.37/kernel/drivers/pvv".$_FILES["filename"]["name"]))
			{
				echo("<p>OK upload!</p>");
				echo "<p><b>tmp_file: ".$_FILES['filename']['tmp_name']."</b></p>";
				echo "<p><b>name:  ".$_FILES['filename']['name']."</b></p>";
				echo "<p><b>size: ".$_FILES['filename']['size']."</b></p>";
			} else { echo("Error move kernel module... "); }
		   } else { echo("Error upload kernel module..."); }
	} else { echo " Error load file... "; }

?>
</body>
</html>
