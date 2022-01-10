<html>
<head>
        <title>Read log file</title>
</head>
<body>
	<h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>
	<h1> <a href="logfirmwarebrp.php?status=3">LOG FIRMWARE</a></h1>
<?php
	$fp = fopen("/var/www/log/upload_brp.log", "r"); // Открываем файл в режиме чтения
	if ($fp)
	{
		while (!feof($fp))
		{
			$mytext = fgets($fp, 999);
			echo $mytext."<br />";
		}
	}
	else echo "Error open file...";

	fclose($fp);
?>
</body>
</html>

