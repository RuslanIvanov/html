<?php
    $file = "";
    $rez = 0;
    if(isset($_POST))
    {
		print_r($_POST);
		if($_POST['mark']==10)
		{
			$file =  "start10.sh";
		}
		if($_POST['mark']==11)
		{
			$file =  "start11.sh";
		}
		if($_POST['mark']==12)
		{
			$file =  "start12.sh";
		}
		if($_POST['mark']==13)
		{
			$file =  "start13.sh";
		}
		echo "</br>You corrected file: $file";
        $postedHTML = $_POST['start']; // You want to make this more secure!
        $rez = file_put_contents($file, $postedHTML,LOCK_EX); //— Пишет данные в файл
    }

	if($rez == false)
	{
		echo "</br> error save";
	}else {	echo "</br> is saved $rez"; }
?>
