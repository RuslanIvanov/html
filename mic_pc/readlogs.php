<html>
<head>
        <title>Read log kernel</title>
</head>
<body>
<?php
	$fp = fopen("/var/log/messages", "r"); // Открываем файл в режиме чтения
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


