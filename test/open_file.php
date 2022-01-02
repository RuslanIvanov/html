<?php	
	$text='#Error:';	

	if(isset($_GET['name']))
	{ 
		$file = $_GET['name'];
		
		if(is_writable($file)) //Возвращает true, если файл filename существует и доступен для записи. 
					//Аргумент filename может быть именем директории, что позволяет вам проверять директории на доступность для записи. 
		{// есть ли файл
			$fp=fopen($file,"r");	
			if (!$fp)
			{
				$text = "#Error: do not open file '".$file."'";			
			}
			else
			{
				fclose($fp);				
				
				$text = file_get_contents($file);
				if($text === false )
				{
					$text ="#Error: error read file";
				}				
				
			}
			
		}
		else { $text = "#Error: file '".$file."' does not exist!"; }	 
		
		echo $text;
	}	
	else
	{
		echo "#Error: no params!"; 
	}
	
?>
