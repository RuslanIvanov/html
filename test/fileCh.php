<?php	
	$start=$_POST['start'];	
	print_r($_POST);
	if(isset($_POST['start'])) 
	{
		print_r($_POST);
		$fs=fopen('start.sh',"w");
		$text=fputs($fs,$start);
		fclose($fs);
	}

	$text='';
	$f=file('start.sh');
	for($i=0;$i<count($f);$i++) 
	{
		$text="$text$f[$i]";
	}
?>

<script type="text/javascript" language="javascript">

var currentValue = 0;
function handleClick(myRadio) 
{
    currentValue = "start"+myRadio.value+".sh";
    alert("start"+myRadio.value+".sh");

/*	$.ajax({
    url: 'fileCh.php',
    type: 'POST',
    data: start,
    success: function(data){
     $('p.out').text(data);
   },
    error: function(){
	console.log('ERROR');
    }
 })*/
}
</script>

<form method="POST" action='saveFile.php'>
Choose a file for correct: </br>
<input type='radio' name = 'mark' value=10 onclick="handleClick(this);" />start10.sh </br>
<input type='radio' name = 'mark' value=11 onclick="handleClick(this);" />start11.sh </br>
<input type='radio' name = 'mark' value=12 onclick="handleClick(this);" />start12.sh </br>
<input type='radio' name = 'mark' value=13 onclick="handleClick(this);" />start13.sh </br>
</br>
<textarea rows="4" cols="80"  name="start"><?=$text; ?></textarea><br>
<input type=submit name="save" value="SAVE">
</form>
