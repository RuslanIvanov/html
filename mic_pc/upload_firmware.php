<html>
<head>
	<title>Rezult</title>
	<h1> <a href="upload.html?status=2">BACK</a></h1>
</head>
<body>
<?php

	$device = "/dev/chpvv5_bpr";

	/*include 'php_serial.class.php';
 
	// Let's start the class
	$serial = new phpSerial;
 
	// First we must specify the device. This works on both linux and windows (if
	// your linux serial device is /dev/ttyS0 for COM1, etc)
	$serial->deviceSet("/dev/ttyUSB0");
 
	// We can change the baud rate, parity, length, stop bits, flow control
	$serial->confBaudRate(115200);
	$serial->confParity("none");
	$serial->confCharacterLength(8);
	$serial->confStopBits(1);
	$serial->confFlowControl("none");
 
	// Then we need to open it
	$fp = $serial->deviceOpen();*/

	$fp = fopen ($device, "w+");
	
	if (!$fp)
	{
		echo "Not open file ".$device;
	}
	else
	{
		echo "Open file ".$device;

		fclose($fp);
	}


	

/*   if($_FILES["filename"]["size"] > 1024*100*1024)
   {
	echo ("Large size file!");
	exit;
   }

   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
	// Если файл загружен успешно, перемещаем его
	// из временной директории в конечную
	if(move_uploaded_file($_FILES["filename"]["tmp_name"], "/upu/db/".$_FILES["filename"]["name"]))
	{
	echo("<p>OK upload module file!</p>");
	echo "<p><b>tmp_file: ".$_FILES['filename']['tmp_name']."</b></p>";
	echo "<p><b>name:  ".$_FILES['filename']['name']."</b></p>";
	echo "<p><b>size: ".$_FILES['filename']['size']."</b></p>";
	} else { echo("Error move db file... "); }

   } else 
	{
	      echo("Error upload db file...");
	}*/

?>
</body>
</html>
