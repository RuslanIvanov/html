<html>
<head>
        <title>Read log file</title>
</head>
<body>
<?php
	$fp = fopen("/upu/log/upu.log", "r"); // Открываем файл в режиме чтения
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


