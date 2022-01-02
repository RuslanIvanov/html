<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

    <h1> <a href="testMemory.php?status=1">RETRY</a></h1>
    <h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>
<?php	

	// limit memory usage to 1MB 
	ini_set('memory_limit', 1024*1024);

	// initially, PHP seems to allocate 768KB for basic operation
	printf("memory: %d\n",  memory_get_usage(true));

	$str = str_repeat('a',  255*1024);
	echo "Allocated string of 255KB\n";

	// now we have allocated all of the 1MB of memory allowed
	printf("memory: %d\n",  memory_get_usage(true));

	// going over the limit causes a fatal error, so no output follows
	$str = str_repeat('a',  256*1024);
	echo "Allocated string of 256KB\n";
	printf("memory: %d\n",  memory_get_usage(true));

?>
</body>
</html>
