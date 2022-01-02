<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

	<h1> <a href="readttyBR0.php?status=1">RETRY</a></h1>
    <h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

	<?php
  		exec("stty 115200 cs8 -F /dev/ttyBR0"); 
 
		$filename = "/dev/ttyBR0";
	
		echo "READING \n";
	
		$fp = fopen ("/dev/ttyBR0", "r");

		if (!$fp)
		{
	   		echo "Not open '/dev/ttyBR0' ";
		} else 
		{
   		 		echo "Open device: '/dev/ttyBR0' <br />";

				$count = 0;
				$i = 0;

				echo "<br /> test reading: <br />";			
				echo stream_get_contents($fp, 20000, 0);
				echo "<br /> END READ! <br />";			

				fclose($fp);		   		
		}	

	?>
</body>
</html>

