<html>
<head>
        <title>ps</title>
</head>
<body>
	<h1> <a href="ps.php?status=1">RETRY</a></h1>
    	<h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

<pre>
<?php
	echo ("<br>System processes:<br/><br>");
	passthru('ps -eLf',$query);
	echo ($query);

?>
</pre>
</body>
</html>
