<html>
<head>
        <title>Kill</title>
</head>
<body>
    <h1> <a href="killupu.php?status=1">RETRY</a></h1>
    <h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

<?php
	exec('killall upu_m6', $query, $retVal);
	exec('killall upu_m7', $query, $retVal);

	echo ("Kill,kill,kill...");
?>
</body>
</html>
