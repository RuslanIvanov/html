<?php

	include 'php_serial.class.php';
 
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
	$fp = $serial->deviceOpen();
 
	if (!$fp)
	{
		 echo "Not open";
	}
	else
	{
	   echo "Open";
	}
	// To write into
//	$serial->sendMessage("Hello !");

	$serial->readPort(100);
?>
