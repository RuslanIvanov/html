<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

    <h1> <a href="readttyBR0_2.php?status=1">RETRY</a></h1>
    <h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

   <?php	
	
	echo "<br /> READING <br />";
	
	$handle = fopen("/dev/ttyBR0", "r");

    if ($handle)
    {
                while (($buffer = fgets($handle, 20000)) !== false)
                {
                        echo $buffer;

						if(feof($handle)) { echo "<br />is EOF<br />"; break; }
						if(strlen($buffer) === 0) {  echo "<br />Error: strlen = 0 <br />"; break;}
                }

                if (!feof($handle))
                {
                        echo "<br />Error: fgets() is faul<br />";
                } else "<br /> End of file <br />";

                fclose($handle);
    }

	echo "<br /> END READING<br />";			

   ?>
</body>
</html>
