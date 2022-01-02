<?php

	exec("mode ttyUSB0 BAUD=115200 PARITY=N data=8 stop=1 xon=off");

	$fp = fopen ("/dev/ttyUSB0", "w");
	if (!$fp)
	{
		 echo "Not open";
	}
	else
	{
	   echo "Open";
	}
?>
