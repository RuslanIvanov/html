<?php
	
    $file = "";
    $rez = 0;
    if(isset($_POST))
    {
		//print_r($_POST);
		if($_POST['mark']==10)
		{
			$file =  "/upu/start10.sh";
		}
		if($_POST['mark']==11)
		{
			$file =  "/upu/start11.sh";
		}
		if($_POST['mark']==12)
		{
			$file =  "/upu/start12.sh";
		}
		if($_POST['mark']==13)
		{
			$file =  "/upu/start13.sh";
		}

		
		$string = stripslashes($_POST['start']);
		
		$characters = "\r";
		$string2  = trim ( $string );

		$postedHTML = str_replace ( $characters , "" , $string2 );


       	$rez = file_put_contents($file, $postedHTML,LOCK_EX); //— Пишет данные в файл
    }

	if($rez === false)
	{
		echo "</br> error save";
	}else {	echo "</br> is saved $rez in '$file' text:</br> $postedHTML"; }
?>
