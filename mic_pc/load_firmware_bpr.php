<html>
<head>
	<title>Rezult</title>
</head>
<body>

	<h1> <a href="upload_firmware_bpr.php?status=1">RETRY</a></h1>
    <h1> <a href="upload.html?status=2">BACK</a></h1>
	<h1> <a href="logfirmwarebrp.php?status=3">LOG FIRMWARE</a></h1>

<?php

	function fwrite_stream($fp, $string, $len) 
	{
		$fwrite = 0;
	    for ($written = 0; $written < $len; $written += $fwrite) 
		{
	        $fwrite = fwrite($fp, $string[$written], $len - $written);
	        if ($fwrite === false) 
			{
	            return $written;
	        }
		}
		return $written;
    }


	function fread_reply2($fp)
	{

		echo "<br /> test reading: <br />";			
		echo stream_get_contents($fp, 20000, 0);
		echo "<br /> END READ! <br />";			
	}

	function fread_reply3($fp)
	{
		echo "<br /> test reading: <br />";			
		while(1)
		{

				$content = fread($fp,8192);
				if(content !== false)
				{
					echo $content;
				}else break;

		}
		echo "<br /> END READ! <br />";			
	}

	function fread_reply($handle)
	{

			if ($handle)
    		{
                while (($buffer = fgets($handle)) !== false)
                {
                        echo $buffer;

						if(feof($handle)) { echo "<br />is EOF<br />"; break; }
						if(strlen($buffer) === 0) {  echo "<br />Error: strlen = 0 <br />"; break;}
                }

                if (!feof($handle))
                {
                        echo "<br />Error: fgets() is faul<br />";
						 echo $buffer;
                } else "<br /> End of file <br />";
		   }
			else  "<br /> Error HANDLE for repyr <br />";
	}
   

   if($_FILES["filename"]["size"] >= 20024) //firmware ~17kb - 17000б
   {
		exit ("Large size file!");
   }

	if (isset($_FILES['filename']) && $_FILES['filename']['error'] === UPLOAD_ERR_OK) 
	{

   		// Проверяем загружен ли файл
  		if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   		{

			if(move_uploaded_file($_FILES["filename"]["tmp_name"], "/tmp/".$_FILES["filename"]["name"]))
			{		
				$output=null;
				$retval=null;
				$file  = $_FILES["filename"]["name"];						

				echo "file firmware  for brp '/tmp/$file' is loaded on UPU";	
				

			} else { echo " Error move firmware file... "; }
		} else { echo " Error load firmware file... "; }
 	} else { echo " Error load file... "; }
	
?>
</body>
</html>
