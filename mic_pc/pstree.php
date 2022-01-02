<html>
<head>
        <title>pstree</title>
</head>
<body>
	<h1> <a href="pstree.php?status=1">RETRY</a></h1>
    	<h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

<pre>
<?php
	echo ("<br>pstree<br/><br>");
	passthru('pstree',$query);
	echo ($query);

?>
</pre>
</body>
</html>
