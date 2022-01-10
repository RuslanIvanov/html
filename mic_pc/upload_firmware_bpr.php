<html>
<head>
	<title>Update result BRP</title>
	<script type="text/javascript" src="../lib/prototype.js"></script>
	<script type="text/javascript" src="../lib/httprequest.js"></script>
	<script language="javascript" type="text/javascript">
	/* Script written by Adam Khoury @ DevelopPHP.com */
	/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */

	//_("wait_answer_brp").innerHTML = "?";

	</script>
</head>
<body>

	<!--<h1> <a href="upload.html?status=1">BACK</a></h1>-->
    	<h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>
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

	function kill()
	{
		exec('killall upu_m6', $query, $retVal);
		exec('killall upu_m7', $query, $retVal);
		echo ("Kill: upu_m7, upu_m6 <br /> ");
		sleep(1);
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
				$sizeFile = $_FILES["filename"]["size"];

				$mark=0;
				$device=0;

				if(isset($_POST))
    			{
					if($_POST['mark']==0)
					{ $mark=0;  echo "mark '$mark': upload_bpr <br /> "; }

					if($_POST['mark']==1)
					{ $mark=1; echo "mark '$mark': start_upload_bpr.sh <br /> "; }

					if($_POST['mark']==3)
					{ $mark=3; echo "mark '$mark': only load file <br /> ";}

					if($_POST['mark2']==1)
					{ $device=1; echo "mark2 '$device': usage tam3517 <br /> "; }

					if($_POST['mark2']==2)
					{ $device=2; echo "mark2 '$device': usage imx6 <br /> "; }

				}

				if($mark === 3)
				{
					sleep(1);
					echo "file firmware  for brp '/tmp/$file' is loaded on UPU. Size is ".$sizeFile." bytes";					
				}
				else
				{

					if($mark === 0)
					{
						kill();

						exec('upload_brp -f /tmp/'.$file, $output, $retval);
						echo "upload_brp: STATUS $retval\n"; 
					}

					if($mark === 1)
					{
						kill();

						if($device==2)
						{
							exec('start_upload_brp.sh /tmp/'.$file." ".$device, $output, $retval);		
						}
						else if($device==1)
						{
							exec('start_upload_brp.sh /tmp/'.$file." ".$device, $output, $retval);		
						}
						else
						{
							exec('start_upload_brp.sh /tmp/'.$file, $output, $retval);			            	
						}
						echo "start_upload_brp.sh: STATUS $retval <br /> ";
					}
				
					if($retval === 0)
					{ 
						echo "<br /> File firmware for brp '$file' is loaded on BRP. Size is ".$sizeFile." bytes<br />";						
						//вывод программы				
						
						for ($i = 0; $i < count($output); $i++) 
						{print_r($output[$i]); echo("<br />"); }
					
					} else if($retval === 1 || $retval === 127)				 
					{ 	
						echo "<br /> Error update firmware: <br />"; 	
						//вывод программы						
 
						for ($i = 0; $i < count($output); $i++) 
						{print_r($output[$i]); echo("<br />"); }

					}else if($retval === 2)
					{ echo "<br /> Debug regim: <br />";  }
					else { echo "<br /> N/A RETVAL $retval: <br />"; }
				}

			} else { echo " Error move firmware file... "; }
		} else { echo " Error load firmware file... "; }
 	} else { echo " Error load file... "; }
	
?>
<!--<div id="wait_answer_brp">ANSW BPR is: NO</div>  -->
</body>
</html>
