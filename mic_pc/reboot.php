<html>
<head>
        <title>Rezult</title>
</head>
<body>
<?php
	exec('reboot -f', $query, $retVal);
	echo ("Reboot...");
?>
</body>
</html>
