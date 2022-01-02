<html>
<head>
        <title>start</title>
</head>
<body>
	<h1> <a href="ipcsupu.php?status=1">RETRY</a></h1>
    	<h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

<pre>
<?php

        echo ("<br>System ipcs:<br/><br>");
        passthru('ipcs',$query);
?>
</pre>
</body>
</html>
